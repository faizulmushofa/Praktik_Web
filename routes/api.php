<?php

use App\Http\Controllers\Api\BatchApiController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::apiResource('products', ProductController::class);
Route::apiResource('batches', BatchApiController::class)->parameters(['batches' => 'kode']);
Route::apiResource('orders', OrderController::class)->only(['index', 'store', 'show']);
