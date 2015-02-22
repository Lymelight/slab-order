<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomizationGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customization_group', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id');
			$table->string('name');
			$table->integer('order');
			$table->tinyInteger('required');
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
		Schema::drop('customization_group');
	}

}
