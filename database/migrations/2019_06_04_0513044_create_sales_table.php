<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('folio')->unsigned();
            $table->string('wayToPay'); //forma de pago
            $table->double('total')->default(0.00);
            $table->double('discount')->default(0.00);
            $table->double('percentageDiscount')->default(0.00);
            $table->double('creditCardPercentage')->default(0.00);
            $table->string('status')->default('proceso');
            $table->boolean('facturado')->default(false);
            $table->date('date');

            $table->integer('seller')->unsigned();
            $table->integer('branch_office')->unsigned();
            $table->integer('customer')->unsigned();

            $table->foreign('seller')->references('id')->on('users');
            $table->foreign('branch_office')->references('id')->on('branch_offices');
            $table->foreign('customer')->references('id')->on('customers');

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
        Schema::dropIfExists('sales');
    }
}
