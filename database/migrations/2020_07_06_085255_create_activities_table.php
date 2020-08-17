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
            $table->string('from_address');
            $table->string('from_location')->nullable();
            $table->string('from_latitude');
            $table->string('from_longitude');
            $table->string('from_image')->nullable();

            $table->string('to_address');
            $table->string('to_location')->nullable();
            $table->string('to_latitude');
            $table->string('to_longitude');
            $table->string('to_image')->nullable();
            
            $table->dateTime('start_date', 0);
            $table->dateTime('end_date', 0);
            
            $table->softDeletes();
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
        Schema::table('activities', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
