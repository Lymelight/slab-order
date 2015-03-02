<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			/**
			 * For this section, remember to go back and relate the majority of the these fields to
			 * the foreign keys of the other tables the numbers are ultimately drawn from
			 */

			$table->increments('id');
			$table->integer('customer_user_id')->unsigned();
			$table->integer('business_user_id')->unsigned();
			$table->integer('location_id')->unsigned();
			$table->integer('menu_id')->unsigned();
			$table->double('total', 6, 2);
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
		Schema::drop('orders');
	}

}
