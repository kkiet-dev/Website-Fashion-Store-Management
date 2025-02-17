<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{

    public function store(Request $request, $product_id)

    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Vui lòng đăng nhập để bình luận');
        }

        $validated = $request->validate([
            'content' => 'required|string|max:1000',  // Kiểm tra dữ liệu người dùng nhập vào
        ]);
    
        $comment = new Comment();
        $comment->content = $validated['content'];
        $comment->user_id = Auth::id();  // Lấy ID của người dùng hiện tại
        $comment->product_id = $product_id;  // Lưu ID sản phẩm mà comment gắn vào
    
        $comment->save();  // Lưu comment vào cơ sở dữ liệu
    
        return redirect()->route('product.detail', ['id' => $product_id])->with('success', 'Comment added successfully.');
    
    }
 

    /**
     * Sửa bình luận.
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        // Kiểm tra quyền chỉnh sửa
        if ($comment->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền chỉnh sửa bình luận này.');
        }

        return view('comments.edit', compact('comment'));
    }

    /**
     * Cập nhật bình luận.
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        // Kiểm tra quyền chỉnh sửa
        if ($comment->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền chỉnh sửa bình luận này.');
        }

        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->route('comments.index', $comment->product_id)->with('success', 'Bình luận đã được cập nhật.');
    }

    /**
     * Xóa bình luận.
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        // Kiểm tra quyền xóa
        if ($comment->user_id !== Auth::id()) {
            abort(403, 'Bạn không có quyền xóa bình luận này.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Bình luận đã được xóa.');
    }
}
