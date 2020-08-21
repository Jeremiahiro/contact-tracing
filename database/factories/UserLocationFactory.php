<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserLocation;
use Faker\Generator as Faker;

$factory->define(UserLocation::class, function (Faker $faker) {
    return [
        'home_address' => $faker->address,
        'home_location' => $faker->streetAddress,
        'home_latitude' => $faker->latitude($min = -4, $max = 7),
        'home_longitude' => $faker->longitude($min = -8, $max = 14),

        'office_address' => $faker->address,
        'office_location' => $faker->streetAddress,
        'office_latitude' => $faker->latitude($min = -8, $max = 7),
        'office_longitude' => $faker->longitude($min = -4, $max = 14),

        'user_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});
