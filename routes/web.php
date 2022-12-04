<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::get('/loginn', [\App\Http\Controllers\CustomAuthController::class, 'Login']);
Route::post('/register-user', [\App\Http\Controllers\CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [\App\Http\Controllers\CustomAuthController::class, 'loginUser'])->name('login-user');




//Comment
//Route::post('comments',[\App\Http\Controllers\Frontend\CommentController::class,'store']);


Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

        #Upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

        #Cart
        Route::prefix('customers')->group(function () {
            Route::get('/', [CartController::class, 'index']);
            Route::get('view/{customer}', [CartController::class, 'view']);
            Route::DELETE('destroy', [CartController::class, 'destroy']);
        });

        #sale
        Route::prefix('sales')->group(function () {
            Route::get('add', [SaleController::class, 'create']);
            Route::post('add', [SaleController::class, 'store']);
            Route::get('list', [SaleController::class, 'index']);
            Route::get('edit/{sale}', [SaleController::class, 'show']);
            Route::post('edit/{sale}', [SaleController::class, 'update']);
            Route::DELETE('destroy', [SaleController::class, 'destroy']);
        });

        #comment
        Route::prefix('comments')->group(function () {
            Route::get('/', [CommentController::class, 'index']);
//            Route::get('view/{customer}', [CommentController::class, 'view']);
            Route::DELETE('destroy', [CommentController::class, 'destroy']);

        });

        #Contact
        Route::prefix('contacts')->group(function () {
            Route::get('/', [ContactController::class, 'index']);
            Route::DELETE('destroy', [ContactController::class, 'destroy']);

        });

        Route::prefix('userhomes')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\User_homeController::class, 'index']);
            Route::DELETE('destroy', [\App\Http\Controllers\Admin\User_homeController::class, 'destroy']);


        });

    });
});

Route::get('/home', [App\Http\Controllers\MainController::class, 'index']);
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);
Route::post('san-pham/comment/{id}', [\App\Http\Controllers\ProductController::class, 'store'])
    ->name('sanpham_comment');

Route::post('contact_new', [App\Http\Controllers\ContactController::class, 'store']);



//Route::get('sanpham-sale/{slug}.html', [App\Http\Controllers\SaleController::class, 'index']);


Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);








