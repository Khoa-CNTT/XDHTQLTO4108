<?php

namespace App\Http\Controllers;

use App\Models\CauHoi;
use Illuminate\Http\Request;

class CauHoiController extends Controller
{
    public function getData()
    {
        // Lấy danh sách câu hỏi, join với bảng môn học để lấy tên và mã môn
        $data = CauHoi::select(
                'cau_hois.*',
                'mon_hocs.ten_mon_hoc',
                'mon_hocs.ma_mon_hoc'
            )
            ->join('mon_hocs', 'mon_hocs.id', '=', 'cau_hois.id_mon_hoc')
            ->get();

        return response()->json([
            'data' => $data,
        ]);
    }
    public function create(Request $request){
        CauHoi::create([
            'id_mon_hoc' => $request->id_mon_hoc,
            'ten_cau_hoi' => $request->ten_cau_hoi,
            'dap_an_dung' => $request->dap_an_dung,
            'dap_an_a' => $request->dap_an_a,
            'dap_an_b' => $request->dap_an_b,
            'dap_an_c' => $request->dap_an_c,
            'dap_an_d' => $request->dap_an_d,
            'noi_dung_tra_loi' => $request->noi_dung_tra_loi,
            'loai_cau_hoi' => $request->loai_cau_hoi,
            'chuan_dau_ra' => $request->chuan_dau_ra
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm mới câu hỏi thành công!'
        ]);
    }
}
