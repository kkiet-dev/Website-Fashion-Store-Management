<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


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

    public function tetsAPI()
    {
        $client = new Client();

        try {
            // Gọi API từ Node.js
            $response = $client->get('http://localhost:3000/users');

            // Lấy dữ liệu JSON từ API
            $users = json_decode($response->getBody(), true);

            // Trả về view với dữ liệu người dùng
            return view('users.tetsAPI.tetsAPI', ['users' => $users]);
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return view('error', ['message' => $e->getMessage()]);
        }
     
    }

    public function getProductAPI(){

        $getserve = new Client();

        try{
            $repon = $getserve->get('http://localhost:30000/products');

            $products = json_decode($repon->getBody(), true);

            return view('users.tetsAPI.testProductAPI', ['products'=>$products]);
        }
        catch(\Exception $e){
            return view('errorApi');
        }
    }

  
    
}
