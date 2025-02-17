<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Fortify;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLoginForm()
    {
        return view('login');
    }
    //--router to signup page
    public function showSignupForm()
    {
        $roles = Role::all();
        return view('signup', compact('roles'));
    }
    // public function login(Request $request): RedirectResponse
    // {
    
    //     // Lớp xác thực thứ nhất
    //     $request->validate([
    //         'email' => 'required|email',  // Thêm điều kiện định dạng email
    //         'password' => 'required',
    //     ]);

    //     // Xác thực tài khoản thứ hai
    //     if (Auth::attempt($request->only('email', 'password'))) {
    //         // Lưu tên người dùng vào session
    //         session(['username' => Auth::user()->name]);

    //         // Lấy thông tin vai trò của người dùng
    //         $user = Auth::user();
    //         if ($user->role_id == 1) {
    //             // Điều hướng đến dashboard nếu role_id là admin
    //             // return redirect()->route('admin.dashboard');
    //             return redirect()->intended('/dashboard');
    //         } elseif ($user->role_id == 2) {
    //             // Điều hướng đến home_user nếu role_id là user
    //             return redirect()->intended('/home_user');
    //             // return redirect()->intended('/home_user');
    //         }

    //         // Nếu không xác định được vai trò, đăng xuất và báo lỗi
    //         return redirect()->back()->withErrors(['login' => 'Email hoặc mật khẩu không đúng.']);
    //     }
    // }
    public function login(Request $request): RedirectResponse
{
    // Lớp xác thực thứ nhất
    $request->validate([
        'email' => 'required|email',  // Thêm điều kiện định dạng email
        'password' => 'required',
    ]);

    // Xác thực tài khoản thứ hai
    if (Auth::attempt($request->only('email', 'password'))) {
        // Lưu tên người dùng vào session
        session(['username' => Auth::user()->name]);

        // Lấy thông tin vai trò của người dùng
        $user = Auth::user();
        if ($user->role_id == 1) {
            // Điều hướng đến dashboard nếu role_id là admin
            return redirect()->intended('/dashboard');
        } elseif ($user->role_id == 2) {
            // Điều hướng đến home_user nếu role_id là user
            return redirect()->intended('/');
        }

        // Nếu không xác định được vai trò, đăng xuất và báo lỗi
        Auth::logout();
        return redirect()->back()->withErrors(['login' => 'Vai trò của tài khoản không hợp lệ.']);
    }

    // Trường hợp xác thực thất bại
    return redirect()->back()->withErrors(['login' => 'Email hoặc mật khẩu không đúng.']);
}

 
    public function signup(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        
        $data = $request->all();
        $user = $this->create($data);

        Auth::login($user);

        return redirect("/")->withSuccess('Great! You have Successfully loggedin');
    }

        /**
     * Show the form for creating a new resource.
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role_id' => 2,
      ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
