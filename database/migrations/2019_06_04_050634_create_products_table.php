<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('productName',300);
            $table->string('avatar',100)->default('avatar.png');
            $table->integer('stock')->unsgined();
            $table->string('code',50);
            $table->double('price');
            $table->double('cost');
            $table->integer('topSale')->default(0);
            $table->string('status')->default('activo');

            $table->integer('branch_office')->unsigned();
            $table->integer('category')->unsigned();
            $table->integer('brand')->unsigned();
            $table->integer('provider')->unsigned();

            $table->foreign('branch_office')->references('id')->on('branch_offices');
            $table->foreign('brand')->references('id')->on('brands');
            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('provider')->references('id')->on('providers');

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
        Schema::dropIfExists('products');
    }
}
