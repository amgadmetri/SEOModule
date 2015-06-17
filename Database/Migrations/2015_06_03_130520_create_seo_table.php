<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if ( ! Schema::hasTable('seo'))
		{
			Schema::create('seo', function(Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('item_type', 255)->index();
				$table->bigInteger('item_id')->unsigned();
				$table->bigInteger('user_id')->unsigned();
				$table->foreign('user_id')->references('id')->on('users');
				$table->timestamps();
			});

			
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if (Schema::hasTable('seo'))
		{
			Schema::drop('seo');
		}
	}
}