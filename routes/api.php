<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TransactionController;
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

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);

        Route::middleware('auth:sanctum')->group(function () {
            Route::get('profile', [AuthController::class, 'profile']);
            Route::post('profile', [AuthController::class, 'updateProfile']);
            Route::post('logout', [AuthController::class, 'logout']);
        });
    });

    Route::get('products', [ProductController::class, 'all']);
    Route::get('product-categories', [ProductCategoryController::class, 'all']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('transactions', [TransactionController::class, 'transaction']);
        Route::post('checkout', [TransactionController::class, 'checkout']);
    });
});
