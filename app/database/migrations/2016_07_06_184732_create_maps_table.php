<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('maps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('location_name')->unique();
			$table->string('display_name');
			$table->integer('north_map_id')->unsigned()->nullable();
			$table->foreign('north_map_id')->references('id')->on('maps');
			$table->integer('south_map_id')->unsigned()->nullable();
			$table->foreign('south_map_id')->references('id')->on('maps');
			$table->integer('east_map_id')->unsigned()->nullable();
			$table->foreign('east_map_id')->references('id')->on('maps');
			$table->integer('west_map_id')->unsigned()->nullable();
			$table->foreign('west_map_id')->references('id')->on('maps');
			$table->text('description');
			$table->string('objects')->nullable();

			$table->softDeletes();
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
		Schema::drop('maps');
	}

}
