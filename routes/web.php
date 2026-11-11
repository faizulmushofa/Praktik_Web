<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('product-page', [
        'pageTitle' => 'Kopi Nusantara — Cerita Baik dari Setiap Seduhan',
    ]);
});
