<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prod = new Product();
        $prod->name = 'Smart Tv';
        $prod->description = 'Lorem ipsum dolor sit amet. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $prod->price = 3500000;
        $prod->stock = 54;
        $prod->image = 'smarttv.png';
        $prod->category_id = 1;
        $prod->save();

        $prod = new Product();
        $prod->name = 'CCTV';
        $prod->description = 'Lorem ipsum dolor sit amet. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $prod->price = 1500000;
        $prod->stock = 54;
        $prod->image ='cctv.png';
        $prod->category_id = 1;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Smart Humidifier';
        $prod->description = 'Lorem ipsum dolor sit amet. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $prod->price = 600000;
        $prod->stock = 54;
        $prod->image = 'humidifier.png';
        $prod->category_id = 1;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Smart Lamp';
        $prod->description = 'Lorem ipsum dolor sit amet. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $prod->price = 400000;
        $prod->stock = 54;
        $prod->image = 'smartlamp.png';
        $prod->category_id = 1;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Smart AC';
        $prod->description = 'Lorem ipsum dolor sit amet. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $prod->price = 5000000;
        $prod->stock = 54;
        $prod->image = 'smartac.png';
        $prod->category_id = 1;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Robot Cleaner';
        $prod->description = 'Lorem ipsum dolor sit amet. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $prod->price = 2000000;
        $prod->stock = 54;
        $prod->image = 'vacuumcleaner.png';
        $prod->category_id = 3;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Smart Watch';
        $prod->description = 'Lorem ipsum dolor sit amet. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $prod->price = 1500000;
        $prod->stock = 54;
        $prod->image = 'watch.png';
        $prod->category_id = 3;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Smart Irrigation';
        $prod->description = 'Lorem ipsum dolor sit amet. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $prod->price = 3500000;
        $prod->stock = 54;
        $prod->image = 'smartirrigation.png';
        $prod->category_id = 2;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Water Heater';
        $prod->description = 'Lorem ipsum dolor sit amet. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $prod->price = 2000000;
        $prod->stock = 54;
        $prod->image = 'waterheater.png';
        $prod->category_id = 3;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Smart Home Control';
        $prod->description = 'Lorem ipsum dolor sit amet. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $prod->price = 3000000;
        $prod->stock = 54;
        $prod->image = 'smarthomecontrol.png';
        $prod->category_id = 1;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Smart Dush Bin';
        $prod->description = 'Lorem ipsum dolor sit amet. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $prod->price = 700000;
        $prod->stock = 54;
        $prod->image = 'smartdushbin.png';
        $prod->category_id = 3;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Smart LCD Projector';
        $prod->description = 'Lorem ipsum dolor sit amet. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $prod->price = 700000;
        $prod->stock = 54;
        $prod->image = 'smartprj.png';
        $prod->category_id = 3;
        $prod->save();

        $prod = new Product();
        $prod->name = 'Wireless Router';
        $prod->description = 'Lorem ipsum dolor sit amet. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $prod->price = 500000;
        $prod->stock = 54;
        $prod->image = 'smartrouter.png';
        $prod->category_id = 3;
        $prod->save();
    }
}
