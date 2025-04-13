<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

// login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

//logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// phân quyền cho user
Route::middleware('client')->group(function () {
    Route::get('/list', [ClientController::class, 'showList']);
    Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::get('cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

// phân quyền cho admin
Route::middleware('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
});

// Đăng ký
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


// Cho tất cả mọi người 
Route::get('/', [ClientController::class, 'showHome']);
Route::get('/product/{id}', [ClientController::class, 'show']);
Route::get('detail/{id}', [ClientController::class, 'show'])->name('client.product-detail');
Route::get('/about', function () {
    return view('client.about');
})->name('client.about');
Route::get('/all-products', [ClientController::class, 'showProducts'])->name('client.all_products');
Route::get('/products/category/{id}', [ClientController::class, 'filterByCategory'])->name('client.category');
