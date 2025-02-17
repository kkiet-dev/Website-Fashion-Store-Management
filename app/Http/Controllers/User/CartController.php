<?php

namespace App\Http\Controllers\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show_cart()
    {
        $user = auth()->user();

        OrderItem::where('created_at', '<', now()->subSeconds(60))->delete();

        $order = Order::where('user_id', auth()->id())
        ->where('status', 'cart')
        ->with('items.product')
        ->first();

        return view('users.pages.cart_oder', ['order' => $order,]);

    }

    public function addToCart(Request $request, $productId)
    {
        if (!auth()->check()) {
            return redirect('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        $userId = auth()->id();

        // Tìm hoặc tạo giỏ hàng
        $order = Order::firstOrCreate([
            'user_id' => $userId,
            'status' => 'cart',
        ]);

        // Lấy thông tin sản phẩm
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại!');
        }

        // Thêm sản phẩm vào giỏ hàng
        OrderItem::updateOrCreate(
            [
                'order_id' => $order->id,
                'product_id' => $productId,
            ],
            [
                'quantity' => $request->input('quantity', 1),
                'price' => $product->price,
            ]
        );

        // return redirect()->route('cart.show')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
        return redirect("cart_oder")->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    public function removeFromCart($productId)
    {
        if (!auth()->check()) {
            return redirect("login")->with('error', 'Bạn cần đăng nhập để thực hiện thao tác này.');
        }

        $userId = auth()->id();

        $order = Order::where('user_id', $userId)
            ->where('status', 'cart')
            ->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Giỏ hàng không tồn tại.');
        }

        $orderItem = OrderItem::where('order_id', $order->id)
            ->where('product_id', $productId)
            ->first();

        if (!$orderItem) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
        }

        $orderItem->delete();

        return redirect("cart_oder")->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }

}
