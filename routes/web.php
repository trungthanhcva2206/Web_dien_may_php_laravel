<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\aboutcontroller as ControllersAboutcontroller;
use App\Http\Controllers\AdminController\ExampleController;
use App\Http\Controllers\AdminController\OrdersController;
use App\Http\Controllers\AdminController\HomeController;
use App\Http\Controllers\UserController\Cart;
use App\Http\Controllers\UserController\Personal_information;
use App\Http\Controllers\UserController\ProductController;
use App\Http\Controllers\UserController\ContactUsController;
use App\Http\Controllers\UserController\My_order;
use App\Http\Controllers\UserController\Login;

use Illuminate\Support\Facades\Route;

// Admin controller
use App\Http\Controllers\AdminController\ProductAdminController;
use App\Http\Controllers\AdminController\CommentAdminController;
use App\Http\Controllers\ChangePassController;
use App\Http\Controllers\UserController\SmallController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AboutController1;
use App\Http\Controllers\AdminController\CategoryController;
use App\Http\Controllers\Payment;


use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController\FeedbackController;
use App\Http\Controllers\AdminController\UserAdminController;
use App\Http\Controllers\my_order_detail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/',[ProductController::class,'show_home_page'])->name('user.home_page');



// Route::get('/admin/home', [HomeController::class,'index'])->name('admin.home');

Route::get('/',[ProductController::class,'show_home_page'])->name('user.home_page');



// Route::get('/admin/home', [HomeController::class,'index'])->name('admin.home');

Route::get('/my_order',[My_order::class,'create'])->name('user.my_order');

Route::get('/personal_information',[Personal_information::class,'create'])->name('user.personal_information');


// ---------------------








// ----------------------------
Route::get('/product_detail', [ProductController::class, 'show_product_detail'])->name('user.product_detail');


// Route::get('/product_detail', [ProductController::class, 'show_product_detail'])->name('user.product_detail');



// Route::get('/home_page', [ProductController::class,'show_home_page'])->name('user.home_page');

Route::get('/login', [Login::class,'create'])->name('user.login');

Route::get('/contact_us', [ContactUsController::class, 'show'])->name('user.contact_us');
Route::post('addfeedback',[ContactUsController::class,'add'])->name('user.addfb');
Route::get('/small/{categoryName}', [SmallController::class,'show'])->name('category.products');
Route::get('/home_page/{id}', [ProductController::class, 'show_product_detail'])->name('user.product_detail');
Route::get('/home_page', [ProductController::class,'show_home_page'])->name('user.home_page');









Route::get('/sign', [Login::class,'show'])->name('user.sign');




Route::get('/add', function () {
    return view('/Admin/add_product');
});



Route::get('/about',[aboutcontroller::class,'show'])->name('about');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


Route::middleware(['login', 'role.user'])->group(function () {
Route::get('/admin/home', [HomeController::class,'index'])->name('admin.home');
Route::get('/admin/orders', [OrdersController::class, 'show'])->name('admin.orders');
Route::get('/admin/product_details/{id}', [ProductAdminController::class, 'show_details'])->name('detail_product');
Route::DELETE('/admin/product_details/delete/{id}', [ProductAdminController::class, 'delete']);
Route::get('/admin/comment', [CommentAdminController::class, 'show'])->name('admin.comment');
Route::DELETE('/admin/comment/delete/{id}', [CommentAdminController::class, 'delete']);
Route::get('/admin/comment_details/{id}', [CommentAdminController::class, 'show_details'])->name('detail_comment');
Route::get('/admin/orders', [OrdersController::class, 'show'])->name('admin.orders');
Route::get('/admin/order_details/{id}', [OrdersController::class, 'show_details'])->name('detail_order');
Route::DELETE('/admin/order_details/delete/{id}', [OrdersController::class, 'delete']);
Route::get('/admin/cate',[CategoryController::class,'show'])->name('admin.cate');
Route::get('/admin/cate/{id}',[CategoryController::class,'show_details'])->name('detail_cate');
Route::get('/cate/add1', [CategoryController::class, 'ViewAdd1'])->name('admin.cate_add');
Route::post('add23', [CategoryController::class, 'AddCate'])->name('admin.cate_add_2');
Route::DELETE('/admin/cate_detail/delete/{id}', [CategoryController::class, 'delete']);
Route::get('/admin/product', [ProductAdminController::class, 'show'])->name('admin.product');
Route::get('/admin/feed_back',[FeedbackController::class,'show'])->name('admin.feedBack');
Route::post('/update-status/{id}',[OrdersController::class,'updateStatus'])->name('update.status');  
Route::get('/admin/feed_back/{id}', [FeedbackController::class, 'show_details'])->name('detail_feedback');


Route::get('product/add',[ProductAdminController::class,'ViewAddCate'])->name('admin.product_add_cate');
Route::get('product/add/{id}',[ProductAdminController::class,'ViewAdd'])->name('admin.product_add');
Route::post('/product/add_p',[ProductAdminController::class,'product_add2'])->name('admin.product_add2');
Route::get('/product/edit/{id}', [ProductAdminController::class, 'ViewEdit'])->name('admin.product_edit');
Route::PATCH('/product/update/{id}', [ProductAdminController::class, 'Update'])->name('admin.product_update');
Route::post('/product/add_update/{id}',[ProductAdminController::class,'product_add3'])->name('admin.product_add3');
});

Route::middleware('login')->group(function () {
    // Route::get('/cart', [Cart::class,'create'])->name('user.cart');
    Route::get('/my_order',[My_order::class,'create'])->name('user.my_order');
    Route::get('/personal_information',[Personal_information::class,'create'])->name('user.personal_information');
    Route::get('/change_password',[ChangePassController::class,'showchange'])->name('user.change_password');
    Route::POST('/update-profile',[Personal_information::class,'updateProfile'])->name('user.update_profile');
    Route::post('/update-password', [ChangePassController::class, 'update'])->name('update_password');
    Route::get('/cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
    Route::get('/payment',[Payment::class,'Payment'])->name('payment');
    Route::post('/payment/add',[Payment::class,'Add'])->name('add');
    Route::get('/my_order/{id}',[my_order_detail::class,'create'])->name('user.my_order_detail');
    Route::post('/update-avatar', [Personal_information::class,'updateAvatar'])->name('upload.image');
    Route::post('/comments/store', [CommentController::class,'store'])->name('comment.store');


    
});

Route::middleware('login', 'role.user','admin_level_zero')->group(function (){
    Route::get('/admin/user_admin_detail/{id}', [UserAdminController::class,'show_details'])->name('detail_user_admin');
    Route::get('/admin/user_admin', [UserAdminController::class, 'create'])->name('admin.user_admin');  
    Route::DELETE('/admin/user_admin_detail/delete/{id}', [UserAdminController::class, 'delete']);
    Route::get('/admin/user_admin/add', [UserAdminController::class, 'ViewAdd'])->name('admin.user_add');
    Route::post('add', [UserAdminController::class, 'AddUser'])->name('admin.user_add_2');
    Route::get('/admin/user_admin/edit/{id}', [UserAdminController::class, 'ViewEdit'])->name('admin.user_edit');
    Route::PATCH('/admin/user_admin/update/{id}', [UserAdminController::class, 'Update'])->name('admin.user_update');
});







