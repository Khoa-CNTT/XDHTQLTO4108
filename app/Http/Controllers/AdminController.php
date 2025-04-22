<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function login(Request $request)
    {
        // Dựa vào $request->email và $request->password
        $user = Admin::where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if ($user) {
            return response()->json([
                'status'  => 1,
                'message' => 'Đăng nhập thành công',
                'key'     => $user->createToken('key_admin')->plainTextToken,
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => 'Tài khoản hoặc mật khẩu không đúng'
            ]);
        }
    }

    public function checklogin(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        if($user && $user instanceof \App\Models\Admin )  {
            return response()->json([
                'status' => 1,
            ]);
        }
    }
}
