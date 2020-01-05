<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTranslations1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('translations1', function(Blueprint $table)
		{
			$table->increments('id');
			$table->char('locale', 2)->default('');
			$table->string('name', 100)->default('');
			$table->timestamps();
			$table->string('translatable_type', 50)->default('0');
			$table->integer('translatable_id')->nullable();
			$table->text('content')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('translations1');
	}

}
