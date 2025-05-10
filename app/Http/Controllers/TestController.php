<?php

namespace App\Http\Controllers;

use App\Models\CauHoi;
use App\Models\CauTraLoiSinhVien;
use App\Models\DanhSachCauHoi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $payload = [
            "USERNAME"  => "THANHTRUONG2311",
            "PASSWORD"  => "TruongMaiLinh2603",
            "DAY_BEGIN" => "26/12/2024",
            "DAY_END"   => "26/12/2024",
            "NUMBER_MB" => "1910061030119"
        ];
        $axios = new \GuzzleHttp\Client();
        try {
            $response = $axios->post('https://api-mb.dzmid.io.vn/mb', [
                'json' => $payload
            ]);

            $data    = json_decode($response->getBody(), true);

            dd($data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
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

    public function TestChamBaiAI()
    {
        $bai_thi = 4;
        $data = CauTraLoiSinhVien::where('id_bai_thi', $bai_thi)
                                ->join('cau_hois', 'cau_hois.id', 'cau_tra_loi_sinh_viens.id_cau_hoi')
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
