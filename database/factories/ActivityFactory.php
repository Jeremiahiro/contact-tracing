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
        'from_latitude' => $faker->latitude($min = -90, $max = 90),
        'from_longitude' => $faker->longitude($min = -180, $max = 180),
        'from_location' => $faker->streetAddress,
        
        'to_address' => $faker->address,
        'to_latitude' => $faker->latitude($min = -70, $max = 70),
        'to_longitude' => $faker->longitude($min = -140, $max = 140),
        'to_location' => $faker->streetAddress,

        'start_date' => $faker->dateTimeBetween('now'),
        'end_date' => $faker->dateTimeBetween('now', '+1 day'),

        'user_id' => '1'

    ];
});
