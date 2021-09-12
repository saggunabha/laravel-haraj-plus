<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscribersTable extends Migration {

	public function up()
	{
		Schema::create('subscribers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('subscribers');
	}
}