<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	public function up()
	{
		Schema::create('courses', function(Blueprint $table) {
			$table->increments('id');
			$table->text('course_name');
			$table->integer('limit_number');
			$table->text('course_description');
			$table->integer('course_owner_user_id');
		});
	}

	public function down()
	{
		Schema::drop('courses');
	}
}