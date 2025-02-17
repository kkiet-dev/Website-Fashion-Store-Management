<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;

class ShippingController extends Controller
{
    public function show_shipping_status()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem trạng thái đơn hàng.');
        }
    
        $user = auth()->user();
    
        // Lọc các đơn hàng thuộc về người dùng hiện tại
        $shipping = Shipping::where('user_id', $user->id)
            ->with('product') // Nếu cần lấy thông tin sản phẩm
            ->get()
            ->each(function ($order) {
                // Kiểm tra trạng thái và thời gian
                if ($order->status === 'pending' && $order->created_at <= now()->subMinutes(2)) {
                    $order->status = 'delivered';
                    $order->save();
                }
            });
    
        return view('users.pages.shipping', compact('shipping'));
    }
}
