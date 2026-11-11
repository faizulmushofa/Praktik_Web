<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = base_path('_legacy/apps/data/products.json');
        if (! file_exists($jsonPath)) {
            return;
        }

        $items = json_decode(file_get_contents($jsonPath), true) ?? [];

        foreach ($items as $item) {
            Product::updateOrCreate(
                ['name' => $item['name']],
                [
                    'price' => (float) ($item['price'] ?? 0),
                    'description' => $item['description'] ?? null,
                    'detail' => $item['detail'] ?? null,
                    'image' => isset($item['image']) ? str_replace('../', '', $item['image']) : null,
                    'category' => $item['class'] ?? $item['category'] ?? 'Nusantara',
                    'bg' => $item['bg'] ?? 'bg-[#f7f5ed]',
                    'origin' => $item['origin'] ?? 'Indonesia',
                ]
            );
        }
    }
}
