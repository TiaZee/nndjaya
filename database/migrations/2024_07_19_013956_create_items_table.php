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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_type');
            $table->string('item_name');
            $table->string('item_qty');
            $table->string('item_sub_qty');
            $table->string('item_ttl_qty');
            $table->string('supp_id');
            $table->string('item_buy_price');
            $table->string('item_sales_price');
            $table->string('retail_item_buy_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
