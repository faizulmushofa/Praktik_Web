<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = 'batches';

    protected $fillable = [
        'kode',
        'tab_label',
        'quick_pick',
        'is_active',
        'is_archived',
        'status_type',
        'badge_text',
        'stock_badge',
        'stock_remaining',
        'stock_total',
        'price',
        'price_label',
        'preorder_notice',
        'title',
        'short_title',
        'subtitle',
        'lokasi',
        'varietas',
        'asal_kebun',
        'kadar_air',
        'tanggal_roasting',
        'puncak_rasa',
        'thumbnail',
        'status_tahap_5',
        'tahap_5_desc',
        'takaran_tubruk',
        'takaran_barista',
        'flavor_title',
        'flavor_notes',
        'roaster_note',
        'roaster_verifier',
        'scores',
        'timeline',
    ];

    protected function casts(): array
    {
        return [
            'quick_pick' => 'boolean',
            'is_active' => 'boolean',
            'is_archived' => 'boolean',
            'stock_remaining' => 'integer',
            'stock_total' => 'integer',
            'price' => 'integer',
            'flavor_notes' => 'array',
            'scores' => 'array',
            'timeline' => 'array',
        ];
    }
}
