<?php

use App\Http\Controllers\Api\BookableAvailablityController;
use App\Http\Controllers\Api\BookableController;
use App\Http\Controllers\Api\BookableReviewController;
use App\Http\Controllers\Api\BookingByReviewController;
use App\Http\Controllers\Api\ReviewController;
use App\Models\Bookable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('bookables', BookableController::class) -> only(['index', 'show']);
Route::get('bookables/{bookable}/availability', BookableAvailablityController::class) -> name('bookables.availablity.show');
Route::get('bookables/{bookable}/reviews', BookableReviewController::class) -> name('bookables.reviews.show');
Route::get('booking-by-review/{reviewKey}', BookingByReviewController::class) -> name('booking.by-review.show');

Route::apiResource('reviews', ReviewController::class) -> only(['show']);
