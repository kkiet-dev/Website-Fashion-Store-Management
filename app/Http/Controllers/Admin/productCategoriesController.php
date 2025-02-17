<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
// use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class productCategoriesController extends Controller
{
    public function show_product_category_content()
    {
        $categories = ProductCategory::all();
        if(Auth::check()){
            if (Auth::user()->role_id == 1){
                return view('admin.pages.product_category', compact('categories'));
            }else {
                return redirect("login")->with('error', 'You need have admin acount to login it');
            }
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function show_create_content()
    {
        if(Auth::check()){
            if(Auth::user()->role_id == 1)
            {
                return view('admin.pages.product_category_create');   
            }
            else{
                return redirect("login")->with('error','Bạn cần có quyền admin để truy cập trang này');
            }
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        ProductCategory::create($request->all());

        return redirect()->route('product_categories')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = ProductCategory::findOrFail($id);
        if(Auth::check()){
            if(Auth::user()->role_id == 1)
            {
                return view('admin.pages.product_category_edit', compact('category'));
            }else{
            
            return redirect("login")->with('error','Bạn cần có quyền admin để truy cập trang này');
            }
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function update(Request $request, $id)
    {
        
        $category = ProductCategory::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $category->update($validatedData);

        return redirect()->route('product_categories')->with('success', 'Category updated successfully.');
    }

    public function delete($id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('product_categories')->with('success', 'Category deleted successfully.');
    }
}
