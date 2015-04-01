<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiFeedsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('api_feeds', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->string('type');
            $table->string('character');
            $table->dateTime('timestamp');
            $table->bigInteger('itemId');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('api_feeds');
	}

}
