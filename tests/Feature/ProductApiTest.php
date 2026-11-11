<?php

use App\Models\Product;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(ProductSeeder::class);
});

test('can list all products via api', function () {
    $response = $this->getJson('/api/products');

    $response->assertOk()
        ->assertJsonStructure([
            '*' => ['id', 'name', 'price', 'description', 'detail', 'image', 'category', 'bg', 'origin'],
        ]);
});

test('can create a product via api', function () {
    $payload = [
        'name' => 'Kopi Toraja',
        'price' => 48000,
        'description' => 'Aroma rempah dan rasa tebal khas Toraja.',
        'category' => 'Nusantara',
    ];

    $response = $this->postJson('/api/products', $payload);

    $response->assertCreated()
        ->assertJsonPath('name', 'Kopi Toraja');

    $this->assertDatabaseHas('products', ['name' => 'Kopi Toraja']);
});

test('can show a product via api', function () {
    $product = Product::first();

    $response = $this->getJson("/api/products/{$product->id}");

    $response->assertOk()
        ->assertJsonPath('id', $product->id)
        ->assertJsonPath('name', $product->name);
});

test('can update a product via api', function () {
    $product = Product::first();

    $response = $this->putJson("/api/products/{$product->id}", [
        'name' => 'Updated Coffee Name',
    ]);

    $response->assertOk()
        ->assertJsonPath('name', 'Updated Coffee Name');

    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'name' => 'Updated Coffee Name',
    ]);
});

test('can delete a product via api', function () {
    $product = Product::create([
        'name' => 'Temporary Coffee',
        'price' => 10000,
    ]);

    $response = $this->deleteJson("/api/products/{$product->id}");

    $response->assertNoContent();

    $this->assertDatabaseMissing('products', ['id' => $product->id]);
});
