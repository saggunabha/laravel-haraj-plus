<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	public function up()
	{
		Schema::create('payments', function(Blueprint $table) {
			$table->increments('id');
            $table->unsignedInteger('user_id');
			$table->integer('money_amount');
			$table->date('transfer_date');
			$table->string('transferee_name');
			$table->integer('product_id')->unsigned()->nullable();
			$table->string('image');
			$table->bigInteger('bank_no')->nullable();
            $table->integer('is_accepted')->default(2);
            $table->unsignedInteger('paymentMethod')->nullable();
			$table->text('notes')->nullable();
			$table->string('type');
			$table->unsignedInteger('bankAccount_id')->nullable();
			$table->unsignedInteger('pakage_id')->nullable();

			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('payments');
	}
}
