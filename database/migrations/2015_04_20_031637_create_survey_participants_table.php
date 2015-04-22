<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyParticipantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survey_participants', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->string('name');     //  Name is required with Guest as default.
            $table->string('email');    // optional in case it is not a site member, otherwise copy from User->email
            $table->string('street1');  // optional
            $table->string('street2');  // optional
            $table->string('city');     // optional
            $table->string('state');    // optional
            $table->string('postcode'); // optional
            $table->string('phone');    // optional
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('survey_participants');
	}

}
