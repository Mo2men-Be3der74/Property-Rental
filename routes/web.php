<?php

use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('/checkout')->controller(CheckoutController::class)->name('checkout.')->group(function () {
    Route::get('/{flat}/details', 'details')->where('flat', '[0-9]+')->name('details');
    Route::post('/{flat}/payment', 'payment')->where('flat', '[0-9]+')->name('payment');
    Route::post('/{flat}/confirm', 'confirm')->where('flat', '[0-9]+')->name('confirm');
});
