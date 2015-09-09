<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schedules', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('group_collection_id');
			$table->foreign('group_collection_id')->references('id')->on('group_collections')->onDelete('cascade')->onUpdate('cascade');
			$table->enum('day', [1, 2, 3, 4, 5, 6, 7]);
			$table->string('building');
			$table->string('classroom');
			$table->time('from');
			$table->time('to');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('schedules');
	}

}
