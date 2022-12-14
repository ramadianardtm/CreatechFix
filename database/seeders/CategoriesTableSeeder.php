<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new Category();
        $cat->name = 'Smart Home';
        $cat->save();

        $cat = new Category();
        $cat->name = 'Factory';
        $cat->save();

        $cat = new Category();
        $cat->name = 'Daily';
        $cat->save();

        $cat = new Category();
        $cat->name = 'Custom';
        $cat->save();
    }
}
