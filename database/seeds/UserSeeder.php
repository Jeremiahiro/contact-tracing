<?php

use App\User;
use App\Activity;
use App\UserLocation;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'uuid' => substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0),
        //     'name' => 'Super Admin',
        //     'email' => 'admin@admin.com',
        //     'username' => '@admin',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'phone' => '+2348136478020',
        //     'role' => 'super admin'
        // ]);

        // UserLocation::create([
        //     'user_id' => '1'
        // ]);

        // User::create([
        //     'uuid' => substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0),
        //     'name' => 'Daniel Eche',
        //     'email' => 'daniel@eche.com',
        //     'username' => '@daniel',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        //     'phone' => '+2348136478020',
        //     'role' => 'admin'
        // ]);

        // UserLocation::create([
        //     'user_id' => '2'
        // ]);

        factory(App\User::class, 50)->create();
        // factory(App\Activity::class, 50)->create();
    }
}
