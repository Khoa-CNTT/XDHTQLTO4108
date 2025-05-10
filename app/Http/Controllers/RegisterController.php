<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('SinhVien.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:sinh_viens,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $sinhvien = new SinhVien();
        $sinhvien->ho_ten = $request->fullname;
        $sinhvien->email = $request->email;
        $sinhvien->password = Hash::make($request->password);
        $sinhvien->save();

        return redirect('/login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }
}
