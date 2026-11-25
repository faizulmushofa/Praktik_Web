<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 30)->unique();
            $table->string('tab_label', 100);
            $table->boolean('quick_pick')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_archived')->default(false);
            $table->string('status_type', 30)->default('available');
            $table->string('badge_text', 120);
            $table->string('stock_badge', 120);
            $table->unsignedInteger('stock_remaining')->default(0);
            $table->unsignedInteger('stock_total')->default(0);
            $table->unsignedInteger('price')->default(85000);
            $table->string('price_label', 60)->nullable();
            $table->string('preorder_notice', 255)->nullable();
            $table->string('title', 150);
            $table->string('short_title', 100);
            $table->text('subtitle');
            $table->string('lokasi', 120);
            $table->string('varietas', 100);
            $table->string('asal_kebun', 80);
            $table->string('kadar_air', 50);
            $table->string('tanggal_roasting', 60);
            $table->string('puncak_rasa', 60);
            $table->string('thumbnail', 255);
            $table->string('status_tahap_5', 150);
            $table->text('tahap_5_desc');
            $table->string('takaran_tubruk', 100);
            $table->string('takaran_barista', 100);
            $table->string('flavor_title', 120);
            $table->json('flavor_notes');
            $table->text('roaster_note');
            $table->string('roaster_verifier', 100);
            $table->json('scores');
            $table->json('timeline');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
