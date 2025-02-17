<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show_slider_content()
    {
        $sliders = Slider::all();
        return view('admin.pages.slider', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show_create_content()
    {
        return view('admin.pages.slider_create');
    }

   

    public function store(Request $request)
    {
        $sliders = Slider::all();
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
        Slider::create($validatedData);

        // Chuyển hướng về danh sách sản phẩm với thông báo
        return redirect()->route('slider')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $sliders = Slider::findOrFail($id); 
        return view('admin.pages.slider_edit', compact('sliders'));
    }
 
   
    public function update(Request $request, $id)
    {
        // Lấy Slider dựa trên id
        $sliders = Slider::findOrFail($id); 

        // Validate dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Cập nhật tên
        $sliders->name = $validatedData['name'];

        // Cập nhật mô tả (nếu có)
        $sliders->description = $validatedData['description'] ?? $sliders->description;

        // Cập nhật ảnh (nếu có)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Lưu ảnh mới
            $image->storeAs('public/products', $imageName);

            // Xóa ảnh cũ nếu có
            if (!empty($sliders->image) && File::exists(public_path('storage/products/' . $sliders->image))) {
                File::delete(public_path('storage/products/' . $sliders->image));
            }

            // Gán ảnh mới
            $sliders->image = $imageName;
        }

        // Cập nhật thông tin Slider
        $sliders->save();

        return redirect()->route('slider')->with('success', 'Slider updated successfully.');
    }

    
    public function delete($id)
    {
        // Tìm sản phẩm theo ID
        $sliders = Slider::findOrFail($id);

        // Thực hiện xóa sản phẩm
        $sliders->delete();

        // Chuyển hướng về danh sách sản phẩm với thông báo thành công
        return redirect()->route('slider')->with('success', 'Product deleted successfully.');
    }
}
