<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }
    public function handle($request, Closure $next)
    {
        // Kiểm tra nếu người dùng là admin (id từ 1 đến 2)
        if (Auth::check() && Auth::id() > 0 && Auth::id() < 2) {
            // Chuyển hướng đến trang quản trị
            return redirect()->route('admin.home');
        }
        else{
            return "not found";
        }
        // Nếu không phải admin, tiếp tục thực hiện request
        //return $next($request);
    }
}
