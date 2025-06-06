<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::factory(10)->create();
        // Dummy data
        Item::create([
            'product_name' => 'Laptop ASUS',
            'category' => 'elektronik',
            'tags' => 'baru, murah, gaming',
            'description' => 'Laptop ASUS ROG terbaru untuk kebutuhan gaming Anda.',
            'city' => 'Jakarta',
            'condition' => 'baru',
            'latitude' => -6.2088,
            'longitude' => 106.8456,
            'user_id' => 1,
        ]);

        Item::create([
            'product_name' => 'Kaos Polos',
            'category' => 'fashion',
            'tags' => 'murah, nyaman, kasual',
            'description' => 'Kaos polos berkualitas tinggi, nyaman digunakan sehari-hari.',
            'city' => 'Bandung',
            'condition' => 'baru',
            'latitude' => -6.9147,
            'longitude' => 107.6098,
            'user_id' => 1,
        ]);
    }
}
