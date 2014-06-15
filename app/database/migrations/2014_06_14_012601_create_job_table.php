<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job', function(Blueprint $table)
		{
			$table->increments('id');

			$table->text('client');
			$table->text('job_number');
			$table->text('product');
			$table->text('title');
			$table->text('format');
			$table->text('format_other');
			$table->text('length');

			$table->text('creative_partner');
			$table->text('agency_producer');
			$table->text('agency_director');
			$table->text('project_manager');

			$table->text('production_company');
			$table->text('director');
			$table->text('dop');
			$table->text('producer');

			$table->text('post_production');
			$table->text('editor');
			$table->text('conform');
			$table->text('post_engineer');
			$table->text('design');
			$table->text('masters_held_at');

			$table->text('audio_production');
			$table->text('audio_engineer');
			$table->text('music_details');

			$table->date('music_expire_date');
			$table->date('roll_over_date');
			$table->date('first_air_date');
			$table->date('off_air_date');
			$table->text('other');

			$table->boolean('stall_roll_over');

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
		Schema::drop('job');
	}

}
