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
        Schema::create('items', function (Blueprint $table) {
            $table->string('id')->primary(); // Custom ID like "ITM0001"
            $table->string('name');
            $table->integer('item_qty');
            $table->string('supp_id');
            $table->decimal('buy_price', 19, 2);
            $table->decimal('sale_price', 19, 2);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('supp_id')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['supp_id']);
        });

        Schema::dropIfExists('items');
    }
};
