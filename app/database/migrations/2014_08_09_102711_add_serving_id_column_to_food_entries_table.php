<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddServingIdColumnToFoodEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('food_entries', function(Blueprint $table)
		{
			$table->integer('serving_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('food_entries', function(Blueprint $table)
		{
			$table->dropColumn('serving_id');
		});
	}

}
