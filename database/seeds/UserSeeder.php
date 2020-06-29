<?php

use App\User;
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
        User::create([
            'full_name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone' => '+2348136478020',
            'latitude' => 4.80077,
            'longitude' => 7.03580,
            'location' => 'Odili Road',
            'role' => '1'
        ]);
    }
}
