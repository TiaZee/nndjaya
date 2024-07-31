<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restocks', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('supp_id');
            $table->string('supp_name');
            $table->string('item_id');
            $table->string('name_item');
            $table->decimal('buy_price', 19, 2);
            $table->integer('buy_qty');
            $table->decimal('buy_total', 19, 2);
            $table->timestamps();

            // Define foreign keys
            $table->foreign('supp_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            // Ensure 'name' column in 'suppliers' table is unique or use 'id' as foreign key
            $table->foreign('supp_name')->references('name')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restocks');
    }
};
