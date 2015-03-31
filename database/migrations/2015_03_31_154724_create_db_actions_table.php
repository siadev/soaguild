<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbActionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('db_actions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->timestamp('fetch_feed');
            $table->timestamp('fetch_guild_report');
            $table->timestamp('fetch_members');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('db_actions');
	}

}
