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

Auth::routes();
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () { return redirect('/home'); });
    Route::get('/home', [ SystemController::class, 'home' ]);
    Route::get('/profile', [ SystemController::class, 'profile' ]);
    Route::post('/updateProfile', [ SystemController::class, 'updateProfile' ]);
    Route::post('/add-to-cart', [BrowseDishController::class, 'addToCart'])->name('cart.add');
    Route::middleware('role:ADMIN')->resource('/userAccounts', UserAccountController::class);
    Route::middleware('role:ADMIN')->resource('/orderHeaders', OrderHeaderController::class);
    Route::middleware('role:ADMIN')->resource('/orderDetails', OrderDetailController::class);
    Route::middleware('role:ADMIN')->resource('/dishs', DishController::class);
    Route::middleware('role:ADMIN')->resource('/categories', CategoryController::class);
    Route::middleware('role:USER')->resource('/browseDishs', BrowseDishController::class);
    Route::middleware('role:USER')->resource('/cartDetails', CartDetailController::class);
    Route::middleware('role:USER')->resource('/cartHeaders', CartHeaderController::class);
});
Route::get('/logout', [ LoginController::class, 'logout' ]);
Route::get('/resetPassword', [ LoginController::class, 'resetPassword' ]);
Route::post('/resetPassword', [ LoginController::class, 'resetPasswordPost' ]);
Route::get('/changePassword/{token}', [ LoginController::class, 'changePassword' ]);
Route::post('/changePassword/{token}', [ LoginController::class, 'changePasswordPost' ]);
Route::get('/stack', [ SystemController::class, 'stack' ]);