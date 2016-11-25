<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->time('start_rest');
            $table->time('end_rest');
            $table->text('comment');
            $table->string('time_rest');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->unique();
            $table->integer('day_id')->unsigned();
            $table->foreign('day_id')->references('id')->on('day')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
