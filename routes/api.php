<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products',[ProductController::class, 'index']);

Route::post('/login',[AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/orders', [OrderController::class,'myorders']);
    Route::post('/order/store/{cartid}', [OrderController::class,'store']);
    Route::get('/cart', [CartController::class,'mycart']);
});
