<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupCollectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_collections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('group_id')->unsigned();
			$table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('teacher_id')->unsigned();
			$table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('course_id')->unsigned();
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('group_collections');
	}

}
