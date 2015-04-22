<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survey_questions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('surveys');



		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('survey_questions');
	}

}
