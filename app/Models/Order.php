<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'invoice_number',
        'customer_name',
        'customer_phone',
        'customer_address',
        'customer_postal_code',
        'items',
        'subtotal',
        'shipping_cost',
        'grand_total',
        'status',
        'source',
    ];

    protected function casts(): array
    {
        return [
            'items' => 'array',
            'subtotal' => 'integer',
            'shipping_cost' => 'integer',
            'grand_total' => 'integer',
        ];
    }
}
