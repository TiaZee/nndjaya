<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('sales_type');
            $table->string('buyer_name');
            $table->string('buyer_type');
            $table->string('item_type');
            $table->string('item_name');
            $table->string('item_qty');
            $table->string('sitem_qty');
            $table->string('sitem_price');
            $table->string('payment_type');
            $table->string('spay_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
