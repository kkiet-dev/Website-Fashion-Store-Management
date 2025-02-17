<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show_article_content()
    {
        $articles = Article::all();
        return view('admin.pages.article', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show_create_content()
    {
        return view('admin.pages.article_create');
    }

    public function store(Request $request)
    {
        $articles = Article::all();
        // Xác thực dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // Tạo sản phẩm mới với dữ liệu đã xác thực
        Article::create($validatedData);

        // Chuyển hướng về danh sách sản phẩm với thông báo
        return redirect()->route('article')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $articles = Article::findOrFail($id); 
        return view('admin.pages.article_edit', compact('articles'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $articles = Article::findOrFail($id); 
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $articles->name = $validatedData['name'];
        $articles->description = $validatedData['description'];

        $articles->update($validatedData);

        // Product::update($validatedData);

        return redirect()->route('article')->with('success', 'Product updated successfully.'); 
    }

    public function delete($id)
    {
        // Tìm sản phẩm theo ID
        $articles = Article::findOrFail($id);

        // Thực hiện xóa sản phẩm
        $articles->delete();

        // Chuyển hướng về danh sách sản phẩm với thông báo thành công
        return redirect()->route('article')->with('success', 'Product deleted successfully.');
    }
}
