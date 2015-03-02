<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateC12lensGroupsC12lensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('c12lens_groups_c12lens', function(Blueprint $table)
		{
			$table->integer('customization_group_id')->unsigned();
			$table->foreign('customization_group_id')->references('id')->on('customization_groups')->onDelete('cascade');
			$table->integer('customization_id')->unsigned();
			$table->foreign('customization_id')->references('id')->on('customizations')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('c12lens_groups_c12lens');
	}

}