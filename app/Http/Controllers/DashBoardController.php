<?php

namespace App\Http\Controllers;

use App\Jobs\ChamBaiAIJob;
use App\Models\BaiThi;
use App\Models\CauHoi;
use App\Models\CauTraLoiSinhVien;
use App\Models\DanhSachCauHoi;
use App\Models\DapAnCauHoi;
use App\Models\LopHoc;
use App\Models\MonHoc;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function index()
    {
        return view('SinhVien.Page.TrangChu.index');
    }

    public function login(Request $request)
    {
        $check = Auth::guard('sinh_vien')->attempt([
            'email'     => $request->email,
            'password'  => $request->password,
        ]);
        if($check) {
            $user = Auth::guard('admin')->user();
            if($user->trang_thai == 1) {
                return response()->json(['status' => true, 'message' => 'Đăng nhập thành công!']);
            }
            return response()->json(['status' => false, 'message' => 'Tài khoản đã bị khóa!']);
        }
        return response()->json(['status' => false, 'message' => 'Tài khoản hoặc mật khẩu không đúng!']);
    }

    public function logout()
    {
        Auth::guard('sinh_vien')->logout();
        return redirect('/sinh_vien/login');
    }

    public function viewMonHoc()
    {
        $monHocs = LopHoc::join('mon_hocs', 'lop_hocs.id_mon_hoc', 'mon_hocs.id')
                        ->join('chi_tiet_lop_hocs', 'lop_hocs.id', 'chi_tiet_lop_hocs.id_lop_hoc')
                        ->join('giang_viens', 'lop_hocs.giang_vien_id', 'giang_viens.id')
                        ->where('lop_hocs.trang_thai', 1)
                        ->where('mon_hocs.trang_thai', 1)
                        ->where('chi_tiet_lop_hocs.id_sinh_vien', Auth::guard('sinh_vien')->user()->id)
                        ->select(
                            'lop_hocs.id',
                            'lop_hocs.ten_lop',
                            'lop_hocs.ma_lop',
                            'lop_hocs.trang_thai',
                            'lop_hocs.giang_vien_id',
                            'lop_hocs.id_mon_hoc',
                            'mon_hocs.ten_mon_hoc',
                            'mon_hocs.ma_so_mon_hoc',
                            'mon_hocs.ma_mon_hoc',
                            'giang_viens.ho_va_ten as ten_giang_vien',
                            DB::raw('(SELECT COUNT(*) FROM chi_tiet_lop_hocs
                                    WHERE chi_tiet_lop_hocs.id_lop_hoc = lop_hocs.id)
                                    AS so_sinh_vien')
                        )
                        ->groupBy(
                            'lop_hocs.id',
                            'lop_hocs.ten_lop',
                            'lop_hocs.ma_lop',
                            'lop_hocs.trang_thai',
                            'lop_hocs.giang_vien_id',
                            'lop_hocs.id_mon_hoc',
                            'mon_hocs.ten_mon_hoc',
                            'mon_hocs.ma_so_mon_hoc',
                            'mon_hocs.ma_mon_hoc',
                            'giang_viens.ho_va_ten'
                        )
                        ->get();

        return view('SinhVien.Page.MonHoc.index', compact('monHocs'));
    }

    public function viewMonHocDetail($id_lop_hoc)
    {
        $lopHoc = LopHoc::join('mon_hocs', 'lop_hocs.id_mon_hoc', 'mon_hocs.id')
                        ->join('giang_viens', 'lop_hocs.giang_vien_id', 'giang_viens.id')
                        ->join('chi_tiet_lop_hocs', 'lop_hocs.id', 'chi_tiet_lop_hocs.id_lop_hoc')
                        ->where('lop_hocs.trang_thai', 1)
                        ->where('mon_hocs.trang_thai', 1)
                        ->where('lop_hocs.id', $id_lop_hoc)
                        ->select(
                            'lop_hocs.id',
                            'lop_hocs.ten_lop',
                            'lop_hocs.ma_lop',
                            'lop_hocs.trang_thai',
                            'lop_hocs.giang_vien_id',
                            'lop_hocs.id_mon_hoc',
                            'mon_hocs.ten_mon_hoc',
                            'mon_hocs.ma_so_mon_hoc',
                            'mon_hocs.ma_mon_hoc',
                            'giang_viens.ho_va_ten as ten_giang_vien',
                            DB::raw('COUNT(chi_tiet_lop_hocs.id_sinh_vien) as so_sinh_vien'),
                        )
                        ->groupBy(
                            'lop_hocs.id',
                            'lop_hocs.ten_lop',
                            'lop_hocs.ma_lop',
                            'lop_hocs.trang_thai',
                            'lop_hocs.giang_vien_id',
                            'lop_hocs.id_mon_hoc',
                            'mon_hocs.ten_mon_hoc',
                            'mon_hocs.ma_so_mon_hoc',
                            'mon_hocs.ma_mon_hoc',
                            'giang_viens.ho_va_ten'
                        )
                        ->first();
        return view('SinhVien.Page.DetailMonHoc.index', compact('lopHoc'));
    }

    public function viewCuocThi()
    {
        $baiThis = BaiThi::join('lop_hocs', 'lop_hocs.id', 'bai_this.id_lop_hoc')
                         ->join('mon_hocs', 'mon_hocs.id', 'bai_this.id_mon_hoc')
                         ->join('loai_bai_this', 'loai_bai_this.id', 'bai_this.id_loai_bai_thi')
                         ->join('giang_viens', 'giang_viens.id', 'bai_this.id_giang_vien')
                         ->join('chi_tiet_lop_hocs', 'chi_tiet_lop_hocs.id_lop_hoc', 'lop_hocs.id')
                         ->where('chi_tiet_lop_hocs.id_sinh_vien', Auth::guard('sinh_vien')->user()->id)
                         ->select(
                                'bai_this.id',
                                'bai_this.ten_bai_thi',
                                'bai_this.thoi_gian_bat_dau',
                                'bai_this.thoi_gian_ket_thuc',
                                'bai_this.trang_thai',
                                'bai_this.mat_khau',
                                'bai_this.id_loai_bai_thi',
                                'lop_hocs.ten_lop',
                                'mon_hocs.ten_mon_hoc',
                                'mon_hocs.ma_so_mon_hoc',
                                'loai_bai_this.ten_loai_bai_thi',
                                'giang_viens.ho_va_ten as ten_giang_vien'
                         )->get();

        return view('SinhVien.Page.BaiThi.index', compact('baiThis'));
    }

    public function viewLamBai()
    {
        return view('SinhVien.Page.LamBaiThi.index');
    }

    public function getDataCauHoi($id_bai_thi)
    {
        $baiThi = BaiThi::find($id_bai_thi);

        $id_cau_hois = DanhSachCauHoi::where('id_bai_thi', $id_bai_thi)
                                     ->pluck('id_cau_hoi');

        $list_cau_hoi = CauHoi::whereIn('id', $id_cau_hois)
                            ->orderBy('loai_cau_hoi')
                            ->get();

        $list_cau_hoi->map(function ($cau_hoi) {
            if ($cau_hoi->loai_cau_hoi == 1) {
                $cau_hoi->setRelation('dapAn', $cau_hoi->dapAn()->get());
            } else {
                $cau_hoi->setRelation('dapAn', collect()); // gán rỗng
            }
            return $cau_hoi;
        });

        return response()->json([
            'bai_thi'       => $baiThi,
            'list_cau_hoi'  => $list_cau_hoi
        ]);
    }

    public function sinhVienNopBai(Request $request)
    {
        $data = $request->all();
        $list_cau_hoi = [];
        foreach ($data['list_cau_hoi'] as $key => $value) {
            array_push($list_cau_hoi, $value['id']);
        }

        $dap_an_dung = DapAnCauHoi::whereIn('id_cau_hoi', $list_cau_hoi)
                                        ->where('is_dap_an_dung', DapAnCauHoi::IS_DAP_AN_DUNG)
                                        ->select('id_cau_hoi', 'id')
                                        ->get();
        $danh_sach_diem = DanhSachCauHoi::where('id_bai_thi', $data['id_bai_thi'])
                                        ->whereIn('id_cau_hoi', $list_cau_hoi)
                                        ->select('id_cau_hoi', 'diem_cau_hoi')
                                        ->get();

        $sinh_vien = Auth::guard('sinh_vien')->user();
        CauTraLoiSinhVien::where('id_sinh_vien', $sinh_vien->id)
                            ->where('id_bai_thi', $data['id_bai_thi'])
                            ->delete();

        foreach ($data['list_cau_hoi'] as $key => $value) {
            foreach ($dap_an_dung as $key_da => $value_da) {
                if($value['id'] == $value_da->id_cau_hoi) {
                    $cau_tra_loi_sinh_vien = [
                        'id_cau_hoi'        => $value_da->id_cau_hoi,
                        'id_sinh_vien'      => $sinh_vien->id,
                        'id_bai_thi'        => $data['id_bai_thi'],
                    ];
                    if (filter_var($value['cau_tra_loi'], FILTER_VALIDATE_INT) !== false) {
                        $cau_tra_loi_sinh_vien['id_dap_an']         = $value['cau_tra_loi'];
                    } else {
                        $cau_tra_loi_sinh_vien['id_dap_an']         = 0;
                        $cau_tra_loi_sinh_vien['tra_loi_bang_chu']  = $value['cau_tra_loi'];
                    }

                    if($value['cau_tra_loi'] == $value_da->id && $value['loai_cau_hoi'] == 1) {
                        foreach ($danh_sach_diem as $key_diem => $value_diem) {
                            if($value_da->id_cau_hoi == $value_diem->id_cau_hoi) {
                                $cau_tra_loi_sinh_vien['diem']      = $value_diem->diem_cau_hoi;
                                break;
                            }
                        }

                        $cau_tra_loi_sinh_vien['is_dung']   = 1;
                    } else {
                        $cau_tra_loi_sinh_vien['diem']      = 0;
                        $cau_tra_loi_sinh_vien['is_dung']   = 0;
                    }

                    CauTraLoiSinhVien::create($cau_tra_loi_sinh_vien);
                }
            }
        }

        ChamBaiAIJob::dispatch($data['id_bai_thi'], $sinh_vien->id, $data['list_cau_hoi']);

        return $this->NotifiSuccess('Nộp bài thành công');
    }

    public function viewKetQua()
    {
        $sinh_vien = Auth::guard('sinh_vien')->user();
        $data = CauTraLoiSinhVien::where('id_sinh_vien', $sinh_vien->id)
                                ->join('bai_this', 'bai_this.id', 'cau_tra_loi_sinh_viens.id_bai_thi')
                                ->join('lop_hocs', 'lop_hocs.id', 'bai_this.id_lop_hoc')
                                ->join('mon_hocs', 'mon_hocs.id', 'bai_this.id_mon_hoc')
                                ->join('cau_hois', 'cau_hois.id', 'cau_tra_loi_sinh_viens.id_cau_hoi')
                                ->select(
                                    'bai_this.ten_bai_thi',
                                    'bai_this.thoi_gian_bat_dau',
                                    'bai_this.thoi_gian_ket_thuc',
                                    'lop_hocs.ten_lop',
                                    'mon_hocs.ten_mon_hoc',
                                    DB::raw('SUM(cau_tra_loi_sinh_viens.diem) as tong_diem'),
                                    DB::raw('SUM(CASE WHEN cau_hois.loai_cau_hoi = 1 THEN cau_tra_loi_sinh_viens.diem ELSE 0 END) as diem_trac_nghiem'),
                                    DB::raw('SUM(CASE WHEN cau_hois.loai_cau_hoi = 2 THEN cau_tra_loi_sinh_viens.diem ELSE 0 END) as diem_tra_loi_ngan'),
                                    DB::raw('SUM(CASE WHEN cau_hois.loai_cau_hoi = 3 THEN cau_tra_loi_sinh_viens.diem ELSE 0 END) as diem_tu_luan')
                                )
                                ->groupBy(
                                    'bai_this.ten_bai_thi',
                                    'bai_this.thoi_gian_bat_dau',
                                    'bai_this.thoi_gian_ket_thuc',
                                    'lop_hocs.ten_lop',
                                    'mon_hocs.ten_mon_hoc'
                                )
                                ->get();
        // dd($data->toArray());
        return view('SinhVien.Page.KetQuaThi.index', compact('data'));
    }

    public function viewChatAi()
    {
        return view('SinhVien.Page.ChatAI.index');
    }

    public function chatAiMessage(Request $request)
    {
        $client = new Client([
            'base_uri' => 'https://generativelanguage.googleapis.com',
            'timeout' => 30.0,
        ]);

        $validated = $request->validate([
            'messages' => 'required|array',
            'messages.*.role' => 'required|in:user,model',
            'messages.*.text' => 'required|string',
        ]);

        $apiKey = 'AIzaSyDuxb_5KIwAHfLAj6dfiPYVn0RPI3s9WYo';
        $url = "/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}";

        // Prompt hệ thống (được gắn vào đầu cuộc hội thoại)
        $systemPrompt = <<<PROMPT
        Bạn là một trợ lý học tập thông minh, chuyên hỗ trợ học sinh và sinh viên trong việc học tập, ôn luyện, làm bài tập, giải thích kiến thức môn học và các vấn đề liên quan đến đề thi.

        🎯 Lưu ý quan trọng:
        - Bạn **không được giải bài trực tiếp**
        - Chỉ được **hướng dẫn cách giải**, đưa ra gợi ý, phân tích hướng tiếp cận, hoặc giải thích kiến thức liên quan để người học có thể tự làm bài
        - Không được viết ra đáp án cuối cùng, kể cả khi người dùng yêu cầu
        - Nếu câu hỏi yêu cầu đáp án, hãy trả lời:
        "Mình không thể đưa ra đáp án trực tiếp, nhưng mình sẽ hướng dẫn bạn cách làm nhé!"

        ✅ Bạn chỉ hỗ trợ các chủ đề liên quan đến học tập:
        - Môn học: toán, lý, hóa, sinh, tiếng Anh, lịch sử, địa lý, tin học, công nghệ...
        - Bài tập, đề thi, kiến thức SGK, bài luận, mẹo ôn tập, kỹ năng làm bài

        ❌ Nếu người dùng hỏi về chủ đề không liên quan đến học tập, hãy từ chối một cách lịch sự:
        "Mình là trợ lý học tập nên không hỗ trợ các chủ đề ngoài việc học. Bạn có câu hỏi nào về môn học hoặc bài tập không?"

        ✅ Giao tiếp thân thiện và khuyến khích người học:
        - Bắt đầu bằng chào hỏi: "Chào bạn 👋 Mình là trợ lý học tập. Bạn cần giúp gì nào?"
        - Luôn động viên: "Bạn làm tốt rồi! Cùng xem cách giải nhé!"

        ⛔ Không dùng dấu `***` trong phản hồi. Trả lời dưới dạng văn bản tự nhiên, rõ ràng, không định dạng markdown hoặc phân cách đặc biệt.
        PROMPT;

        // Ghép prompt hành vi vào đầu
        $messages = [
            [
                'role' => 'user',
                'parts' => [[ 'text' => $systemPrompt ]]
            ]
        ];

        // Chuyển các message người dùng gửi lên sang định dạng Gemini
        foreach ($validated['messages'] as $message) {
            $messages[] = [
                'role' => $message['role'],
                'parts' => [[ 'text' => $message['text'] ]]
            ];
        }

        // Gửi đến Gemini
        $response = $client->post($url, [
            'json' => ['contents' => $messages],
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);

        $body = json_decode($response->getBody(), true);
        $reply = $body['candidates'][0]['content']['parts'][0]['text'] ?? '[Không có phản hồi]';

        return response()->json([
            'message' => $reply,
        ]);
    }

}
