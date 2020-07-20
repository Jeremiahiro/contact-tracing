<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('from_location');
            $table->string('from_latitude');
            $table->string('from_longitude');
            $table->string('to_location');
            $table->string('to_latitude');
            $table->string('to_longitude');
            $table->dateTime('start_date', 0);
            $table->dateTime('end_date', 0);
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
