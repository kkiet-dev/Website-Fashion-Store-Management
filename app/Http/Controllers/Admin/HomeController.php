<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categories;
use App\Models\Shipping;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function show_dashboard_content(){
        $username = session('username', 'Guest');
        $totalPrices = Shipping::sum('price');
        $totalUsers = User::count('id');
        $timeThreshold = Carbon::now()->subHours(24);

        // Đếm số lượng user được đăng ký trong vòng 24 giờ
        $recentUsersCount = User::where('created_at', '>=', $timeThreshold)->count();
    
        if(Auth::check()){
            // Kiểm tra id người dùng
            if (Auth::user()->role_id == 1) {
                // Nếu id là 1, cho phép truy cập dashboard
                return view('admin.pages.dashboard', compact('username','totalPrices','totalUsers','recentUsersCount'));
            } else {
                // Nếu id không phải là 1, redirect về trang login và thông báo lỗi
                return redirect("login")->with('error', 'Bạn cần có quyền admin để truy cập trang này');
            }
        }
        return redirect("login")->withSuccess('Opps! You do not have access');

    }

    public function show_users_content(){
         
        $users = User::all(); 
        $username = session('username', 'Guest');
        if(Auth::user()->role_id == 1){
            return view('admin.pages.users', compact('users'));
        }
        else {
            // Nếu id không phải là 1, redirect về trang login và thông báo lỗi
            return redirect("login")->with('error', 'Bạn cần có quyền admin để truy cập trang này');
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function show_billing_content(){
        if(Auth::user()->role_id == 1){
            return view('admin.pages.billing');
        }else {
            return redirect("login")->with('error', 'Bạn cần có quyền admin để truy cập trang này');
        }
    }

    
    public function show_profile_content(){
        return view('admin.pages.profile');
    }

}
