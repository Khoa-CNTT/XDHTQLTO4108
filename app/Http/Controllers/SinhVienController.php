<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\SinhVienCreateRequest as AdminSinhVienCreateRequest;
use App\Http\Requests\Admin\SinhVienDeleteRequest as AdminSinhVienDeleteRequest;
use App\Http\Requests\Admin\SinhVienUpdateRequest as AdminSinhVienUpdateRequest;
use App\Http\Requests\SinhVienCreateRequest;
use App\Http\Requests\SinhVienDeleteRequest;
use App\Http\Requests\SinhVienLoginRequest;
use App\Http\Requests\SinhVienUpdateRequest;
use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SinhVienController extends Controller
{
    public function getData()
    {
        $sinhvien = SinhVien::select('sinh_viens.*', 'khoas.ten_khoa')
            ->join('khoas', 'khoas.id', 'sinh_viens.khoa_id')
            ->get();

        return response()->json([
            'sinhvien' => $sinhvien
        ]);
    }
    public function store(AdminSinhVienCreateRequest $request)
    {

        // Lấy số lượng giảng viên hiện tại để tạo mã giảng viên tự động
        $sinhvienCount = SinhVien::count();

        // Tạo mã giảng viên tự động theo định dạng GV + số thứ tự, ví dụ: GV0001, GV0002,...
        $masinhvien = 'SV' . str_pad($sinhvienCount + 1, 4, '0', STR_PAD_LEFT);
        SinhVien::create([
            'ho_va_ten' => $request->ho_va_ten,
            'can_cuoc'  => $request->can_cuoc,
            'ma_sinh_vien'  => $request->ma_sinh_vien,
            'email'     => $request->email,
            'password'  => Hash::make(123456),
            'so_dien_thoai' => $request->so_dien_thoai,
            'thong_tin_chung'   => $request->thong_tin_chung,
            'anh_dai_dien'      => $request->anh_dai_dien,
            'khoa_id' => $request->khoa_id,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Thêm Mới sinh viên thành công!',
        ]);
    }
    public function update(AdminSinhVienUpdateRequest $request)
    {

        // Lấy số lượng giảng viên hiện tại để tạo mã giảng viên tự động
        $sinhvienCount = SinhVien::count();

        // Tạo mã giảng viên tự động theo định dạng GV + số thứ tự, ví dụ: GV0001, GV0002,...
        $masinhvien = 'SV' . str_pad($sinhvienCount + 1, 4, '0', STR_PAD_LEFT);

        SinhVien::where('id', $request->id)->update([
            'ho_va_ten' => $request->ho_va_ten,
            'can_cuoc'  => $request->can_cuoc,
            'ma_sinh_vien'  => $request->ma_sinh_vien,
            'email'     => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'thong_tin_chung'   => $request->thong_tin_chung,
            'trang_thai' => $request->trang_thai,
            'khoa_id' => $request->khoa_id,
            'anh_dai_dien' =>$request->anh_dai_dien,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Cập nhật sinh viên thành công!',
        ]);
    }
    public function destroy(AdminSinhVienDeleteRequest $request)
    {
        SinhVien::where('id', $request->id)->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Xóa sinh viên thành công!',
        ]);
    }
    public function changeStatus(Request $request){
        $status = SinhVien::where('id', $request->id)->first();

        if ($status->trang_thai == 1) {
            $status->trang_thai = 0;
        } else {
            $status->trang_thai = 1;
        }
        $status->save();
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Bạn đã cập nhật trạng thái sinh viên' . $request->ho_va_ten . ' thành công'
        ]);
    }
    public function search(Request $request)
    {
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = SinhVien::join('khoas', 'sinh_viens.khoa_id', '=', 'khoas.id')
            ->select('sinh_viens.*', 'khoas.ten_khoa')
            ->where(function ($query) use ($noi_dung) {
                $query->where('sinh_viens.ho_va_ten', 'like', $noi_dung)
                    ->orWhere('sinh_viens.email', 'like', $noi_dung)
                    ->orWhere('sinh_viens.so_dien_thoai', 'like', $noi_dung)
                    ->orWhere('sinh_viens.ma_sinh_vien', 'like', $noi_dung)
                    ->orWhere('sinh_viens.can_cuoc', 'like', $noi_dung)
                    ->orWhere('khoas.ten_khoa', 'like', $noi_dung);
            })
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }
    public function login(SinhVienLoginRequest $request)
    {
        $sinhvien = SinhVien::where('email', $request->email)
            ->where('password', Hash::make($request->password))
            ->first();

        if ($sinhvien) {
            return response()->json([
                'status'  => 1,
                'message' => 'Đăng nhập thành công',
                'key'     => $sinhvien->createToken('key_sinhvien')->plainTextToken,
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => 'Tài khoản hoặc mật khẩu không đúng'
            ]);
        }
    }
    public function checkLogin()
    {
        $user = Auth::guard('sanctum')->user();

        if($user && $user instanceof \App\Models\SinhVien )  {
            return response()->json([
                'status' => 1,
            ]);
        }
    }
}
