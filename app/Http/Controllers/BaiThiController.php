<?php

namespace App\Http\Controllers;

use App\Models\BaiThi;
use Illuminate\Http\Request;

class BaiThiController extends Controller
{
    public function getData()
    {
        $baiThi = BaiThi::select('bai_this.*', 'mon_hocs.ten_mon_hoc', 'lop_hocs.ten_lop', 'loai_bai_this.ten_loai_bai_thi')
            ->join('mon_hocs', 'mon_hocs.id', '=', 'bai_this.id_mon_hoc')
            ->join('lop_hocs', 'lop_hocs.id', '=', 'bai_this.id_lop_hoc')
            ->join('loai_bai_this', 'loai_bai_this.id', '=', 'bai_this.id_loai_bai_thi')
            ->get();

        return response()->json([
            'baithi' => $baiThi,
        ]);
    }

    public function store(Request $request)
    {
        BaiThi::create([
            'ten_bai_thi' => $request->ten_bai_thi,
            'ngay_bat_dau' => $request->ngay_bat_dau,
            'ngay_ket_thuc' => $request->ngay_ket_thuc,
            'thoi_gian_thi' => $request->thoi_gian_thi,
            'trang_thai' => $request->trang_thai,
            'id_mon_hoc' => $request->id_mon_hoc,
            'id_lop_hoc' => $request->id_lop_hoc,
            'id_loai_bai_thi' => $request->id_loai_bai_thi,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm Mới bài thi ' . $request->ten_bai_thi .' thành công!'
        ]);
    }
}
