<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('route_name')->unique();
			$table->string('layout')->default('layouts.default');
			$table->string('lang', 10)->default('es-MX');
			$table->string('title')->default('Asana Teacher');
			$table->string('description')->default('Description of this page.');
			$table->integer('app_id')->unsigned()->nullable();
			$table->foreign('app_id')->references('id')->on('apps');
			$table->enum('type', ['private', 'public'])->default('public');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('pages');
	}

}
