<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_locations', function (Blueprint $table) {
            $table->id();
            $table->string('home_address')->nullable();;
            $table->string('home_location')->nullable();
            $table->string('home_latitude')->nullable();;
            $table->string('home_longitude')->nullable();;
            $table->string('office_address')->nullable();;
            $table->string('office_location')->nullable();
            $table->string('office_latitude')->nullable();;
            $table->string('office_longitude')->nullable();;
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_locations');
    }
}
