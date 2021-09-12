<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('user_id')->unsigned();
			$table->boolean('is_valid')->default(1);
			$table->string('status');
			$table->boolean('is_checked');
			$table->integer('discount_ratio')->nullable();
			$table->integer('price');
			$table->integer('category_id')->unsigned();
			$table->longText('description');
			$table->string('main_image');
			$table->integer('city_id')->unsigned();


			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}
