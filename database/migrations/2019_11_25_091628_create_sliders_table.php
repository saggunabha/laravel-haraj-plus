<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidersTable extends Migration {

	public function up()
	{
		Schema::create('sliders', function(Blueprint $table) {
			$table->increments('id');
			$table->string('image');
			$table->timestamps();
			$table->string('title')->nullable();
			$table->string('body')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('sliders');
	}
}