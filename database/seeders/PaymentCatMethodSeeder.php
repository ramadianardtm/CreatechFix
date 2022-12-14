<?php

namespace Database\Seeders;

use App\Models\PaymentCatMethod;
use Illuminate\Database\Seeder;

class PaymentCatMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new PaymentCatMethod();
        $cat->name = 'Bank BCA';
        $cat->recipient = 'Ramadian Arditama';
        $cat->account = '603039102';
        $cat->save();
        
        $cat = new PaymentCatMethod();
        $cat->name = 'Bank BRI';
        $cat->recipient = 'Rizky Ramadhan';
        $cat->account = '10203910';
        $cat->save();
    }
}
