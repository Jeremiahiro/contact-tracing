<?php

use App\ActivityTags;
use Illuminate\Database\Seeder;

class ActivityTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ActivityTags::class, 80)->create();
    }
}
