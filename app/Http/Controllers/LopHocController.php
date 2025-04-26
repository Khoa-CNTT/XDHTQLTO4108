<?php

namespace App\Http\Controllers;

use App\Http\Requests\A\LopHocCreateRequest;
use App\Http\Requests\Admin\LopHocCreateRequest as AdminLopHocCreateRequest;
use App\Http\Requests\Admin\LopHocUpdateRequest;
use App\Models\Admin;
use App\Models\GiangVien;
use App\Models\LopHoc;
use Illuminate\Http\Request;

class LopHocController extends Controller
{
    public function getData()
    {
        // 1. Danh sách lớp (có join để hiển thị tên môn + tên GV)
        $lopHoc = LopHoc::select(
            'lop_hocs.*',
            'giang_viens.ho_va_ten',
            'mon_hocs.ten_mon_hoc'
        )
            ->join('mon_hocs', 'mon_hocs.id', '=', 'lop_hocs.id_mon_hoc')
            ->join('giang_viens', 'giang_viens.id', '=', 'lop_hocs.id_giang_vien')
            ->get();

        // 2. Danh sách giảng viên active (tinh_trang = 1)
        $giangVienActive = GiangVien::select('id', 'ho_va_ten', 'ma_giang_vien')
            ->where('trang_thai', 1)
            ->get();

        return response()->json([
            'lophoc'        => $lopHoc,
            'giang_vien'    => $giangVienActive,
        ]);
    }
    public function getDataOpen()
    {
        $lophoc = LopHoc::where('trang_thai', 1)->get();

        return response()->json([
            'lophoc' => $lophoc
        ]);
    }

    public function store(AdminLopHocCreateRequest $request)
    {
        LopHoc::create([
            'ten_lop' => $request->ten_lop,
            'ma_lop' => $request->ma_lop,
            'trang_thai' => $request->trang_thai,
            'id_giang_vien' => $request->id_giang_vien,
            'id_mon_hoc' => $request->id_mon_hoc,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Thêm Mới lớp học thành công!'
        ]);
    }
    public function update(LopHocUpdateRequest $request)
    {
        LopHoc::where('id', $request->id)->update([
            'ten_lop' => $request->ten_lop,
            'ma_lop' => $request->ma_lop,
            'trang_thai' => $request->trang_thai,
            'id_giang_vien' => $request->id_giang_vien,
            'id_mon_hoc' => $request->id_mon_hoc,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Cập nhật lớp học thành công!'
        ]);
    }
    public function destroy(LopHocUpdateRequest $request)
    {
        LopHoc::where('id', $request->id)->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Xóa lớp học thành công!'
        ]);
    }
    public function search(Request $request)
    {
        $noi_dung = $request->noi_dung;

        $data = LopHoc::join('giang_viens', 'lop_hocs.id_giang_vien', '=', 'giang_viens.id')
            ->join('mon_hocs', 'lop_hocs.id_mon_hoc', '=', 'mon_hocs.id')
            ->select('lop_hocs.*', 'giang_viens.ho_va_ten', 'mon_hocs.ten_mon_hoc')
            ->where(function ($query) use ($noi_dung) {
                $query->where('lop_hocs.ten_lop', '=', $noi_dung)
                    ->orWhere('lop_hocs.ma_lop', '=', $noi_dung)
                    ->orWhere('giang_viens.ho_va_ten', '=', $noi_dung)
                    ->orWhere('mon_hocs.ten_mon_hoc', '=', $noi_dung);
            })
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function changeStatus(Request $request)
    {
        $status = LopHoc::where('id', $request->id)->first();

        if ($status->trang_thai == 1) {
            $status->trang_thai = 0;
        } else {
            $status->trang_thai = 1;
        }
        $status->save();
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Bạn đã cập nhật trạng thái lớp học ' . $request->ten_lop . ' thành công'
        ]);
    }
    public function getDataOpenGiangVien()
    {
        $giangvien = GiangVien::where('trang_thai', 1)->get();

        return response()->json([
            'giangvien' => $giangvien
        ]);
    }
}
