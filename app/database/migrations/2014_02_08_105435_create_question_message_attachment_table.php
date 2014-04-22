<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionMessageAttachmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questionAttachments', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('question_id');
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
		Schema::drop('questionAttachments');
	}

}