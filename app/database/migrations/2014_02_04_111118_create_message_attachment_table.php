<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageAttachmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messageAttachments', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('message_id');
                        $table->string('attachment_name');
                        $table->string('attachment_path');
                        $table->string('attachment_mime');
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
		Schema::drop('messageAttachments');
	}

}