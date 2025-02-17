<?php

namespace App\Http\Controllers\Admin;

namespace App\Http\Controllers\Admin;

use App\Models\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show_term_content()
    {
        $terms = Term::all();
        return view('admin.pages.term', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show_create_content()
    {
        return view('admin.pages.term_create');
    }


    public function store(Request $request)
    {
        $terms = Term::all();
        // Xác thực dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4000',
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
        Term::create($validatedData);

        // Chuyển hướng về danh sách sản phẩm với thông báo
        return redirect()->route('term')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $terms = Term::findOrFail($id); 
        return view('admin.pages.term_edit', compact('terms'));
    }
    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request,$id)
    // {
    //     $terms = Term::findOrFail($id); 
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'description' => 'nullable|string',
    //     ]);

    //     $terms->name = $validatedData['name'];
    //     $terms->image = $validatedData['image'];
    //     $terms->description = $validatedData['description'];
     
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    
    //         // Lưu ảnh mới
    //         $image->storeAs('public/products', $imageName);
    
    //         // Xóa ảnh cũ nếu tồn tại
    //         // }
    //         if (!empty($terms->image) && File::exists(public_path('storage/products/' . $terms->image))) {
    //             File::delete(public_path('storage/products/' . $terms->image));
    //         }
    
    //         // Gán ảnh mới vào mảng validatedData
    //         $validatedData['image'] = $imageName;
    //     } else {
    //         // Nếu không có ảnh mới, giữ nguyên ảnh cũ
    //         $validatedData['image'] = $terms->image;
    //     }

    //     $terms->update($validatedData);

    //     // Product::update($validatedData);

    //     return redirect()->route('term')->with('success', 'Product updated successfully.'); 
    // }
    public function update(Request $request, $id)
    {
        // Lấy Term dựa trên id
        $terms = Term::findOrFail($id); 

        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Cập nhật tên
        $terms->name = $validatedData['name'];

        // Cập nhật mô tả (nếu có)
        $terms->description = $validatedData['description'] ?? $terms->description;

        // Cập nhật ảnh (nếu có)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Lưu ảnh mới
            $image->storeAs('public/products', $imageName);

            // Xóa ảnh cũ nếu có
            if (!empty($terms->image) && File::exists(public_path('storage/products/' . $terms->image))) {
                File::delete(public_path('storage/products/' . $terms->image));
            }

            // Gán ảnh mới vào mảng validatedData
            $terms->image = $imageName;
        } else {
            // Nếu không có ảnh mới, giữ nguyên ảnh cũ
            $terms->image = $terms->image;
        }

        // Cập nhật thông tin Term
        $terms->save();

        return redirect()->route('term')->with('success', 'Term updated successfully.');
    }

    
    public function delete($id)
    {
        // Tìm sản phẩm theo ID
        $terms = Term::findOrFail($id);

        // Thực hiện xóa sản phẩm
        $terms->delete();

        // Chuyển hướng về danh sách sản phẩm với thông báo thành công
        return redirect()->route('term')->with('success', 'Product deleted successfully.');
    }
}
