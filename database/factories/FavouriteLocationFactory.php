<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FavouriteLocation;
use Faker\Generator as Faker;

$factory->define(FavouriteLocation::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 2),
        'location_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});
