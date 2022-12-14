<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->image = 'waterheater.png';
        $user->email = 'admin@ymail.com';
        $user->password = bcrypt('tokemtokem');
        $user->address = 'Jalan Raya Bogor';
        $user->phone = '089898989898';
        $user->role = 'admin';
        $user->save();

        $user = new User();
        $user->name = 'Kang Asyep';
        $user->image = 'waterheater.png';
        $user->email = 'user@ymail.com';
        $user->password = bcrypt('tokemtokem');
        $user->address = 'Jalan Raya Bogor 3';
        $user->phone = '08232028726';
        $user->role = 'member';
        $user->save();
    }
}
