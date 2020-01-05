<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNews1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news1', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('title', 65535)->nullable();
			$table->integer('category_id')->nullable();
			$table->text('summary', 65535)->nullable();
			$table->text('content')->nullable();
			$table->integer('view_counter')->nullable()->default(0);
			$table->boolean('status')->nullable();
			$table->text('image', 65535)->nullable();
			$table->integer('created_by')->nullable();
			$table->timestamps();
			$table->boolean('featured')->nullable();
			$table->string('date_backup')->nullable();
			$table->text('content_backup', 65535)->nullable();
			$table->string('title_backup')->nullable();
			$table->string('post_status_backup')->nullable();
			$table->string('featured_backup')->nullable();
			$table->string('image_backup')->nullable();
			$table->string('post_type_backup')->nullable();
			$table->text('title_en', 65535)->nullable();
			$table->text('content_en', 65535)->nullable();
			$table->string('post_id', 225)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('news1');
	}

}
