<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\OrderHeaderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrowseDishController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\CartHeaderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index']);

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [SystemController::class, 'home']);
    Route::get('/profile', [SystemController::class, 'profile']);
    Route::post('/updateProfile', [SystemController::class, 'updateProfile']);
    Route::post('/add-to-cart', [BrowseDishController::class, 'addToCart'])->name('cart.add');
    Route::post('/update-cart-quantity', [CartHeaderController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::post('/proceed-order', [CartHeaderController::class, 'proceedToOrder'])->name('order.add');
    Route::post('/payment', [PaymentController::class, 'pay'])->name('payment.pay');
    Route::get('/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::middleware('role:ADMIN')->resource('/userAccounts', UserAccountController::class);
    Route::middleware('role:ADMIN')->resource('/orderHeaders', OrderHeaderController::class);
    Route::middleware('role:ADMIN')->resource('/orderDetails', OrderDetailController::class);
    Route::middleware('role:ADMIN')->resource('/dishs', DishController::class);
    Route::middleware('role:ADMIN')->resource('/categories', CategoryController::class);
    Route::middleware('role:USER')->resource('/browse-menu', BrowseDishController::class);
    Route::middleware('role:USER')->resource('/cartDetails', CartDetailController::class);
    Route::middleware('role:USER')->resource('/cart', CartHeaderController::class);
    Route::middleware('role:USER')->resource('/orders', CustomerOrderController::class);
});
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/reset-password', [LoginController::class, 'resetPassword']);
Route::post('/reset-password', [LoginController::class, 'resetPasswordPost']);
Route::get('/change-password/{token}', [LoginController::class, 'changePassword']);
Route::post('/change-password/{token}', [LoginController::class, 'changePasswordPost']);
Route::get('/stack', [SystemController::class, 'stack']);
