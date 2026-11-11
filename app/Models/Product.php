<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // ponytail: explicit table name matches migration; drop when using default naming conventions
    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'description',
        'detail',
        'image',
        'category',
        'bg',
        'origin',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }

    public function getFormattedPrice(): string
    {
        return 'Rp '.number_format((float) $this->price, 0, ',', '.');
    }

    public function getDetailId(): string
    {
        $slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $this->name), '-'));

        return 'detail-'.$slug;
    }
}
