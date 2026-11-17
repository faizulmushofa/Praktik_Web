<?php

namespace App\Http\Controllers;

use App\Models\BerandaModel;
use Illuminate\View\View;

class BerandaController extends Controller
{
    public function __construct(
        private BerandaModel $berandaModel
    ) {
    }

    public function index(): View
    {
        $data = $this->berandaModel->getAllData();

        return view('beranda', $data);
    }
}
