<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration {

	public function up()
	{
		Schema::create('messages', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('sender_id')->unsigned();
			$table->integer('reciever_id')->unsigned();
			$table->integer('seen')->default('0');
			$table->longText('content')->nullable();
			$table->string('file')->nullable();

			$table->integer('product_id')->unsigned();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('messages');
	}
}
