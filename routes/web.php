<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Couponcontroller;
use App\Http\Controllers\SizeController; 
use App\Http\Controllers\ColorController; 
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Product_attributeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [UserController::class, 'index']);
// Route::get('/one_to_one',[UserController::class, 'one_to_one']);
// Route::get('/dashboard', [UserController::class, 'dashboard']);
// Route::get('/create', [UserController::class, 'create']);
Route::match(['get','post'], '/login', [UserController::class, 'login'])->name('admin.loginpage');
Route::match(['get', 'post'], '/loginpost', [UserController::class, 'postlogin'])->name('admin.user.postlogin');

Route::group(['middleware' => 'admin.auth'], function () {
    Route::get('/dashboard', [UserController::class, 'adminlogin'])->name('admin.user.create');

    Route::group(['prefix'=>'category'], function(){
    Route::get('/category', [UserController::class, 'category'])->name('admin.user.category');
    Route::match(['get', 'post'], '/categorycreate', [UserController::class, 'categorycreate'])->name('admin.user.categorycreate');
    Route::match(['get', 'post'], '/categorylist', [UserController::class, 'categorylist'])->name('admin.user.categorylist');
    Route::match(['get', 'post'], '/categorydelete/{id}', [UserController::class, 'categorydelete'])->name('admin.category.delete');
    Route::match(['get', 'post'], '/categoryedit/{id}', [UserController::class, 'categoryedit'])->name('admin.category.edit');
    Route::match(['get', 'post'], '/categorystatus', [UserController::class, 'categorystatus'])->name('admin.category.status');
 });

    // coupon

    Route::group(['prefix'=>'coupon'], function(){
    Route::get('/form', [Couponcontroller::class, 'show'])->name('admin.coupon.form');
    Route::match(['get', 'post'], '/create', [Couponcontroller::class, 'create'])->name('admin.coupon.create');
    Route::match(['get', 'post'], '/', [Couponcontroller::class, 'index'])->name('admin.coupon.couponlist');
    Route::match(['get', 'post'], '/delete/{id}', [Couponcontroller::class, 'delete'])->name('admin.coupon.delete');
    Route::match(['get', 'post'], '/edit/{id}', [Couponcontroller::class, 'edit'])->name('admin.coupon.edit');
    Route::match(['get', 'post'], '/couponstatus', [Couponcontroller::class, 'couponstatus'])->name('admin.coupon.status');
 });

 Route::group(['prefix'=>'size'], function(){
    Route::match(['get', 'post'], '/create', [SizeController::class, 'create'])->name('admin.size.create');
    Route::match(['get', 'post'], '/', [SizeController::class, 'index'])->name('admin.size.sizelist');
    Route::match(['get', 'post'], '/delete/{id}', [SizeController::class, 'delete'])->name('admin.size.delete');
    Route::match(['get', 'post'], '/edit/{id}', [SizeController::class, 'edit'])->name('admin.size.edit');
    Route::match(['get', 'post'], '/sizestatus', [SizeController::class, 'sizestatus'])->name('admin.size.status');
 });

 Route::group(['prefix'=>'color'], function(){
    Route::match(['get', 'post'], '/create', [ColorController::class, 'create'])->name('admin.color.create');
    Route::match(['get', 'post'], '/', [ColorController::class, 'index'])->name('admin.color.colorlist');
    Route::match(['get', 'post'], '/delete/{id}', [ColorController::class, 'delete'])->name('admin.color.delete');
    Route::match(['get', 'post'], '/edit/{id}', [ColorController::class, 'edit'])->name('admin.color.edit');
    Route::match(['get', 'post'], '/colorstatus', [ColorController::class, 'colorstatus'])->name('admin.color.status');
 });

 Route::group(['prefix'=>'product'], function(){
   Route::match(['get', 'post'], '/create', [ProductController::class, 'create'])->name('admin.product.create');
   Route::match(['get', 'post'], '/', [ProductController::class, 'index'])->name('admin.product.productlist');
   Route::match(['get', 'post'], '/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
   Route::match(['get', 'post'], '/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
   // Route::match(['get', 'post'], '/colorstatus', [ProductController::class, 'colorstatus'])->name('admin.product.status');
});

Route::group(['prefix'=>'product_attribute'], function(){
   Route::match(['get', 'post'], '/create/{product_id}', [Product_attributeController::class, 'create'])->name('admin.product_attribute.create');

   Route::match(['get', 'post'], '/', [Product_attributeController::class, 'index'])
   ->name('admin.product_attribute_list');
    Route::match(['get', 'post'], '/edit/{id}', [Product_attributeController::class, 'edit'])->name('admin.product_attribute.edit');
   // Route::match(['get', 'post'], '/colorstatus', [ProductController::class, 'colorstatus'])->name('admin.product.status');
   Route::match(['get', 'post'], '/attribute', [Product_attributeController::class, 'productremove'])->name('attribute.remove');
});



});
