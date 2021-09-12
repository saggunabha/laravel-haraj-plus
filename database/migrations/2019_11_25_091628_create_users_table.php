<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('phone')->unique();
			$table->integer('city_id')->unsigned()->nullable();
            $table->string('address')->nullable();
			$table->string('password');
			$table->string('type')->default('2');
			$table->boolean( 'is_active')->default(1);
			$table->boolean( 'connected')->default(0);
            $table->integer('is_promoted')->default(0);
			$table->text('image')->nullable();
			$table->bigInteger('code');
			$table->timestamps();

		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
