<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function login()
    {
        return view('SinhVien.login');
    }

    // Xử lý đăng nhập
    public function loginAction(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('sinh_vien')->attempt($credentials)) {
            $user = Auth::guard('sinh_vien')->user();
            if($user->trang_thai == 0){
                return back()->withErrors(['email' => 'Tài khoản của bạn đã bị khóa!'])->withInput();
            }
            return redirect('/dashboard');
        } else {
            return back()->withErrors(['email' => 'Tài khoản hoặc mật khẩu không đúng!'])->withInput();
        }
    }

    // Đăng xuất
    public function logout()
    {
        Auth::guard('sinh_vien')->logout();
        return redirect('/login');
    }
}
