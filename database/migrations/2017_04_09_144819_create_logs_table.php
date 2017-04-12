<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogsTable extends Migration {

	public function up()
	{
		Schema::create('logs', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('student_user_id');
			$table->integer('course_id');
			$table->timestamp('timestamp');
		});
	}

	public function down()
	{
		Schema::drop('logs');
	}
}