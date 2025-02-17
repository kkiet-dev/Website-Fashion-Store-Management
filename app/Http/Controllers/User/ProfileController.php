<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function show_profile()
    {   
        $users = auth()->user();
        return view('users.pages.profile', compact('users'));
    }
   
    public function update(Request $request){

        $user = Auth::user();

        $validateData = $request->validate([
   
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'phone'=> 'nullable|string|max:15',
            'address'=> 'nullable|string|max:255',
            'email'=>'required|email|unique:users,email,'.$user->id,
        ]);


        $user->phone = $validateData['phone'];
        $user->address = $validateData['address'];
        $user->email = $validateData['email'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
    
            // Lưu ảnh mới
            $image->storeAs('public/products', $imageName);
    
            // Xóa ảnh cũ nếu tồn tại
            if (!empty($user->image) && File::exists(public_path('storage/products/' . $user->image))) {
                File::delete(public_path('storage/products/' . $user->image));
            }
    
            // Gán ảnh mới vào mảng validatedData
            $validatedData['image'] = $imageName;
        } else {
            // Nếu không có ảnh mới, giữ nguyên ảnh cũ
            $validatedData['image'] = $user->image;
        }

        $user->update($validatedData);

 

        // return redirect()->route('admin.pages.users')->with('success', 'User updated successfully.');
        return back()->with('success', 'Cập nhật thành công!');
    }
    

}
