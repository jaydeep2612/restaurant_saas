<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ChefOrderController;

Route::middleware(['auth:sanctum'])->group(function () {

    // Customer / Waiter
    Route::post('/orders', [OrderController::class, 'store']);
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel']);

    // Chef
    Route::get('/chef/orders', [ChefOrderController::class, 'index']);
    Route::post('/chef/orders/{order}/status', [ChefOrderController::class, 'updateStatus']);
});
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->post(
    '/logout',
    [AuthController::class, 'logout']
);

Route::get('/health-check', function () {
    return response()->json(['status' => 'ok']);
});
