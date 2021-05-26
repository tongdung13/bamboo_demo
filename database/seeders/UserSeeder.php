<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->userName = 'tongvanthienvu@gmail.com';
        $user->password = Hash::make('10tongdung10');
        $user->level = 'Admin';
        $user->save();

    }
}
