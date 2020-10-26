<?php

use App\Model\SplashImage;
use Illuminate\Database\Seeder;

class SplashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SplashImage::create([
            'splash_image'  => 'https://res.cloudinary.com/iro/image/upload/v1602500690/SOP_Pictures/location.jpg',
            'type'          => 'location',
            'description'   => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum voluptas omnis illo labore, asperiores quo dolorum reiciendis aperiam blanditiis animi',
            'status'        => 1,
        ]);
        SplashImage::create([
            'splash_image'  => 'https://res.cloudinary.com/iro/image/upload/v1602500662/SOP_Pictures/contact.jpg',
            'type'          => 'contact',
            'description'   => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum voluptas omnis illo labore, asperiores quo dolorum reiciendis aperiam blanditiis animi',
            'status'        => 1,
        ]);
        SplashImage::create([
            'splash_image'  => 'https://res.cloudinary.com/iro/image/upload/v1602500709/SOP_Pictures/support.jpg',
            'type'          => 'support',
            'description'   => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum voluptas omnis illo labore, asperiores quo dolorum reiciendis aperiam blanditiis animi',
            'status'        => 1,
        ]);
    }
}
