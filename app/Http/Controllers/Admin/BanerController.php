<?php

namespace App\Http\Controllers\Admin;

use App\Models\Baner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class BanerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show_baner_content()
    {
        $baners = Baner::all();
        return view('admin.pages.baner', compact('baners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show_create_content()
    {
        return view('admin.pages.baner_create');
    }

    
    public function store(Request $request)
    // {
    //     $baners = Baner::all();
    //     // Xác thực dữ liệu
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4000',
    //         'description' => 'required|string|max:1000',
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
    //     Baner::create($validatedData);

    //     // Chuyển hướng về danh sách sản phẩm với thông báo
    //     return redirect()->route('baner')->with('success', 'Product added successfully.');
    // }
    {
        $baners  = Baner::all();
        // Xác thực dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:6000',
            'description' => 'required|string|max:1000',
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
        Baner::create($validatedData);

        // Chuyển hướng về danh sách sản phẩm với thông báo
        return redirect()->route('baner')->with('success', 'Product added successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $baners = Baner::findOrFail($id); 
        return view('admin.pages.baner_edit', compact('baners'));
    }
    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request,$id)
    // {
    //     $baners = Baner::findOrFail($id); 
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'description' => 'nullable|string',
    //     ]);

    //     $baners->name = $validatedData['name'];
    //     $baners->image = $validatedData['image'];
    //     $baners->description = $validatedData['description'];

        
    //      // Cập nhật tên
    //      $baners->name = $validatedData['name'];

    //      // Cập nhật mô tả (nếu có)
    //      $baners->description = $validatedData['description'] ?? $baners->description;
 
    //      // Cập nhật ảnh (nếu có)
    //      if ($request->hasFile('image')) {
    //          $image = $request->file('image');
    //          $imageName = time() . '.' . $image->getClientOriginalExtension();
 
    //          // Lưu ảnh mới
    //          $image->storeAs('public/products', $imageName);
 
    //          // Xóa ảnh cũ nếu có
    //          if (!empty($baners->image) && File::exists(public_path('storage/products/' . $baners->image))) {
    //              File::delete(public_path('storage/products/' . $baners->image));
    //          }
 
    //          // Gán ảnh mới
    //          $baners->image = $imageName;
    //      }
 
    //      // Cập nhật thông tin Slider
    //      $baners->save();

    //     // Product::update($validatedData);

    //     return redirect()->route('baner')->with('success', 'Product updated successfully.'); 
    // }
    public function update(Request $request, $id)
    {
        // Lấy Slider dựa trên id
        $baners = Baner::findOrFail($id); 

        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Cập nhật tên
        $baners->name = $validatedData['name'];

        // Cập nhật mô tả (nếu có)
        $baners->description = $validatedData['description'] ?? $baners->description;

        // Cập nhật ảnh (nếu có)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Lưu ảnh mới
            $image->storeAs('public/products', $imageName);

            // Xóa ảnh cũ nếu có
            if (!empty($baners->image) && File::exists(public_path('storage/products/' . $baners->image))) {
                File::delete(public_path('storage/products/' . $baners->image));
            }

            // Gán ảnh mới
            $baners->image = $imageName;
        }

        // Cập nhật thông tin Slider
        $baners->save();

        return redirect()->route('baner')->with('success', 'Slider updated successfully.');
    }

    public function delete($id)
    {
        // Tìm sản phẩm theo ID
        $baners = Baner::findOrFail($id);

        // Thực hiện xóa sản phẩm
        $baners->delete();

        // Chuyển hướng về danh sách sản phẩm với thông báo thành công
        return redirect()->route('baner')->with('success', 'Product deleted successfully.');
    }
}
