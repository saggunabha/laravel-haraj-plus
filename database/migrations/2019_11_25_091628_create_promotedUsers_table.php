<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePromotedUsersTable extends Migration {

	public function up()
	{
		Schema::create('promotedUsers', function(Blueprint $table) {
		$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->text('about')->nullable();
			$table->string('cover_image')->nullable();
			$table->string('link')->nullable();
			$table->integer('pakage_id')->unsigned()->nullable();
			$table->boolean('is_active')->nullable();

			$table->date('start_date');
			$table->date('end_date');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('promotedUsers');
	}
}
