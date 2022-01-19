<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('orde_id');
            $table->integer('cust_id');
            $table->integer('sucu_id');
            $table->double('orde_total');
            $table->integer('orde_status');
            $table->integer('orde_pago');
            $table->string('orde_pay_id');
            $table->string('orde_pay_autho');
            $table->string('orde_lat');
            $table->string('orde_lon');

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
        Schema::dropIfExists('orders');
    }
}
