<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SplashSeeder::class);
        // $this->call(ActivitySeeder::class);
        // $this->call(ActivityTagSeeder::class);
        // $this->call(LocationSeeder::class);
        // $this->call(FavouriteLocationSeeder::class);
    }
}
