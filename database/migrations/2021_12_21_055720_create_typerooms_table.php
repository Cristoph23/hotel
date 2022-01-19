<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTyperoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typerooms', function (Blueprint $table) {
            $table->id();
            $table->text('type_room');
            $table->decimal('price_adult', 9, 2);
            $table->decimal('price_kid', 9, 2);

            $table->longText('details_room')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('typerooms');
    }
}
