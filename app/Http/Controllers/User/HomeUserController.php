<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Term;
use App\Models\Baner;
use App\Models\Article;
use App\Models\Product;
// use App\Models\Categories;

class HomeUserController extends Controller
{

    public function show_home_user_content(){
        $articles = Article::all();
        $baners = Baner::all();
        $terms = Term::all();
        $sliders = Slider::all();
        $totalQuantity = Product::count('quantity');
        $username = session('username', 'Guest');
        
            return view('users.pages.introl',compact('sliders','terms','baners','articles','totalQuantity'));
     
    }
}
