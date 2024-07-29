<?php

// database/migrations/xxxx_xx_xx_create_deleted_ids_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeletedIdsTable extends Migration
{
    public function up()
    {
        Schema::create('deleted_ids', function (Blueprint $table) {
            $table->string('id'); // ID format like 'ITM0001'
            $table->timestamps(); // Created at and Updated at timestamps
            $table->primary('id'); // Set 'id' as the primary key
        });
    }

    public function down()
    {
        Schema::dropIfExists('deleted_ids');
    }
}
