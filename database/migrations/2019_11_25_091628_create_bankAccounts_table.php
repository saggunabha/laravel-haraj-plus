<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankAccountsTable extends Migration {

	public function up()
	{
		Schema::create('bankAccounts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('number');
			$table->string('iban_number');
			$table->timestamps();
			$table->string('logo');
		});
	}

	public function down()
	{
		Schema::drop('bankAccounts');
	}
}
