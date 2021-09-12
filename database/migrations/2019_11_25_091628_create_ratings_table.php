<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingsTable extends Migration {

	public function up()
	{
		Schema::create('ratings', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('degree');
			$table->text('comment');
			$table->integer('product_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ratings');
	}
}