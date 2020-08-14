<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\UserLocation;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'username' => '@'.$faker->username,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'uuid' => substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0),
    ];
});

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


