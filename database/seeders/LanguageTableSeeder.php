<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::truncate();

        $languages =  [
            [
              'name' => 'English',
              'image' => 'English.png',
            ],
            [
              'name' => 'عرب؛ عربيّc',
              'image' => 'Arabic.png',
            ],
            [
              'name' => '한국어',
              'image' => 'Korean.png',
            ],
            [
              'name' => 'Pусский',
              'image' => 'Russian.png',
            ],
            [
              'name' => 'Français',
              'image' => 'France.png',
            ],
            [
              'name' => 'Español',
              'image' => 'Spanish.png',
            ],
            [
              'name' => 'ภาษาไทย',
              'image' => 'Thai.png',
            ],
            [
              'name' => '日本語',
              'image' => 'Japanese.png',
            ],
            [
              'name' => 'Português',
              'image' => 'Brazilian.png',
            ],
            [
              'name' => '中文(简体)',
              'image' => 'Chinese.png',
            ],
            [
              'name' => 'Italiano',
              'image' => 'Italian.png',
            ],
            [
              'name' => 'Türkçe',
              'image' => 'Turkish.png',
            ],
            [
              'name' => 'Deutsch',
              'image' => 'German.png',
            ],
            [
              'name' => '中文(繁體)',
              'image' => 'tw.png',
            ],
          ];

          Language::insert($languages);

    }
}
