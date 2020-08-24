<?php

use Illuminate\Database\Seeder;

class FavouriteLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FavouriteLocation::class, 5)->create();
    }
}
