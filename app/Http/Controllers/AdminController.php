<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.Page.Login.index');
    }

    public function login(Request $request)
    {
        $check = Auth::guard('admin')->attempt([
            'email'     => $request->email,
            'password'  => $request->password,
        ]);
        if($check) {
            $user = Auth::guard('admin')->user();
            if($user->trang_thai == 1) {
                return response()->json(['status' => true, 'message' => 'Đăng nhập thành công!']);
            }
            return response()->json(['status' => false, 'message' => 'Tài khoản đã bị khóa!']);
        }
        return response()->json(['status' => false, 'message' => 'Tài khoản hoặc mật khẩu không đúng!']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
