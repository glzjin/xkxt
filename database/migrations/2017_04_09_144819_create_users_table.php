<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->text('username');
			$table->text('password');
			$table->integer('role');
			$table->text('real_name');
			$table->rememberToken();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
