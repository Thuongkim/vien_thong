<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function(Blueprint $table)
		{
			$table->bigInteger('id')->unsigned();
			$table->string('title');
			$table->integer('category_id');
			$table->string('summary');
			$table->string('summary_long');
			$table->text('content', 65535);
			$table->string('image');
			$table->string('icon');
			$table->integer('position');
			$table->integer('featured');
			$table->integer('status');
			$table->integer('created_by');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('services');
	}

}
