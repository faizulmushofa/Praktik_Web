<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number', 30)->unique();
            $table->string('customer_name', 100);
            $table->string('customer_phone', 20);
            $table->text('customer_address');
            $table->string('customer_postal_code', 10);
            $table->json('items');
            $table->unsignedInteger('subtotal');
            $table->unsignedInteger('shipping_cost')->default(10000);
            $table->unsignedInteger('grand_total');
            $table->string('status', 30)->default('pending');
            $table->string('source', 30)->default('web');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
