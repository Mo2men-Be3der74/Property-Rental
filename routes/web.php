<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Sellercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('/checkout')->controller(CheckoutController::class)->name('checkout.')->group(function () {
    Route::get('/{flat}/details', 'details')->where('flat', '[0-9]+')->name('details');
    Route::post('/{flat}/payment', 'payment')->where('flat', '[0-9]+')->name('payment');
    Route::post('/{flat}/confirm', 'confirm')->where('flat', '[0-9]+')->name('confirm');
});

Route::prefix('/seller')->controller(Sellercontroller::class)->name('seller.')->group(function () {
    Route::get('/', 'seller')->name('index');
    Route::get('/add', 'create')->name('create');
    Route::post('/add', 'store')->name('store');
    Route::get('/{flat}/edit', 'edit')->where('flat', '[0-9]+')->name('edit');
    Route::put('/{flat}', 'update')->where('flat', '[0-9]+')->name('update');
    Route::delete('/{flat}', 'destroy')->where('flat', '[0-9]+')->name('destroy');
});
<<<<<<< HEAD
=======

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
>>>>>>> 578397fd848f3c4198f30e77453abbecb3288858
