<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ActivityTags;
use Faker\Generator as Faker;

$factory->define(ActivityTags::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'avatar' => $faker->imageUrl($width = 300, $height = 300, 'cats', true, 'Faker'),
        
        'user_id' => $faker->numberBetween($min = 1, $max = 2),
        'activity_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});
