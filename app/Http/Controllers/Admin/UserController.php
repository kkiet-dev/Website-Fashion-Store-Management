<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit($id){
        // $user = User::findOrFail($id);
        // return view('admin.layouts.user_edit');
        $roles = Role::all();

        $user = User::findOrFail($id); // Lấy thông tin user dựa trên ID
        return view('admin.pages.user_edit', compact('user','roles')); // Truyền biến $user vào view
    }

    public function update(Request $request,$id){
        $Role = Role::all();
        $user = User::findOrFail($id);

        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'phone'=> 'nullable|string|max:15',
            'address'=> 'nullable|string|max:255',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'nullable|string|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->name = $validateData['name'];
        $user->phone = $validateData['phone'];
        $user->address = $validateData['address'];
        $user->email = $validateData['email'];
        $user->role_id = $validateData['role_id'];
        if ($request->filled('password')) {
            $user->password = Hash::make($validateData['password']);
        };

       
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

        // $user->updated_at = now();

        // User::update($validatedData);



        // return redirect()->route('admin.pages.users')->with('success', 'User updated successfully.');
        return redirect()->route('users');
    }

    public function delete($id)
    {
        // Tìm người dùng theo ID
        $user = User::findOrFail($id);

        // Kiểm tra xem người dùng có đơn hàng nào trong bảng orders không
        $userHasOrders = Order::where('user_id', $id)->exists();

        if ($userHasOrders) {
            // Nếu người dùng có đơn hàng, thông báo lỗi và không xóa
            return redirect()->route('users')->with('error', 'Người dùng này đang có đơn hàng. Vui lòng xóa đơn hàng của người dùng để tiếp tục.');
        }

        // Nếu không có đơn hàng, thực hiện xóa người dùng
        $user->delete();

        // Chuyển hướng về danh sách người dùng với thông báo thành công
        return redirect()->route('users')->with('success', 'Người dùng đã được xóa thành công.');
    }

}
