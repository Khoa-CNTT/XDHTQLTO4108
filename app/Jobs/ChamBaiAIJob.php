<?php

namespace App\Jobs;

use App\Models\CauTraLoiSinhVien;
use App\Models\DanhSachCauHoi;
use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ChamBaiAIJob implements ShouldQueue
{
    use Queueable;

    protected $id_bai_thi;
    protected $id_sinh_vien;
    protected $data;
    public function __construct($id_bai_thi, $id_sinh_vien, $data)
    {
        $this->id_bai_thi   = $id_bai_thi;
        $this->id_sinh_vien = $id_sinh_vien;
        $this->data         = $data;
    }

    public function handle(): void
    {
        $this->ChamBaiAI();
    }

    public function taoPromptChamDiem($cau_hoi, $cau_tra_loi, $dap_an)
    {
        return <<<PROMPT
        Câu hỏi: $cau_hoi

        Đáp án chuẩn: $dap_an

        Câu trả lời của học sinh: $cau_tra_loi

        Yêu cầu: So sánh câu trả lời của học sinh với đáp án chuẩn. Nếu câu trả lời đúng về nội dung và ý chính thì trả lời: true. Ngược lại trả lời: false. Chỉ trả lời một từ duy nhất: true hoặc false (in thường, không giải thích gì thêm).
        PROMPT;
    }

    public function ChamBaiAI()
    {
        $bai_thi = $this->id_bai_thi;
        $data = CauTraLoiSinhVien::where('id_bai_thi', $bai_thi)
                                ->join('cau_hois', 'cau_hois.id', 'cau_tra_loi_sinh_viens.id_cau_hoi')
                                ->where('cau_tra_loi_sinh_viens.id_sinh_vien', $this->id_sinh_vien)
                                ->join('dap_an_cau_hois', function ($join) {
                                    $join->on('dap_an_cau_hois.id_cau_hoi', 'cau_tra_loi_sinh_viens.id_cau_hoi')
                                        ->where('dap_an_cau_hois.is_dap_an_dung', 1);
                                })
                                ->where('cau_hois.loai_cau_hoi', '!=', 1)
                                ->select(
                                    'cau_tra_loi_sinh_viens.id',
                                    'cau_tra_loi_sinh_viens.id_cau_hoi',
                                    'cau_tra_loi_sinh_viens.tra_loi_bang_chu as cau_tra_loi',
                                    'cau_hois.ten_cau_hoi as cau_hoi',
                                    'dap_an_cau_hois.noi_dung as dap_an_dung'
                                )
                                ->get()->toArray();

        $result = $this->chamBaiGemini($data);
        foreach ($result as $key => $value) {
            $cau_tra_loi = CauTraLoiSinhVien::find($value['id']);
            $cau_hoi     = DanhSachCauHoi::where('id_bai_thi', $bai_thi)
                                        ->where('id_cau_hoi', $value['id_cau_hoi'])
                                        ->first();
            if ($cau_tra_loi) {
                $cau_tra_loi->diem      = $value['ket_qua'] == 'true' ? $cau_hoi->diem_cau_hoi : 0;
                $cau_tra_loi->is_dung   = $value['ket_qua'] == 'true' ? 1 : 0;
                $cau_tra_loi->save();
            }
        }
    }

    public function chamBaiGemini($data)
    {
        $api_key = 'AIzaSyDuxb_5KIwAHfLAj6dfiPYVn0RPI3s9WYo'; // Replace with your real API key
        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=' . $api_key;

        $client = new Client([
            'base_uri' => 'https://generativelanguage.googleapis.com',
            'timeout'  => 30.0,
        ]);

        $result = [];

        foreach ($data as $item) {
            $prompt = $this->taoPromptChamDiem($item['cau_hoi'], $item['cau_tra_loi'], $item['dap_an_dung']);

            try {
                $response = $client->post($url, [
                    'json' => [
                        'contents' => [[
                            'parts' => [[ 'text' => $prompt ]]
                        ]]
                    ],
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ]
                ]);

                $body = json_decode($response->getBody(), true);
                $ket_qua = trim($body['candidates'][0]['content']['parts'][0]['text'] ?? '');

                $item['ket_qua'] = $ket_qua;
            } catch (\Exception $e) {
                $item['ket_qua'] = 'Lỗi: ' . $e->getMessage();
            }
            $result[] = $item;
        }

        return $result;
    }
}
