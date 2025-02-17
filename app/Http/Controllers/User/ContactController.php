<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;


class ContactController extends Controller
{
    public function show_contact()
    {
        return view('Users.contact.contact');
    }

    public function send(Request $request)
    {
        // Xác thực dữ liệu
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',  // Email là bắt buộc và phải có định dạng đúng
            'message' => 'required|string',
        ]);

        // Lưu thông tin vào cơ sở dữ liệu
        Contact::create($validated);

        // Chuyển hướng với thông báo thành công
        return redirect()->back()->with('success', 'Cảm ơn bạn đã liên hệ với chúng tôi!');
    }

    public function show_contact_manager(Request $request)
    {
        $query = Contact::query();

        // Tìm kiếm nếu có từ khóa
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('message', 'like', '%' . $request->search . '%');
        }

        $contacts = $query->paginate(6);  // Sử dụng paginate thay vì all

        return view('admin.pages.contact', compact('contacts'));
    }

    public function destroy($id)
    {
        // Tìm và xóa liên hệ
        $contact = Contact::findOrFail($id);
        $contact->delete();

        // Chuyển hướng lại trang danh sách với thông báo thành công
        return redirect()->back()->with('success', 'Liên hệ đã được xóa thành công!');
    }

}


