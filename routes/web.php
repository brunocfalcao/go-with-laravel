<?php

use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'prevent-back-history'], function () {

    Auth::routes();

    // Route for Landing page of application
    Route::get('/', [ProductController::class, 'getFrontProducts'])->name('index');

    // Route for Google Social Login
    Route::get('login/google', [SocialController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback', [SocialController::class, 'handleGoogleCallback']);

    // Route for Apple Social Login
    Route::get('login/apple', [SocialController::class, 'redirectToApple'])->name('login.apple');
    Route::get('login/apple/callback', [SocialController::class, 'handleAppleCallback']);

    Route::group(['middleware' => 'auth'], function () {
        // Route for Dashboard of admin panel through Google/Apple Social Login
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        // Route for Dashboard of admin panel through Create Account
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

        // Route for Listing purchase in admin panel
        Route::get('/purchase', [ProductController::class, 'getPurchase'])->name('purchase');

        // Route for Listing orders admin panel
        Route::get('/orders', [ProductController::class, 'getOrders'])->name('orders');

        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        Route::get('products-create', [ProductController::class, 'create'])->name('products.create');

        // Profile View in Dashboard panel
        Route::get('/profileview', [ProfileController::class, 'index'])->name('profileview');

        // Profile Edit in Dashboard panel
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('admin.profileedit');

        // Profile Update in Dashboard panel
        Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    });
});
