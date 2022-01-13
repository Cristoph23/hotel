<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservaservices', function (Blueprint $table) {
            $table->id();
            $table->string("title", 255);
            $table->unsignedBigInteger('reserva_id');
            $table->unsignedBigInteger('services_id');

            $table->dateTime("start");
            $table->dateTime("end");

            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
            
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
        Schema::dropIfExists('reservaservices');
    }
}
