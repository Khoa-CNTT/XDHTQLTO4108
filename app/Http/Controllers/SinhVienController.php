<?php

namespace App\Http\Controllers;

use App\Http\Requests\SinhVienCreateRequest;
use App\Http\Requests\SinhVienDeleteRequest;
use App\Http\Requests\SinhVienUpdateRequest;
use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SinhVienController extends Controller
{
    public function getData(){
        $sinhVien = SinhVien::get();
        return response()->json([
            'sinhvien'  => $sinhVien
        ]);
    }
    public function store(SinhVienCreateRequest $request){
        SinhVien::create([
            'ho_va_ten' => $request->ho_va_ten,
            'can_cuoc'  => $request->can_cuoc,
            'ma_sinh_vien'  => $request->ma_sinh_vien,
            'email'     => $request->email,
            'password'  => Hash::make(123456),
            'so_dien_thoai' => $request->so_dien_thoai,
            'thong_tin_chung'   => $request->thong_tin_chung,
            'anh_dai_dien'      => $request->anh_dai_dien,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Thêm Mới sinh viên thành công!',
        ]);
    }
    public function update(SinhVienUpdateRequest $request){
        SinhVien::where('id', $request->id)->update([
            'ho_va_ten' => $request->ho_va_ten,
            'can_cuoc'  => $request->can_cuoc,
            'ma_sinh_vien'  => $request->ma_sinh_vien,
            'email'     => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'thong_tin_chung'   => $request->thong_tin_chung,
            'trang_thai' => $request->trang_thai,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Cập nhật sinh viên thành công!',
        ]);
    }
    public function destroy(SinhVienDeleteRequest $request){
        SinhVien::where('id', $request->id)->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Xóa sinh viên thành công!',
        ]);
    }
}
