<?php

namespace App\Http\Controllers\User;
use App\Models\Product;
use App\Models\Comment;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductUserController extends Controller
{
    public function show_about_user_content(){
            $categories = ProductCategory::all();
            // Lấy tất cả sản phẩm từ bảng products
            $products = Product::all();
            return view('users.pages.about', compact('products','categories'));

    }


    public function show_product_detail_content($id)
    {
        // Sử dụng findOrFail để tự động chuyển hướng khi không tìm thấy sản phẩm
        $products = Product::with('comments.user')->findOrFail($id);
    
        // Lấy tất cả danh mục sản phẩm
        $categories = ProductCategory::all();
    
        // Sắp xếp các comment theo thời gian tạo từ mới nhất
        $comments = $products->comments()->orderBy('created_at', 'desc')->get();
    
        // Trả về view và truyền dữ liệu
        return view('users.pages.product_detail', compact('products', 'categories', 'comments'));
    }
    

    public function show_product_trouser_content()
    {

        $categories = ProductCategory::all();

        // Lấy sản phẩm có category name = "quần nam"
        $products = Product::whereHas('category', function ($query) {
            $query->where('name', 'Quần dài'); 
        })->get();

        return view('users.pages.product_trousers', compact('products', 'categories'));
    }

    public function show_product_Jackets_content() 
    {
        $categories = ProductCategory::all();

      
        $products = Product::whereHas('category', function ($query) {
            $query->where('name', 'Áo khoác'); 
        })->get();

        return view('users.pages.product_Jackets', compact('products', 'categories'));
    }

    public function show_product_Tshirts_content()
    {
      
        $categories = ProductCategory::all();

      
        $products = Product::whereHas('category', function ($query) {
            $query->where('name', 'Áo thun'); 
        })->get();

        return view('users.pages.product_Tshirts', compact('products', 'categories'));
    }

    public function show_product_Carpri_content()
    {
      
        $categories = ProductCategory::all();

      
        $products = Product::whereHas('category', function ($query) {
            $query->where('name', 'Quần ngắn'); 
        })->get();

        return view('users.pages.product_Tshirts', compact('products', 'categories'));
    }
}
