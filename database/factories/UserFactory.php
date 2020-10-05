<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\User;
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
        'gender' => $faker->randomElement(['Male', 'Female']),
        'phone' => $faker->phoneNumber,
        'age_range' => $faker->randomElement(['18 - 20 Years', '21 - 23 Years', '24 - 30 Years']),
        'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
    ];
});



