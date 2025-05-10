<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $check = Auth::guard('admin')->check();
        if (!$check) {
            return redirect('/admin/login')->with('error', 'Vui lòng đăng nhập để truy cập');
        }
        $user = Auth::guard('admin')->user();
        if ($user->is_admin == 1 || $user->trang_thai == 1) {
            return $next($request);
        }
        return redirect('/admin/login')->with('error', 'Tài khoản của bạn không có quyền truy cập');
    }
}
