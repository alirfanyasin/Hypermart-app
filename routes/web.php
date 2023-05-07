<?php

use App\Http\Controllers\Admin\AdminBuyerController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\UserCartController;
use App\Http\Controllers\User\UserFinishController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserProductController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
// Guest ==========================================================
Route::get('/', [HomeController::class, 'index'])->middleware('guest');
Route::get('home/new-product/read', [HomeController::class, 'read_product'])->middleware('guest');
Route::prefix('product')->group(function() {
    Route::get('/', [ProductController::class, 'index'])->middleware('guest');
    Route::get('/read', [ProductController::class, 'read_product'])->middleware('guest');
    Route::get('/detail/{id}', [ProductController::class, 'show'])->middleware('guest');
    Route::post('/search', [ProductController::class, 'search'])->middleware('guest')->name('guest.search');
});


// User ==========================================================
Route::prefix('my')->group(function() {
    Route::get('/home', [UserHomeController::class, 'index'])->middleware('auth');
    Route::get('/new-product/read', [UserHomeController::class, 'read_new_product'])->middleware('auth');
    Route::get('/home/product/modal-cart/{id}', [UserHomeController::class, 'modal_cart'])->middleware('auth');
    Route::get('/', [UserHomeController::class, 'index'])->middleware('auth');
});

Route::prefix('my/product')->group(function() {
    Route::get('/', [UserProductController::class, 'index'])->middleware('auth');
    Route::get('/read', [UserProductController::class, 'read'])->middleware('auth');
    Route::get('/detail/{id}', [UserProductController::class, 'show'])->middleware('auth');
    Route::get('/modal-cart/{id}', [UserProductController::class, 'modal_cart'])->middleware('auth');

    Route::post('/search', [UserProductController::class, 'search'])->middleware('auth')->name('search');
});

Route::get('/my/cart', [UserCartController::class, 'index'])->middleware('auth');
Route::get('/my/cart/read', [UserCartController::class, 'read'])->middleware('auth');
Route::post('/my/cart/store', [UserCartController::class, 'store'])->middleware('auth')->name('cart.store');
Route::get('/my/cart/destroy/{id}', [UserCartController::class, 'destroy'])->middleware('auth');

Route::get('/my/order', [UserOrderController::class, 'index'])->middleware('auth');
Route::get('/my/order/read', [UserOrderController::class, 'read'])->middleware('auth');
Route::post('/my/order/store', [UserOrderController::class, 'store'])->middleware('auth');
Route::post('/my/order/finish/{id}', [UserOrderController::class, 'finish'])->middleware('auth');
Route::post('/my/order/cancel/{id}', [UserOrderController::class, 'cancel'])->middleware('auth');
Route::post('/my/order/delete/{id}', [UserOrderController::class, 'destroy'])->middleware('auth');

Route::get('/my/finish', [UserFinishController::class, 'index'])->middleware('auth');
Route::get('/my/finish/read', [UserFinishController::class, 'read'])->middleware('auth');


// Admin ==========================================================
Route::prefix('my')->group(function() {
    Route::get('/home', [AdminHomeController::class, 'index'])->middleware('auth');
    Route::get('/dashboard/product', [AdminDashboardController::class, 'product'])->middleware('auth');
    Route::get('/dashboard/products', [AdminDashboardController::class, 'getProducts'])->middleware('auth');
    Route::post('/dashboard/add-product', [AdminDashboardController::class, 'store'])->middleware('auth')->name('product.store');
    Route::get('/dashboard/product/show/{id}', [AdminDashboardController::class, 'show'])->middleware('auth');
    Route::get('/dashboard/product/edit/{id}', [AdminDashboardController::class, 'edit'])->middleware('auth');
    Route::post('/dashboard/product/update/{id}', [AdminDashboardController::class, 'update'])->middleware('auth');
    Route::delete('/dashboard/product/destroy/{id}', [AdminDashboardController::class, 'destroy'])->middleware('auth');
    Route::get('/dashboard/users', [AdminUserController::class, 'index'])->middleware('auth');
    Route::get('/dashboard/users/read', [AdminUserController::class, 'read'])->middleware('auth');
    Route::get('/dashboard/buyer', [AdminBuyerController::class, 'index'])->middleware('auth');
    Route::get('/dashboard/buyer/read', [AdminBuyerController::class, 'read'])->middleware('auth');
    Route::get('/dashboard/buyer/detail/{id}', [AdminBuyerController::class, 'show'])->middleware('auth');
    Route::post('/dashboard/buyer/confirm/{id}', [AdminBuyerController::class, 'confirm'])->middleware('auth');
    Route::post('/dashboard/buyer/reject/{id}', [AdminBuyerController::class, 'reject'])->middleware('auth');
});


// Sistem Login
Route::prefix('auth')->group(function() {
    Route::get('login',[AuthenticationController::class, 'showLoginForm'])->middleware('guest');
    Route::get('register',[AuthenticationController::class, 'showRegistrationForm'])->middleware('guest');
    Route::post('register',[AuthenticationController::class, 'register'])->middleware('guest');
    Route::post('login',[AuthenticationController::class, 'login'])->middleware('guest')->name('login');
    Route::post('logout',[AuthenticationController::class, 'logout'])->middleware('auth');
});