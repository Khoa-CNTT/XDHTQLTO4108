<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\GiangVienCreateRequest as AdminGiangVienCreateRequest;
use App\Http\Requests\Admin\GiangVienDeleteRequest as AdminGiangVienDeleteRequest;
use App\Http\Requests\Admin\GiangVienUpdateRequest as AdminGiangVienUpdateRequest;
use App\Models\GiangVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GiangVienController extends Controller
{
    // Lấy dữ liệu giảng viên
    public function getData()
    {
        $giangVien = GiangVien::select('giang_viens.*', 'khoas.ten_khoa')
            ->join('khoas', 'khoas.id', 'giang_viens.khoa_id')
            ->get();

        return response()->json([
            'giangvien' => $giangVien
        ]);
    }
    // Thêm giảng viên mới
    public function store(AdminGiangVienCreateRequest $request)
    {
        // Lấy số lượng giảng viên hiện tại để tạo mã giảng viên tự động
        $giangVienCount = GiangVien::count();

        // Tạo mã giảng viên tự động theo định dạng GV + số thứ tự, ví dụ: GV0001, GV0002,...
        $maGiangVien = 'GV' . str_pad($giangVienCount + 1, 4, '0', STR_PAD_LEFT);

        // Tạo giảng viên mới
        GiangVien::create([
            'ho_va_ten' => $request->ho_va_ten,
            'can_cuoc' => $request->can_cuoc,
            'ma_giang_vien' => $maGiangVien,  // Mã giảng viên tự động
            'email' => $request->email,
            'password' => Hash::make(123456),
            'so_dien_thoai' => $request->so_dien_thoai,
            'thong_tin_chung' => $request->thong_tin_chung,
            'anh_dai_dien' => $request->anh_dai_dien,
            'khoa_id' => $request->khoa_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm Mới giảng viên thành công!',
        ]);
    }

    // Cập nhật giảng viên
    public function update(AdminGiangVienUpdateRequest $request)
    {
        // Lấy số lượng giảng viên hiện tại để tạo mã giảng viên tự động
        $giangVienCount = GiangVien::count();

        // Tạo mã giảng viên tự động theo định dạng GV + số thứ tự, ví dụ: GV0001, GV0002,...
        $maGiangVien = 'GV' . str_pad($giangVienCount + 1, 4, '0', STR_PAD_LEFT);

        // Tạo giảng viên mới
        // Cập nhật giảng viên
        GiangVien::where('id', $request->id)->update([
            'ho_va_ten' => $request->ho_va_ten,
            'can_cuoc' => $request->can_cuoc,
            'ma_giang_vien' => $request->ma_giang_vien,  // Mã giảng viên có thể được chỉnh sửa
            'email' => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'thong_tin_chung' => $request->thong_tin_chung,
            'trang_thai' => $request->trang_thai,
            'khoa_id' => $request->khoa_id,
            'anh_dai_dien' => $request->anh_dai_dien,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật giảng viên thành công!',
        ]);
    }

    // Xóa giảng viên
    public function destroy(AdminGiangVienDeleteRequest $request)
    {
        GiangVien::where('id', $request->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa giảng viên thành công!',
        ]);
    }
    public function search(Request $request)
    {
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = GiangVien::join('khoas', 'giang_viens.khoa_id', '=', 'khoas.id')
            ->select('giang_viens.*', 'khoas.ten_khoa')
            ->where(function ($query) use ($noi_dung) {
                $query->where('giang_viens.ho_va_ten', 'like', $noi_dung)
                    ->orWhere('giang_viens.email', 'like', $noi_dung)
                    ->orWhere('giang_viens.so_dien_thoai', 'like', $noi_dung)
                    ->orWhere('giang_viens.ma_giang_vien', 'like', $noi_dung)
                    ->orWhere('giang_viens.can_cuoc', 'like', $noi_dung)
                    ->orWhere('khoas.ten_khoa', 'like', $noi_dung);
            })
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }
    public function changeStatus(Request $request)
    {
        $status = GiangVien::where('id', $request->id)->first();

        if ($status->trang_thai == 1) {
            $status->trang_thai = 0;
        } else {
            $status->trang_thai = 1;
        }
        $status->save();
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Bạn đã cập nhật trạng thái giảng viên ' . $request->ho_va_ten . ' thành công'
        ]);
    }
    public function getDataOpen()
    {
        // Lọc theo cột 'trang_thai', không phải 'tinh_trang'
        $gv = GiangVien::select('id', 'ho_va_ten', 'ma_giang_vien')
            ->where('trang_thai', 1)
            ->get();

        return response()->json([
            'giangvien' => $gv
        ]);
    }
}
