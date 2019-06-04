<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('rfc',12);
            $table->longText('address');
            $table->string('phone',20);
            $table->string('email',50);
            $table->string('postalCode',10);
            $table->double('cardPayment')->default(0.00);

            $table->string('regimenFiscal',100);
            $table->string('password',255);
            $table->string('hostMail',100);

            $table->string('routekey');
            $table->string('routecer');
            $table->string('passwordseal',255); //contraseña sello
            $table->longText('certificatenumber');
            $table->string('logo');
            
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
        Schema::dropIfExists('companies');
    }
}
