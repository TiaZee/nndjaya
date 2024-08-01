<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('item_id');
            $table->string('name_item');
            $table->integer('item_restocks_total');
            $table->decimal('buy_price', 19, 2);
            $table->integer('item_sales_total');
            $table->decimal('sale_price', 19, 2);
            $table->integer('item_qty');
            $table->decimal('price_in_item', 19, 2);
            $table->decimal('profit', 19, 2);
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('name_item')->references('name')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
