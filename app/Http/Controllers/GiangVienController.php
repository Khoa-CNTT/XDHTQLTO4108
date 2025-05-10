<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Http\Requests\Admin\GiangVien\CreateGiangVienRequest;
use App\Models\GiangVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiangVienController extends Controller
{
    public function index()
    {
        return view('Admin.Page.GiangVien.index');
    }

    public function home()
    {
        return view('GiangVien.Page.Home.index');
    }

    public function store(CreateGiangVienRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt('123456');

        $lastGiangVien = GiangVien::latest()->first();
        $nextId = $lastGiangVien ? $lastGiangVien->id + 1 : 1;
        $data['ma_giang_vien'] = 'GV' . (100000 + $nextId);

        GiangVien::create($data);

        return $this->NotifiSuccess("Thêm giảng viên thành công!");
    }

    public function changeStatus(Request $request)
    {
        $data = $request->all();
        $giangVien = GiangVien::find($data['id']);

        if (!$giangVien) {
            throw new CustomException("Không tìm thấy giảng viên!");
        }

        $giangVien->update([
            'trang_thai' => !$giangVien->trang_thai,
        ]);

        return $this->NotifiSuccess("Thay đổi trạng thái thành công!");
    }

    public function updateGiangVien(Request $request)
    {
        $data = $request->all();
        $giangVien = GiangVien::find($data['id']);

        if (!$giangVien) {
            throw new CustomException("Không tìm thấy giảng viên!");
        }
        $giangVien->update($data);

        return $this->NotifiSuccess("Cập nhật giảng viên thành công!");
    }

    public function deleteGiangVien(Request $request)
    {
        $giangVien = GiangVien::find($request->id);
        if (!$giangVien) {
            throw new CustomException("Không tìm thấy giảng viên!");
        }

        $giangVien->delete();
        return $this->NotifiSuccess("Xóa giảng viên thành công!");
    }


    // GET
    public function getData()
    {
        $giangViens = GiangVien::all();

        return $this->ResData($giangViens);
    }

    public function indexLogin()
    {
        return view('GiangVien.Page.Login.index');
    }

    public function login(Request $request)
    {
        $check = Auth::guard('giang_vien')->attempt([
            'email'     => $request->email,
            'password'  => $request->password,
        ]);
        if($check) {
            return response()->json(['status' => true, 'message' => 'Đăng nhập thành công!']);
        }
        return response()->json(['status' => false, 'message' => 'Tài khoản hoặc mật khẩu không đúng!']);
    }

    public function logout()
    {
        Auth::guard('giang_vien')->logout();
        return redirect('/giang-vien/login')->with('success', 'Đăng xuất thành công!');
    }
}
