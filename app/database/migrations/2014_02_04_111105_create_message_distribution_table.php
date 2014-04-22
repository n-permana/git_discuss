<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageDistributionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messageDistributions', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('message_id');
                        $table->integer('message_to');
                        $table->integer('message_placed');
                        $table->boolean('is_read');
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
		Schema::drop('messageDistributions');
	}

}