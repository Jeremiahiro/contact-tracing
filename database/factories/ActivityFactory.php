<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Activity;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(Activity::class, function (Faker $faker) {
    return [
        'start_date' => $faker->dateTimeBetween('now'),
        'location_id' => $faker->numberBetween($min = 1, $max = 50),
        'user_id' => $faker->numberBetween($min = 1, $max = 2),
    ];
});


