<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProviderController;

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function (){

//    Route::get('/dashboard', function (){
//        return view('admin.dashboard');
//    });
//
    Route::resource('products', ProductController::class);

    Route::delete('/deleteimage/{image}', [ProductController::class, 'deleteImagge'])
        ->name('delete.image');

    Route::controller(CategoryController::class)->group(function (){
        Route::get('category', 'index')->name('category');
        Route::post('category', 'store')->name('category.store');

        Route::get('category/sub', 'subCategories')->name('category.sub');
        Route::post('category/sub', 'subCategoriesStore')->name('category.sub.store');

        Route::post('category/update', 'update')->name('category.update');
        Route::post('subCategory/update', 'updateSub')->name('subCategory.update');

        Route::get('category/destroy/{id}', 'destroy')->name('category.destroy');

        Route::get('category/subDestroy/{id}', 'subDestroy')->name('subCategory.destroy');

    });

    Route::controller(\App\Http\Controllers\OrderController::class)->group(function (){
        Route::get('/order-pending', 'orderPending')->name('order.pending');

        Route::get('/order-success', 'orderSucess')->name('order.success');
    });

    Route::controller(\App\Http\Controllers\UserController::class)->group(function (){
        Route::get('/user', 'index')->name('user');

        Route::delete('/user/delete/{id}', 'delete')->name('user.delete');
    });
});
