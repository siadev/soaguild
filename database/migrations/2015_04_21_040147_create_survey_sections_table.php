<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveySectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survey_sections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->string('section_name');
            $table->tinyInteger('placement');
            $table->integer('survey_id')->unsigned();
            $table->foreign('survey_id')->references('id')->on('surveys');
            /* in_progress
             * true when entered
             * remains true till all question in section are answered
             * or the whole survey is finished.
             * or the completed field is set to true
             */
            $table->boolean('in_progress');
            $table->boolean('completed');  // Default is false, set to true when section is flagged completed.

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('survey_sections');
	}

}
