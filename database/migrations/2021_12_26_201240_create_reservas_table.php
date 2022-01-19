<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->string("title", 255);
            $table->text("nombre");
            $table->unsignedBigInteger('room_id');

            $table->dateTime("start");
            $table->dateTime("end", );

            $table->decimal("total",8,2)->nullable();
            $table->integer("dias");
            $table->text("tipo_pago")->nullable();
            
            $table->string("status_pago")->default("No pagado");
            $table->integer('kids');
            $table->integer('adults');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
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
        Schema::dropIfExists('reservas');
    }
}
