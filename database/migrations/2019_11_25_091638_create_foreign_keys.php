<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
        Schema::table('categories', function(Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

		Schema::table('users', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->foreign('country_id')->references('id')->on('countries')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('images', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('favorites', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('favorites', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('reports', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('reports', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ratings', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ratings', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

		Schema::table('answers', function(Blueprint $table) {
			$table->foreign('ask_id')->references('id')->on('asks')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
        Schema::table('payments', function(Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('payments', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('payments', function(Blueprint $table) {
            $table->foreign('bankAccount_id')->references('id')->on('bankAccounts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('payments', function(Blueprint $table) {
            $table->foreign('pakage_id')->references('id')->on('pakages')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });



		Schema::table('promotedUsers', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('promotedUsers', function(Blueprint $table) {
			$table->foreign('pakage_id')->references('id')->on('pakages')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->foreign('sender_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->foreign('reciever_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_user_id_foreign');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_category_id_foreign');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_city_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_city_id_foreign');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->dropForeign('cities_country_id_foreign');
		});
		Schema::table('images', function(Blueprint $table) {
			$table->dropForeign('images_product_id_foreign');
		});
		Schema::table('favorites', function(Blueprint $table) {
			$table->dropForeign('favorites_user_id_foreign');
		});
		Schema::table('favorites', function(Blueprint $table) {
			$table->dropForeign('favorites_product_id_foreign');
		});
		Schema::table('reports', function(Blueprint $table) {
			$table->dropForeign('reports_user_id_foreign');
		});
		Schema::table('reports', function(Blueprint $table) {
			$table->dropForeign('reports_product_id_foreign');
		});
		Schema::table('ratings', function(Blueprint $table) {
			$table->dropForeign('ratings_product_id_foreign');
		});
		Schema::table('ratings', function(Blueprint $table) {
			$table->dropForeign('ratings_user_id_foreign');
		});
		Schema::table('ads', function(Blueprint $table) {
			$table->dropForeign('ads_user_id_foreign');
		});
		Schema::table('answers', function(Blueprint $table) {
			$table->dropForeign('answers_ask_id_foreign');
		});
		Schema::table('payments', function(Blueprint $table) {
			$table->dropForeign('payments_product_id_foreign');
		});
		Schema::table('promotedUsers', function(Blueprint $table) {
			$table->dropForeign('promotedUsers_user_id_foreign');
		});
		Schema::table('promotedUsers', function(Blueprint $table) {
			$table->dropForeign('promotedUsers_pakage_id_foreign');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->dropForeign('messages_sender_id_foreign');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->dropForeign('messages_reciever_id_foreign');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->dropForeign('messages_product_id_foreign');
		});
	}
}
