<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('surveys', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('participant_id')->unsigned();
            $table->foreign('participant_id')->references('id')->on('survey_participants')->onDelete('cascade');
            $table->string('name', 40);
            $table->string('description');
            $table->string('welcome_message');
            $table->string('exit_message');
            $table->dateTime('start_date');
            $table->dateTime('expiration_date');
            $table->tinyInteger('amount_of_pages');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('surveys');
	}

}
