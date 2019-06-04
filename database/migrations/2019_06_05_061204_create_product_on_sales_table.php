<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOnSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_on_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale')->unsigned();
            $table->integer('product')->unsigned();
            $table->integer('amount')->unsigned();
            $table->double('price');
            $table->double('subtotal');

            $table->foreign('sale')->references('id')->on('sales');
            $table->foreign('product')->references('id')->on('products');

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
        Schema::dropIfExists('product_on_sales');
    }
}
