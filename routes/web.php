<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Sellercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('/checkout')->middleware('auth')->controller(CheckoutController::class)->name('checkout.')->group(function () {
    Route::get('/{flat}/details', 'details')->where('flat', '[0-9]+')->name('details');
    Route::post('/{flat}/payment', 'payment')->where('flat', '[0-9]+')->name('payment');
    Route::post('/{flat}/confirm', 'confirm')->where('flat', '[0-9]+')->name('confirm');
});

Route::prefix('/seller')->middleware('auth')->controller(Sellercontroller::class)->name('seller.')->group(function () {
    Route::get('/', 'seller')->name('index');
    Route::get('/add', 'create')->name('create');
    Route::post('/add', 'store')->name('store');
    Route::get('/{flat}/edit', 'edit')->where('flat', '[0-9]+')->name('edit');
    Route::put('/{flat}', 'update')->where('flat', '[0-9]+')->name('update');
    Route::delete('/{flat}', 'destroy')->where('flat', '[0-9]+')->name('destroy');
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')->name('logout');

Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth')->name('profile');
