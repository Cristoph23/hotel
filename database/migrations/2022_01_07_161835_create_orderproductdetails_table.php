<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderproductdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderproductdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orderproduct_id');
            $table->unsignedBigInteger('product_id');

            $table->integer('quantity');
            $table->decimal('total');

            $table->foreign('orderproduct_id')->references('id')->on('orderproducts')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('orderproductdetails');
    }
}
