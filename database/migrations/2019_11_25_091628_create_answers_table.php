<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswersTable extends Migration {

	public function up()
	{
		Schema::create('answers', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('ask_id')->unsigned();
			$table->text('answer');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('answers');
	}
}