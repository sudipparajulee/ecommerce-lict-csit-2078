<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products',[ProductController::class, 'index'])->middleware('auth:sanctum');

Route::post('/login',[AuthController::class, 'login']);
