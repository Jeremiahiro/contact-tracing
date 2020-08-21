<?php

use App\UserLocation;
use Illuminate\Database\Seeder;

class UserLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserLocation::create([
            'user_id' => '1'
        ]);

        UserLocation::create([
            'user_id' => '2'
        ]);
        
        factory(UserLocation::class, 50)->create();
    }
}
