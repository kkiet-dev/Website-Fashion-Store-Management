<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;

class OderController extends Controller
{
    public function show_oder()
    {
        $shipping = Shipping::all();
        return view('admin.pages.oder', compact('shipping'));
    }


    public function show_oder_detail($id)
    {
        // Lấy thông tin đơn hàng từ bảng `shipping` với quan hệ user và product
        $shipping = Shipping::with(['user', 'product'])->find($id);

        // Kiểm tra nếu không tìm thấy đơn hàng
        if (!$shipping) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
        }

        // Trả dữ liệu về view `oder_detail`
        return view('admin.pages.oder_detail', compact('shipping'));
    }

    public function delete($id)
    {
        // Tìm sản phẩm theo ID
        $shipping = Shipping::findOrFail($id);

        // Thực hiện xóa sản phẩm
        $shipping->delete();

        // Chuyển hướng về danh sách sản phẩm với thông báo thành công
        return redirect()->route('oder.show')->with('success', 'Product deleted successfully.');
    }
}
