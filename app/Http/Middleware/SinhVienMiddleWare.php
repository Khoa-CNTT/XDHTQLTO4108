<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SinhVienMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $check = Auth::guard('sinh_vien')->check();
        if($check) {
            $user = Auth::guard('sinh_vien')->user();
            if($user->trang_thai == 0) {
                return redirect('/login')->route('login')->with('error', 'Tài khoản của bạn đã bị khóa');
            }
            return $next($request);
        } else {
            return redirect('/login')->route('login')->with('error', 'Bạn chưa đăng nhập');
        }
    }
}
