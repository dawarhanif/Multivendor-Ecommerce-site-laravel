<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;







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
//Frontend

Route::get('user/auth',[IndexController::class,'userAuth'])->name('user.auth');
Route::post('user/login',[IndexController::class,'loginSubmit'])->name('login.submit');
Route::post('user/register',[IndexController::class,'registerSubmit'])->name('register.submit');

//User Dashboard: 
Route::group(['prefix'=>'user/','middleware'=>['user']],function(){

    Route::get('/dashboard',[IndexController::class,'userDashboard'])->name('user.dashboard');
    Route::get('/orders',[IndexController::class,'userOrders'])->name('user.orders');
    Route::get('/address',[IndexController::class,'userAddresses'])->name('user.addresses');
    Route::get('/account',[IndexController::class,'userAccount'])->name('user.account');
    Route::post('/shipping/address/{id}',[IndexController::class,'shippingAddress'])->name('shipping.address');
    Route::post('/update/account/{id}',[IndexController::class,'updateAccount'])->name('account.update');
    Route::post('cart/store',[CartController::class,'cartStore'])->name('cart.store');
    Route::post('cart/delete',[CartController::class,'cartDelete'])->name('cart.delete');







});




Route::get('/',[IndexController::class,'home'])->name('homepage');
Route::get('product-category/{slug}',[IndexController::class,'productCategory'])->name('product.category');
Route::get('product-detail/{slug}',[IndexController::class,'productDetail'])->name('product.detail');




Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Dashboard
Route::group(['prefix'=>'admin/','middleware'=>['auth','admin']],function(){
    Route::get('/',[AdminController::class,'admin'])->name('admin'); 

    Route::resource('banner',BannerController::class);
    Route::post('banner_status',[BannerController::class,'bannerstatus'])->name('banner.status');

    Route::resource('category',CategoryController::class);
    Route::post('category_status',[CategoryController::class,'categorystatus'])->name('category.status');
    Route::post('category/{id}/child',[CategoryController::class,'getChildByParentID']);



    Route::resource('/brand',BrandController::class);
    Route::post('brand_status',[BrandController::class,'brandstatus'])->name('brand.status');

    Route::resource('/products',ProductController::class);
    Route::post('product_status',[ProductController::class,'productstatus'])->name('product.status');

    Route::resource('/users',UserController::class);
    Route::post('user_status',[UserController::class,'userstatus'])->name('user.status');


});

Route::group(['prefix'=>'seller/','middleware'=>['auth','seller']],function(){
    Route::get('/',[AdminController::class,'admin'])->name('seller'); 
});
