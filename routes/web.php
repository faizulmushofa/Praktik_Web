<?php

use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');

Route::get('/legacy-products', function () {
    return view('product-page', [
        'pageTitle' => 'Kopi Nusantara — Cerita Baik dari Setiap Seduhan',
    ]);
});
