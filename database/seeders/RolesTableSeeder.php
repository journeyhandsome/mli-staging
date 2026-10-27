<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        $roles =  [
            [
              'name' => 'Admin'
            ],
            [
              'name' => 'User',
            ]
          ];

          Role::insert($roles);
    }
}
