<?php

use App\Models\Batch;
use Database\Seeders\BatchSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(BatchSeeder::class);
});

test('can list all batches via api', function () {
    $response = $this->getJson('/api/batches');

    $response->assertOk()
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'kode', 'title', 'price', 'stock_remaining', 'status_type'],
            ],
        ]);
});

test('can show a batch by kode via api', function () {
    $response = $this->getJson('/api/batches/ANOM-04-ARG');

    $response->assertOk()
        ->assertJsonPath('data.kode', 'ANOM-04-ARG');
});

test('returns 404 when batch kode is not found', function () {
    $response = $this->getJson('/api/batches/INVALID-CODE');

    $response->assertNotFound()
        ->assertJsonPath('message', 'Batch tidak ditemukan.');
});

test('validates required fields when creating a batch', function () {
    $response = $this->postJson('/api/batches', []);

    $response->assertUnprocessable()
        ->assertJsonValidationErrors(['kode', 'title', 'price']);
});

test('can create, update, and delete a batch via api', function () {
    $payload = [
        'kode' => 'ANOM-05-TEST',
        'tab_label' => 'ANOM-05-TEST: Test #05',
        'quick_pick' => false,
        'is_active' => true,
        'is_archived' => false,
        'status_type' => 'available',
        'badge_text' => 'BATCH #05',
        'stock_badge' => 'TERSEDIA',
        'stock_remaining' => 10,
        'stock_total' => 20,
        'price' => 95000,
        'title' => 'Arabica Test — Batch #05',
        'short_title' => 'Arabica Test #05',
        'subtitle' => 'Deskripsi test batch',
        'lokasi' => 'Malang',
        'varietas' => 'Typica',
        'asal_kebun' => '1.200 mdpl',
        'kadar_air' => '11,5%',
        'tanggal_roasting' => '25 Nov 2026',
        'puncak_rasa' => 's/d 25 Jan 2027',
        'thumbnail' => 'https://example.com/coffee.jpg',
        'status_tahap_5' => 'PUNCAK AROMA',
        'tahap_5_desc' => 'Deskripsi tahap 5',
        'takaran_tubruk' => '1,5 Sdm',
        'takaran_barista' => '1:15',
        'flavor_title' => 'Karakter Seduh',
        'flavor_notes' => ['Caramel', 'Citrus'],
        'roaster_note' => 'Bersih dan manis',
        'roaster_verifier' => 'Head Roaster',
        'scores' => ['Aroma' => 4.5, 'Acidity' => 4.0, 'Sweetness' => 4.5, 'Body' => 4.0, 'Clean Finish' => 4.5],
        'timeline' => [],
    ];

    $createResponse = $this->postJson('/api/batches', $payload);
    $createResponse->assertCreated()->assertJsonPath('data.kode', 'ANOM-05-TEST');

    $updateResponse = $this->putJson('/api/batches/ANOM-05-TEST', ['stock_remaining' => 8]);
    $updateResponse->assertOk()->assertJsonPath('data.stock_remaining', 8);

    $deleteResponse = $this->deleteJson('/api/batches/ANOM-05-TEST');
    $deleteResponse->assertOk();

    $this->assertDatabaseMissing('batches', ['kode' => 'ANOM-05-TEST']);
});

test('can create an order with validation and decrement batch stock', function () {
    $invalidResponse = $this->postJson('/api/orders', [
        'customer_name' => '',
        'items' => [],
    ]);
    $invalidResponse->assertUnprocessable()
        ->assertJsonValidationErrors(['customer_name', 'customer_phone', 'customer_address', 'customer_postal_code', 'items']);

    $beforeStock = Batch::where('kode', 'ANOM-04-ARG')->value('stock_remaining');

    $response = $this->postJson('/api/orders', [
        'customer_name' => 'Budi Santoso',
        'customer_phone' => '081234567890',
        'customer_address' => 'Jl. Merdeka No. 12, Malang',
        'customer_postal_code' => '65111',
        'source' => 'batch',
        'items' => [
            [
                'name' => 'Arabica Malang #04 [ANOM-04-ARG]',
                'grind' => 'Halus - Tubruk',
                'weight' => '200g',
                'price' => 85000,
                'qty' => 2,
                'batch_code' => 'ANOM-04-ARG',
            ],
        ],
    ]);

    $response->assertCreated()
        ->assertJsonPath('data.subtotal', 170000)
        ->assertJsonPath('data.shipping_cost', 10000)
        ->assertJsonPath('data.grand_total', 180000);

    $afterStock = Batch::where('kode', 'ANOM-04-ARG')->value('stock_remaining');
    expect($afterStock)->toBe($beforeStock - 2);
});
