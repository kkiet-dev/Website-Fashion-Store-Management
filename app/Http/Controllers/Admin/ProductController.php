<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function show_product_content()
    {
        $categories = ProductCategory::all();
        // Lấy tất cả sản phẩm từ bảng products
        $products = Product::all();
        if(Auth::check())
        {
            if(Auth::user()->role_id == 1){
                return view('admin.pages.products', compact('products'));
            }
            else{
                return redirect("login")->with('error', 'Bạn cần quyền admin để truy cập trang này');
            }
        }
        else{
            return redirect("login")->withSuccess('You do not have access');
        }
       
    }

  

    public function show_create_content()
    {
        $categories = ProductCategory::all();
        if(Auth::check())
        {
            if(Auth::user()->role_id == 1)
            {
                return view('admin.pages.product_create',compact('categories'));
            }
            else{
                return redirect("login")->with('error', 'Bạn cần quyền admin để truy cập trang này');
            }
        }
        else
        {
            return redirect("login")->withSucces('You do not have access');
        }
      
    }
    // public function store(Request $request)
    // {
    //     $products = Product::all();
    //     // Xác thực dữ liệu
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    //         'description' => 'required|string|max:1000',
    //         'price' => 'required|numeric|min:0',
    //         'quantity' => 'required|integer|min:0',
    //         'category_id' => 'required|integer|exists:product_categories,id',
    //     ]);

    
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->storeAs('public/products', $imageName); // Đúng cấu trúc Laravel
    //         $validatedData['image'] = $imageName; // Chỉ lưu tên file
    //     } else {
    //         $validatedData['image'] = null;
    //     }
    //     // Tạo sản phẩm mới với dữ liệu đã xác thực
    //     Product::create($request->all());

    //     // Chuyển hướng về danh sách sản phẩm với thông báo
    //     return redirect()->route('products')->with('success', 'Product added successfully.');
    // }
    public function store(Request $request)
    {
        $products = Product::all();
        // Xác thực dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|integer|exists:product_categories,id',
        ]);

    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/products', $imageName); // Đúng cấu trúc Laravel
            $validatedData['image'] = $imageName; // Chỉ lưu tên file
        } else {
            $validatedData['image'] = null;
        }
        // Tạo sản phẩm mới với dữ liệu đã xác thực
        // Product::create($request->all());
        Product::create($validatedData);

        // Chuyển hướng về danh sách sản phẩm với thông báo
        return redirect()->route('products')->with('success', 'Product added successfully.');
    }


    public function edit($id){
        // $user = User::findOrFail($id);
        // return view('admin.layouts.user_edit');
        $categories = ProductCategory::all();

        $products = Product::findOrFail($id); // Lấy thông tin user dựa trên ID
        return view('admin.pages.product_edit', compact('products','categories'),); // Truyền biến $user vào view compact('product')
    }
    public function update(Request $request,$id){
        $categories = ProductCategory::all();
        $products = Product::findOrFail($id);

        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description'=> 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'quantity'=>'required|integer|min:0',
            'category_id' => 'required|integer|exists:product_categories,id'
        ]);

        $products->name = $validateData['name'];
        $products->description = $validateData['description'];
        $products->price = $validateData['price'];
        $products->quantity = $validateData['quantity'];
        $products->category_id = $validateData['category_id'];
     
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
    
            // Lưu ảnh mới
            $image->storeAs('public/products', $imageName);
    
            // Xóa ảnh cũ nếu tồn tại
            // }
            if (!empty($products->image) && File::exists(public_path('storage/products/' . $products->image))) {
                File::delete(public_path('storage/products/' . $products->image));
            }
    
            // Gán ảnh mới vào mảng validatedData
            $validatedData['image'] = $imageName;
        } else {
            // Nếu không có ảnh mới, giữ nguyên ảnh cũ
            $validatedData['image'] = $products->image;
        }

        $products->update($validatedData);

        // Product::update($validatedData);

        return redirect()->route('products')->with('success', 'Product updated successfully.'); 
    }
    public function delete($id)
    {
        // Tìm sản phẩm theo ID
        $products = Product::findOrFail($id);

        // Thực hiện xóa sản phẩm
        $products->delete();

        // Chuyển hướng về danh sách sản phẩm với thông báo thành công
        return redirect()->route('products')->with('success', 'Product deleted successfully.');
    }
}
