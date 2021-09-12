<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentMethodsTable extends Migration {

    public function up()
    {
        Schema::create('paymentMethods', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('type');
            $table->string('image')->nullable();
        });
    }
	public function down()
	{
		Schema::drop('paymentMethods');
	}
}
