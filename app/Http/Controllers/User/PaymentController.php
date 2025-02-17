<?php

// namespace App\Http\Controllers;

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
class PaymentController extends Controller
{

    public function processPayment(Request $request)
    {
        $paymentMethod = $request->input('selected_payment_method');

        // Kiểm tra phương thức thanh toán
        if ($paymentMethod == '1') {

            $orderId = $request->input('order_id');
            $order = Order::findOrFail($orderId);

            $order = Order::where('user_id', auth()->id())->latest()->first();
            if (!$order) {
                return redirect()->back()->with('error', 'Không tìm thấy đơn hàng.');
            }

            // Thêm đơn hàng vào bảng shipping
            try {
                DB::table('shipping')->insert([
                    'order_id'    => $order->id,
                    'user_id'     => auth()->id(), // Lấy user_id từ người dùng hiện tại
                    'address'     => $order->address,
                    'phone'       => $order->phone,
                    'total_price' => $order->items->sum(fn($item) => $item->price * $item->quantity),
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);

                // Cập nhật trạng thái đơn hàng
                $order->update(['status' => 'processing']); // Ví dụ: cập nhật thành "đang xử lý"

                return redirect()->back()->with('success', 'Đặt hàng thành công!');
                // return redirect()->route('cart.show')->with('success', 'Đặt hàng thành công!');
            } catch (\Exception $e) {
                // Log lỗi để debug
                \Log::error('Lỗi xử lý đơn hàng: ' . $e->getMessage());

                return redirect()->back()->with('error', 'Đã xảy ra lỗi khi xử lý đơn hàng. Vui lòng thử lại.');
                // return redirect()->route('cart.show')->with('error', 'Đã xảy ra lỗi khi xử lý đơn hàng. Vui lòng thử lại.');
            }
        } elseif ($paymentMethod == '2') {
            // Chuyển khoản ngân hàng
            return redirect()->route('payment.infor'); // Chuyển đến trang thông tin thanh toán
        }

        return redirect()->back()->with('error', 'Phương thức thanh toán không hợp lệ.');
    }

    
    public function update(Request $request, $orderId)
    {
        // Xử lý logic mua hàng nếu đủ điều kiện
        $tempAddress = session('temp_address');
        $data = $request->all();
        $paymentMethod = $request->input('selected_payment_method');

        $orderItems = OrderItem::where('order_id', $orderId)->get();
 
        $user = auth()->user();

        // Kiểm tra điều kiện
        if (empty($user->phone) && empty($tempAddress) && empty($user->address)) {
            return redirect()->back()->with('error', 'Vui lòng cập nhật số điện thoại và địa chỉ để mua hàng.');
        }

        if (empty($user->phone)) {
            return redirect()->back()->with('error', 'Vui lòng cập nhật số điện thoại để mua hàng.');
        }

        if (empty($tempAddress) && empty($user->address)) {
            return redirect()->back()->with('error', 'Vui lòng cập nhật địa chỉ để mua hàng.');
        }

    
        // Xử lý logic đặt hàng
        foreach ($orderItems as $item) {
            $shippingAddress = $data['shipping_address'] ?? ($user->address ?: $tempAddress);
            $shippingItem = Shipping::where('order_id', $orderId)
                                    ->where('product_id', $item->product_id)
                                    ->first();
    
            if ($shippingItem) {
                $shippingItem->update([
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'shipping_address' => $shippingAddress,
                    'status' => 'pending',
                ]);
            } else {
                Shipping::create([
                    'order_id' => $orderId,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'shipping_address' => $shippingAddress,
                    'status' => 'pending',
                    'user_id' => $user->id,
                ]);
            }
        }
    
        return redirect()->route('shipping', $orderId)->with('shipsuccess', 'Bạn đã đặt hàng thành công! để đề mô cho quá trình giao hàng vui lòng 2 phút đơn hàng sẽ được giao');
 
    }
   
    public function updatePhone(Request $request)
    {
        // Kiểm tra xem có số điện thoại trong request không
        $phone = $request->input('phone');
        $user = auth()->user();

        // Kiểm tra nếu có số điện thoại và cập nhật vào cơ sở dữ liệu
        if ($phone) {
            $user->phone = $phone;
            $user->save();
            return redirect()->back()->with('success', 'Cập nhật số điện thoại thành công!');
        } else {
            return redirect()->back()->with('error', 'Vui lòng nhập số điện thoại hợp lệ.');
        }
    }

    


}
