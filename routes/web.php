<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\productCategoriesController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\OderController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\BanerController;
use App\Http\Controllers\Admin\ArticlesController;



//user UI
use App\Http\Controllers\User\HomeUserController;
use App\Http\Controllers\User\ProductUserController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\MapController;
use App\Http\Controllers\User\ShippingController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\ContactController;

use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\Auth;


// Route::get('/', function () {
//     return view('/login');
// });

Route::get('/select-address', [MapController::class, 'showMap'])->name('map.select');
Route::post('/update-address', [MapController::class, 'updateAddress'])->name('update.address');
Route::post('/update-temp-address', [MapController::class, 'updateTempAddress'])->name('update.temp.address');
Route::post('/save-temp-address', [AddressController::class, 'saveTempAddress'])->name('saveTempAddress');

Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process.payment');
Route::put('/shipping/update/{orderId}', [PaymentController::class, 'update'])->name('shipping.update');

Route::post('return-vnpay', [PaymentController::class, 'create' ])->name('payment.create');

Route::get('/payment-info', function () {
    return view('users.pages.payment_infor');
})->name('payment.infor');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

route::get('/signup', [LoginController::class, 'showSignupForm'])->name('signup');
route::get('/signup', [LoginController::class, 'showSignupForm'])->name('signup.create');
route::post('/signup', [LoginController::class, 'signup']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ----------------------home router--------------//
Route::get('/dashboard', [HomeController::class, 'show_dashboard_content'])->middleware('auth');//->middleware('auth')

//--------------------product---------------------//
Route::get('/products', [ProductController::class, 'show_product_content'])->name('products') ->middleware('auth');// Hiển thị form thêm sản phẩm
Route::get('/products/create', [ProductController::class, 'show_create_content'])->name('products.create')->middleware('auth');// Xử lý thêm sản phẩm
Route::post('/products', [ProductController::class, 'store'])->name('products.store')->middleware('auth');  
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware('auth');
Route::post('/products/{id}', [ProductController::class, 'update'])->name('products.update')->middleware('auth');
Route::delete('/products/{id}', [ProductController::class, 'delete'])->name('products.delete')->middleware('auth');

//--------------------product_category----------------//
Route::get('product_categories',[productCategoriesController::class,'show_product_category_content'])->name('product_categories')->middleware('auth');
Route::get('/product_categories/create', [productCategoriesController::class, 'show_create_content'])->name('product_categories.create')->middleware('auth');
Route::post('/product_categories', [productCategoriesController::class, 'store'])->name('product_categories.store')->middleware('auth');
Route::get('/product_categories/{id}/edit', [productCategoriesController::class, 'edit'])->name('product_categories.edit')->middleware('auth');
Route::put('/product_categories/{id}', [productCategoriesController::class, 'update'])->name('product_categories.update')->middleware('auth');
Route::delete('/product_categories/{id}', [productCategoriesController::class, 'delete'])->name('product_categories.delete')->middleware('auth');


//--------------------product Category---------------------//
route::get('/productcategories', [HomeController::class, 'show_category_product_content'])->middleware('auth');

//---------------------users---------------------//
Route::get('/users', [HomeController::class, 'show_users_content'])->name('users')->middleware('auth');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete')->middleware('auth');

  
Route::get('/billing', [HomeController::class, 'show_billing_content'])->middleware('auth');
// Route::get('/profilee', [HomeController::class, 'show_profile_content'])->middleware('auth');

//order manager
Route::get('/oder', [OderController::class, 'show_oder'])->name('oder.show');
Route::get('/oder_detail/{id}', [OderController::class, 'show_oder_detail'])->name('oder.detail');
Route::delete('oder_detail/{id}', [OderController::class, 'delete'])->name('oder.delete');


//-------------------------------------------------//----------------------------------------------------------//


//----------home user-----------------//
Route::get('/', [HomeUserController::class, 'show_home_user_content'])->name('home.users');

Route::get('/product_user', [ProductUserController::class, 'show_about_user_content']);
Route::get('/product_detail/{id}', [ProductUserController::class, 'show_product_detail_content'])->name('product.detail');

Route::post('/product_detail/{id}/comment', [CommentController::class, 'store'])->name('comments.store');

Route::get('/product_trouser', [ProductUserController::class, 'show_product_trouser_content']); 
Route::get('/product_jackets', [ProductUserController::class, 'show_product_jackets_content']);
Route::get('/product_tshirts', [ProductUserController::class, 'show_product_Tshirts_content']);
Route::get('/product_carpri', [ProductUserController::class, 'show_product_carpri_content']);

Route::get('/cart_oder', [CartController::class, 'show_cart'])->name('cart.show');
Route::post('/cart_oder/update', [PaymentController::class, 'updatePhone'])->name('cart_oder.update');
Route::post('/cart_oder/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');


Route::get('/shipping', [ShippingController::class, 'show_shipping_status'])->name('shipping');


Route::get('/profile', [ProfileController::class, 'show_profile']);
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

//slider users UI
Route::get('/slider', [SliderController::class, 'show_slider_content'])->name('slider');
Route::get('/slider/create', [SliderController::class, 'show_create_content'])->name('slider.create');
Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');  
Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
Route::post('/slider/{id}', [SliderController::class, 'update'])->name('slider.update');
Route::delete('/slider/{id}', [SliderController::class, 'delete'])->name('slider.delete');


//sterm users UI
Route::get('/term', [TermController::class, 'show_term_content'])->name('term');
Route::get('/term/create', [TermController::class, 'show_create_content'])->name('term.create');
Route::post('/term', [TermController::class, 'store'])->name('term.store');  
Route::get('/term/{id}/edit', [TermController::class, 'edit'])->name('term.edit');
Route::post('/term/{id}', [TermController::class, 'update'])->name('term.update');
Route::delete('/term/{id}', [TermController::class, 'delete'])->name('term.delete'); 

//term users UI
Route::get('/baner', [BanerController::class, 'show_baner_content'])->name('baner');
Route::get('/baner/create', [BanerController::class, 'show_create_content'])->name('baner.create');
Route::post('/baner', [BanerController::class, 'store'])->name('baner.store');  
Route::get('/baner/{id}/edit', [BanerController::class, 'edit'])->name('baner.edit');
Route::post('/baner/{id}', [BanerController::class, 'update'])->name('baner.update');
Route::delete('/baner/{id}', [BanerController::class, 'delete'])->name('baner.delete');

//posts Uses UI
Route::get('/article', [ArticlesController::class, 'show_article_content'])->name('article');
Route::get('/article/create', [ArticlesController::class, 'show_create_content'])->name('article.create');
Route::post('/article', [ArticlesController::class, 'store'])->name('article.store');  
Route::get('/article/{id}/edit', [ArticlesController::class, 'edit'])->name('article.edit');
Route::put('/article/{id}', [ArticlesController::class, 'update'])->name('article.update');
Route::delete('/article/{id}', [ArticlesController::class, 'delete'])->name('article.delete');

//button checkout
Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');

Route::get('/shop_address', function () {
    return view('/users.ggmap.ggmap');
});

Route::get('/return_policy', function () {
    return view('/users.support.return_policy');
});

Route::get('/transport', function () {
    return view('/users.pages.transport');
});

Route::get('/contact', function () {
    return view('/users.contact.contact');
});

Route::get('/contact', [ContactController::class, 'show_contact'])->name('contact.show');

// Xử lý gửi form liên hệ
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/contact_ad', [ContactController::class, 'show_contact_manager'])->name('contacts.show');  // Danh sách liên hệ
Route::delete('contact/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy'); 
