<?php

use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CertificateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeCheckoutController;


Route::post('/create-checkout-session', [StripeCheckoutController::class, 'createCheckoutSession']);
Route::get('/checkout/success', [StripeCheckoutController::class, 'success']);
Route::get('/checkout/cancel', [StripeCheckoutController::class, 'cancel']);

Route::resource('tours', TourController::class);
Route::resource('certificates', CertificateController::class);
Route::get('/tours/search/{name}', [TourController::class, 'search']);

//Route::post('/certificates', [CertificateController::class, 'store']);

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');



Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('bookings', BookingController::class)->except(['index', 'show']);
 //   Route::apiResource('certificates', CertificateController::class)->except(['index','show']);
});

Route::apiResource('bookings', BookingController::class)->only(['index', 'show']);
//Route::apiResource('certificates', CertificateController::class)->only(['index','show']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
