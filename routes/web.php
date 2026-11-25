<?php

use App\Http\Controllers\AuthPageController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LegacyProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/batch', [BatchController::class, 'index'])->name('batch.lacak');
Route::get('/legacy-products', [LegacyProductController::class, 'index'])->name('products.legacy');

Route::get('/login', [AuthPageController::class, 'login'])->name('login');
Route::get('/register', [AuthPageController::class, 'register'])->name('register');
