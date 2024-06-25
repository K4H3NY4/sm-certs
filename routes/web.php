<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StripeWebhookController;

use App\Http\Controllers\PayController;

Route::post('/stripe/webhook', [StripeWebhookController::class, 'handleWebhook']);


Route::get('/', [PayController::class, 'index'])->name('payment.index');
Route::post('/submit', [PayController::class, 'submitForm'])->name('payment.submit');

Route::get('/', function () {
    return view('tour');
});


Route::get('/tour', function () {
    return view('tour');
});
