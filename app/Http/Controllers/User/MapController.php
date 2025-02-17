<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MapController extends Controller
{
    public function showMap()
    {
        $user = auth()->user();
        
        // Lấy địa chỉ mặc định từ cơ sở dữ liệu của người dùng
        $defaultAddress = $user ? $user->address : null;
        
        // Kiểm tra xem có địa chỉ tạm thời trong session không
        $tempAddress = session('temp_address', null);
        
        // Truyền địa chỉ mặc định hoặc tạm thời vào view
        return view('users.pages.select_map', compact('defaultAddress', 'tempAddress'));
    }

    public function updateAddress(Request $request)
    {
        $user = auth()->user();

        if ($user) {
            $user->address = $request->input('address');
            $user->save();
            return redirect()->route('cart.show')->with('success', 'Địa chỉ đã được cập nhật.');
        }

        return redirect()->route('cart.show')->with('error', 'Vui lòng đăng nhập để cập nhật địa chỉ.');
    }

    public function updateTempAddress(Request $request)
    {
        $address = $request->input('address');
        
        // Lưu địa chỉ vào session
        $request->session()->put('temp_address', $address);

        return redirect()->route('cart.show')->with('success', 'Địa chỉ tạm thời đã được cập nhật.');
    }
    
}
