<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Activity;
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
        'from_address' => $faker->address,
        'from_location' => $faker->streetAddress,
        'from_latitude' => $faker->latitude($min = -4, $max = 7),
        'from_longitude' => $faker->longitude($min = -8, $max = 14),
        
        'to_address' => $faker->address,
        'to_location' => $faker->streetAddress,
        'to_latitude' => $faker->latitude($min = -8, $max = 7),
        'to_longitude' => $faker->longitude($min = -4, $max = 14),

        'start_date' => $faker->dateTimeBetween('now'),
        'end_date' => $faker->dateTimeBetween('now', '+1 day'),

        'user_id' => $faker->numberBetween($min = 1, $max = 2),
    ];
});


