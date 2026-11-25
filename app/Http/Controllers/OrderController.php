<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(): JsonResponse
    {
        $orders = Order::latest()->get();

        return response()->json([
            'data' => $orders,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:100'],
            'customer_phone' => ['required', 'string', 'max:20'],
            'customer_address' => ['required', 'string', 'max:500'],
            'customer_postal_code' => ['required', 'string', 'max:10'],
            'source' => ['nullable', 'string', 'in:beranda,batch,web'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.name' => ['required', 'string', 'max:150'],
            'items.*.grind' => ['nullable', 'string', 'max:60'],
            'items.*.weight' => ['nullable', 'string', 'max:30'],
            'items.*.price' => ['required', 'integer', 'min:0'],
            'items.*.qty' => ['required', 'integer', 'min:1', 'max:50'],
            'items.*.batch_code' => ['nullable', 'string', 'max:30'],
        ]);

        $subtotal = 0;
        foreach ($validated['items'] as $item) {
            $subtotal += $item['price'] * $item['qty'];

            if (! empty($item['batch_code'])) {
                $batch = Batch::where('kode', strtoupper(trim($item['batch_code'])))->first();
                if ($batch && $batch->stock_remaining >= $item['qty']) {
                    $batch->decrement('stock_remaining', $item['qty']);
                }
            }
        }

        $shippingCost = 10000;
        $grandTotal = $subtotal + $shippingCost;
        $prefix = ($validated['source'] ?? 'web') === 'batch' ? '#ANM-B' : '#ANM-';
        $invoiceNumber = $prefix.random_int(1000, 9999);

        $order = Order::create([
            'invoice_number' => $invoiceNumber,
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'],
            'customer_address' => $validated['customer_address'],
            'customer_postal_code' => $validated['customer_postal_code'],
            'items' => $validated['items'],
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'grand_total' => $grandTotal,
            'status' => 'pending',
            'source' => $validated['source'] ?? 'web',
        ]);

        return response()->json([
            'message' => 'Pesanan berhasil dibuat.',
            'data' => $order,
        ], 201);
    }

    public function show(string $invoice): JsonResponse
    {
        $order = Order::where('invoice_number', $invoice)->first();

        if (! $order) {
            return response()->json([
                'message' => 'Pesanan tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'data' => $order,
        ], 200);
    }
}
