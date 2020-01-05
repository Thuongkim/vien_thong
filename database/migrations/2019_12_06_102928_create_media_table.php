<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 500);
			$table->string('source', 500);
			$table->timestamps();
			$table->boolean('status')->nullable();
			$table->integer('created_by')->nullable();
			$table->boolean('type')->default(0);
			$table->integer('ref_id')->nullable();
			$table->smallInteger('size')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('media');
	}

}
