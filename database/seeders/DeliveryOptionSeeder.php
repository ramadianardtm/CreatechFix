<?php

namespace Database\Seeders;

use App\Models\DeliveryOptions;
use Illuminate\Database\Seeder;

class DeliveryOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new DeliveryOptions();
        $cat->name = 'JNE';
        $cat->save();

        $cat = new DeliveryOptions();
        $cat->name = 'DHL';
        $cat->save();

        $cat = new DeliveryOptions();
        $cat->name = 'GrabSend';
        $cat->save();
    }
}
