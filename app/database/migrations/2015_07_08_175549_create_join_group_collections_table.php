<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJoinGroupCollectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('join_group_collections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('group_collection_id')->unsigned();
			$table->foreign('group_collection_id')->references('id')->on('group_collections')->onDelete('cascade')->onUpdate('cascade');
			$table->integer('student_id')->unsigned();
			$table->foreign('student_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::drop('join_group_collections');
	}

}
