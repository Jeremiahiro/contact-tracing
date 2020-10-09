<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Location;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
        'country'   => $faker->country,
        'state'     => $faker->state,
        'city'      => $faker->city,
        'address'   => $faker->address,
        'street'    => $faker->streetAddress,
        'latitude'  => $faker->latitude($min = -4, $max = 7),
        'longitude' => $faker->longitude($min = -8, $max = 14),

        'image' => $faker->imageUrl($width = 300, $height = 300, 'cats', true, 'Faker'),

        'user_id' => $faker->numberBetween($min = 1, $max = 2),
    ];
});
