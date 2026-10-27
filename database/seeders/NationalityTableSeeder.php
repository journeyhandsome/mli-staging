<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nationality;

class NationalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nationality::truncate();

        $nationalities =  [
            [
              'name' => 'Arabic',
              'image' => 'Arabic.png',
            ],
            [
              'name' => 'Korean',
              'image' => 'Korean.png',
            ],
            [
              'name' => 'Russian',
              'image' => 'Russian.png',
            ],
            [
              'name' => 'France',
              'image' => 'France.png',
            ],
            [
              'name' => 'Spanish',
              'image' => 'Spanish.png',
            ],
            [
              'name' => 'Thai',
              'image' => 'Thai.png',
            ],
            [
              'name' => 'Japanese',
              'image' => 'Japanese.png',
            ],
            [
              'name' => 'Brazilian',
              'image' => 'Brazilian.png',
            ],
            [
              'name' => 'Chinese',
              'image' => 'Chinese.png',
            ],
            [
              'name' => 'Italian',
              'image' => 'Italian.png',
            ],
            [
              'name' => 'Turkish',
              'image' => 'Turkish.png',
            ],
            [
              'name' => 'German',
              'image' => 'German.png',
            ],
            [
              'name' => 'Other Nationalities',
              'image' => 'other.png',
            ],
          ];

          Nationality::insert($nationalities);
    }
}
