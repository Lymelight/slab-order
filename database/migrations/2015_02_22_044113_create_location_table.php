<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('location', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 60);
			$table->string('address1', 255);
			$table->string('address2', 255);
			$table->string('province', 2);
			$table->string('city', 60);
			$table->string('postal', 7);
			$table->timestamp('open_hour');
			$table->timestamp('close_hour');
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
		Schema::drop('location');
	}

}
