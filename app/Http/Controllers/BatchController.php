<?php

namespace App\Http\Controllers;

use App\Models\BatchModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BatchController extends Controller
{
    public function __construct(
        private BatchModel $batchModel
    ) {
    }

    public function index(Request $request): View
    {
        $requestedCode = $request->query('kode');
        $data = $this->batchModel->getPageData($requestedCode);

        return view('batch', $data);
    }
}
