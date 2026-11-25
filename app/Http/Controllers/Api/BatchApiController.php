<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BatchApiController extends Controller
{
    public function index(): JsonResponse
    {
        $batches = Batch::all();

        return response()->json([
            'data' => $batches,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'kode' => ['required', 'string', 'max:30', 'unique:batches,kode'],
            'tab_label' => ['required', 'string', 'max:100'],
            'quick_pick' => ['boolean'],
            'is_active' => ['boolean'],
            'is_archived' => ['boolean'],
            'status_type' => ['required', 'string', 'in:available,limited,fermenting,archived'],
            'badge_text' => ['required', 'string', 'max:120'],
            'stock_badge' => ['required', 'string', 'max:120'],
            'stock_remaining' => ['required', 'integer', 'min:0'],
            'stock_total' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'integer', 'min:0'],
            'price_label' => ['nullable', 'string', 'max:60'],
            'preorder_notice' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:150'],
            'short_title' => ['required', 'string', 'max:100'],
            'subtitle' => ['required', 'string'],
            'lokasi' => ['required', 'string', 'max:120'],
            'varietas' => ['required', 'string', 'max:100'],
            'asal_kebun' => ['required', 'string', 'max:80'],
            'kadar_air' => ['required', 'string', 'max:50'],
            'tanggal_roasting' => ['required', 'string', 'max:60'],
            'puncak_rasa' => ['required', 'string', 'max:60'],
            'thumbnail' => ['required', 'string', 'max:255'],
            'status_tahap_5' => ['required', 'string', 'max:150'],
            'tahap_5_desc' => ['required', 'string'],
            'takaran_tubruk' => ['required', 'string', 'max:100'],
            'takaran_barista' => ['required', 'string', 'max:100'],
            'flavor_title' => ['required', 'string', 'max:120'],
            'flavor_notes' => ['required', 'array'],
            'roaster_note' => ['required', 'string'],
            'roaster_verifier' => ['required', 'string', 'max:100'],
            'scores' => ['required', 'array'],
            'timeline' => ['required', 'array'],
        ]);

        $validated['kode'] = strtoupper(trim($validated['kode']));
        $batch = Batch::create($validated);

        return response()->json([
            'message' => 'Batch berhasil dibuat.',
            'data' => $batch,
        ], 201);
    }

    public function show(string $kode): JsonResponse
    {
        $batch = Batch::where('kode', strtoupper(trim($kode)))->first();

        if (! $batch) {
            return response()->json([
                'message' => 'Batch tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'data' => $batch,
        ], 200);
    }

    public function update(Request $request, string $kode): JsonResponse
    {
        $batch = Batch::where('kode', strtoupper(trim($kode)))->first();

        if (! $batch) {
            return response()->json([
                'message' => 'Batch tidak ditemukan.',
            ], 404);
        }

        $validated = $request->validate([
            'tab_label' => ['sometimes', 'required', 'string', 'max:100'],
            'quick_pick' => ['sometimes', 'boolean'],
            'is_active' => ['sometimes', 'boolean'],
            'is_archived' => ['sometimes', 'boolean'],
            'status_type' => ['sometimes', 'required', 'string', 'in:available,limited,fermenting,archived'],
            'badge_text' => ['sometimes', 'required', 'string', 'max:120'],
            'stock_badge' => ['sometimes', 'required', 'string', 'max:120'],
            'stock_remaining' => ['sometimes', 'required', 'integer', 'min:0'],
            'stock_total' => ['sometimes', 'required', 'integer', 'min:1'],
            'price' => ['sometimes', 'required', 'integer', 'min:0'],
            'price_label' => ['nullable', 'string', 'max:60'],
            'preorder_notice' => ['nullable', 'string', 'max:255'],
            'title' => ['sometimes', 'required', 'string', 'max:150'],
            'short_title' => ['sometimes', 'required', 'string', 'max:100'],
            'subtitle' => ['sometimes', 'required', 'string'],
        ]);

        $batch->update($validated);

        return response()->json([
            'message' => 'Batch berhasil diperbarui.',
            'data' => $batch,
        ], 200);
    }

    public function destroy(string $kode): JsonResponse
    {
        $batch = Batch::where('kode', strtoupper(trim($kode)))->first();

        if (! $batch) {
            return response()->json([
                'message' => 'Batch tidak ditemukan.',
            ], 404);
        }

        $batch->delete();

        return response()->json([
            'message' => 'Batch berhasil dihapus.',
        ], 200);
    }
}
