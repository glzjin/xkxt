<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScore extends Migration
{
    public function up()
    {
        Schema::table('logs', function (Blueprint $table) {
            $table->decimal('score', 3, 2);
        });
    }
}
