<?php

use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('checkout/{property}')->controller(CheckoutController::class)->group(function () {
    Route::get('details', 'details')->name('checkout.details');
    Route::get('payment', 'payment')->name('checkout.payment');
    Route::get('confirm', 'confirm')->name('checkout.confirm');
});
