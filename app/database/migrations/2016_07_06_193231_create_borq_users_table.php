<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorqUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('borq_users', function(Blueprint $table)
		{
			
			$table->increments('id');
			$table->integer('player_location_id')->unsigned();
			$table->foreign('player_location_id')->references('id')->on('maps');
			$table->integer('health');
			$table->integer('stealth');
			$table->integer('armor')->nullable();
			$table->string('apple')->nullable();
			$table->string('bread')->nullable();
			$table->string('sword')->nullable();
			$table->string('key')->nullable();
			$table->string('wine')->nullable();
			$table->string('lantern')->nullable();
			$table->string('note')->nullable();
			$table->string('gown')->nullable();
			$table->string('potion_invisibility')->nullable();
			$table->string('potion_strength')->nullable();
			$table->string('potion_regeneration')->nullable();
			$table->string('crown')->nullable();

			$table->boolean('access_x'); // need to add all the access flags as they are built.  access grants permission to block paths

			$table->softDeletes();
			$table->timestamps();
			$table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('borq_users');
	}

}
