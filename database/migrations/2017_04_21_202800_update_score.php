<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateScore extends Migration
{
    public function up()
    {
        Schema::table('logs', function (Blueprint $table) {
            $table->decimal('score', 5, 2)->default('0.00')->change();
        });
    }
}
