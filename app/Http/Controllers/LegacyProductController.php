<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LegacyProductController extends Controller
{
    public function index(): View
    {
        return view('product-page', [
            'pageTitle' => 'Kopi Nusantara — Cerita Baik dari Setiap Seduhan',
        ]);
    }
}
