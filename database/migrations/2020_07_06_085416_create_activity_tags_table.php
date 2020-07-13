<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('person_id')->nullable();
            $table->string('avatar')->default('https://res.cloudinary.com/iro/image/upload/v1581499532/Profile_Pictures/wzoe4az0cg6lm7idfocb.png');
            $table->timestamps();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('activity_id')->constrained('activities');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_tags');
    }
}
