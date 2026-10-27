<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campus;
class CampusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campus::truncate();

        $campuses =  [
            [
              'name' => 'Westwood Campus',
            ],
            [
              'name' => 'Hollywood Campus',
            ]
          ];

          Campus::insert($campuses);

    }
}
