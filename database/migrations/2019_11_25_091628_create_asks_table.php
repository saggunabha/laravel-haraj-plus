<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAsksTable extends Migration {

	public function up()
	{
		Schema::create('asks', function(Blueprint $table) {
			$table->increments('id');

			$table->text('ask');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('asks');
	}
}
