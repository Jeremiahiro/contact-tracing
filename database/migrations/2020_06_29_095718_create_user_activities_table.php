<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('from_location');
            $table->string('from_latitude');
            $table->string('from_longitude');
            $table->string('to_location');
            $table->string('to_latitude');
            $table->string('to_longitude');
            $table->dateTime('start_date', 0);
            $table->dateTime('end_date', 0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_activities');
    }
}
