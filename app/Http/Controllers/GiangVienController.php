<?php

namespace App\Http\Controllers;

use App\Http\Requests\GiangVienCreateRequest;
use App\Http\Requests\GiangVienDeleteRequest;
use App\Http\Requests\GiangVienUpdateRequest;
use App\Models\GiangVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GiangVienController extends Controller
{
    public function getData(){
        $giangVien = GiangVien::get();
        return response()->json([
            'giangvien'  => $giangVien
        ]);
    }
    public function store(GiangVienCreateRequest $request){
        GiangVien::create([
            'ho_va_ten' => $request->ho_va_ten,
            'can_cuoc' => $request->can_cuoc,
            'ma_giang_vien' => $request->ma_giang_vien,
            'email' => $request->email,
            'password' => Hash::make(123456),
            'so_dien_thoai' => $request->so_dien_thoai,
            'thong_tin_chung' => $request->thong_tin_chung,
            'anh_dai_dien' => $request->anh_dai_dien,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Thêm Mới giảng viên thành công!',
        ]);
    }
    public function update(GiangVienUpdateRequest $request){
        GiangVien::where('id', $request->id)->update([
            'ho_va_ten' => $request->ho_va_ten,
            'can_cuoc'  => $request->can_cuoc,
            'ma_giang_vien'  => $request->ma_giang_vien,
            'email'     => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'thong_tin_chung'   => $request->thong_tin_chung,
            'trang_thai' => $request->trang_thai,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Cập nhật giảng viên thành công!',
        ]);
    }
    public function destroy(GiangVienDeleteRequest $request){
        GiangVien::where('id', $request->id)->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Xóa giảng viên thành công!',
        ]);
    }
}
