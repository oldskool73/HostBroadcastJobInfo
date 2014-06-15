<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecondaryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('secondary', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('job_id');
			$table->text('name');
			$table->text('role');
			$table->text('term');
			$table->text('media');
			$table->text('area');
			$table->text('agent');
			$table->text('fee');
			$table->text('type');

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
		Schema::drop('secondary');
	}

}
