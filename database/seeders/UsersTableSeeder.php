<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $users =  [
            [
              'name' => 'Super Admin',
              'email' => 'kredodev.jeneline@gmail.com',
              'password' => Hash::make('password'),
              'role' => 'admin'
            ]
          ];

          User::insert($users);
    }
}
