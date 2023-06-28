<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\ProductController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\Clients\MyPageController;
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
    return view('clients.home');
});


Route::controller(ProductController::class)->group(function (){
    Route::get('/danh-sach-san-pham/{category}', 'index')->name('products');

    Route::get('/san-pham/{product}', 'show')->name('product.detail');

    Route::post('getproducts', 'getProducts')->name('product.get');

});

Route::resource('cart', CartController::class)->middleware('auth');
Route::post('updateCartItem', [CartController::class, 'updateCartItem'])->name('cart.updateQty');
Route::post('deleteCartItem', [CartController::class, 'deleteCartItem'])->name('cart.deleteItem');


Route::controller(PayController::class)->group(function (){

    Route::post('pay', 'create')->name("pay");

    Route::post('/payment','payment')->name('payment');

    Route::get('/vnpay/return', 'vnpayReturn')->name('vnpay.return');
});

Route::controller(MyPageController::class)->prefix('my')->group(function (){
    Route::get('/', 'index')->name('my');
    Route::get('orders', 'getMyOrders')->name('my.orders');

    Route::get('profile', 'getProfile')->name('my.profile');
    Route::post('profile', 'updateProfile')->name('my.update-profile');
});

