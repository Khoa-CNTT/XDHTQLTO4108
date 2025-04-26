<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdmingDoiMatKhauRequest;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{


    public function login(AdminLoginRequest $request)
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

                'username' => $user->username,
                'email' => $user->email
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => 'Tài khoản hoặc mật khẩu không đúng'
            ]);
        }
    }

    public function checklogin()
    {
        $user = Auth::guard('sanctum')->user();

        if ($user && $user instanceof \App\Models\Admin) {
            return response()->json([
                'status' => 1,
                'username' => $user->username,
                'email' => $user->email
            ]);
        }

        return response()->json([
            'status' => 0,
            'message' => 'Người dùng chưa đăng nhập'
        ], 401);
    }
    public function logOut()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && $user instanceof \App\Models\Admin) {
            DB::table('personal_access_tokens')
                ->where('id', $user->currentAccessToken()->id)
                ->delete();
            return response()->json([
                'status'  => 1,
                'message' => "Đăng xuất thành công",
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Có lỗi xảy ra",
            ]);
        }
    }
    public function resultPassword(Request $request)
    {
        $user = Admin::where('email', $request->email)->first();
        if ($user) {
            $hash_reset = Str::uuid();
            $user->hash_reset = $hash_reset;
            $user->save();

            $data['username'] = $user->username;
            $data['link'] = 'http://localhost:5173/admin/doi-mat-khau/' . $hash_reset;

            // Nếu không dùng mail, trả về link trong JSON để frontend dùng luôn
            return response()->json([
                'status'  => 1,
                'message' => "Lấy link đổi mật khẩu thành công",
                'link'    => $data['link'],  // <-- trả về link ở đây
                'hash_reset' => $hash_reset // <-- nếu cần
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Tài khoản không tồn tại",
            ]);
        }
    }
    public function changePassword(AdmingDoiMatKhauRequest $request)
    {
        $user = Admin::where('hash_reset', $request->hash_reset)->first();

        if ($user) {
            $user->password = $request->password;
            // KHÔNG xóa hash_reset
            $user->save();

            return response()->json([
                'status'  => 1,
                'message' => "Đổi Mật Khẩu Thành Công",
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Mã đổi mật khẩu không tồn tại",
            ]);
        }
    }
}
