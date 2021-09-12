<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePakagesTable extends Migration {

	public function up()
	{
		Schema::create('pakages', function(Blueprint $table) {
			$table->increments('id');
			$table->string('type');
			$table->integer('price');
			$table->string('body');
            $table->integer('duration');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('pakages');
	}
}