<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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
        'name' => 'Jeremiah Iro',
        'email' => 'jeremiah@iro.com',
        'username' => 'jeremiahiro',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'phone' => '+2348136478020',
        'latitude' => $faker->Address->latitude,
        'longitude' => $faker->Address->longitude,
        'location' => $faker->Address->street_name,
        'uuid' => substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0),
    ];
});
