<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserLocation;
use Faker\Generator as Faker;

$factory->define(UserLocation::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'location' => $faker->streetAddress,
        'latitude' => $faker->latitude($min = -4, $max = 7),
        'longitude' => $faker->longitude($min = -8, $max = 14),
        'image' => $faker->imageUrl($width = 300, $height = 300, 'cats', true, 'Faker'),

        'user_id' => $faker->numberBetween($min = 1, $max = 2),
    ];
});
