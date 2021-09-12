<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdsTable extends Migration {

	public function up()
	{
		Schema::create('ads', function(Blueprint $table) {
			$table->increments('id');
			$table->string('image');
			$table->string('link');
			$table->text('description')->nullable();
			$table->enum('position', array('left', 'top', 'banner'));
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ads');
	}
}
