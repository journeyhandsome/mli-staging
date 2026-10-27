<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Banner::truncate();

        $banners =  [
            [
                'path' => '1628502556-triple_zero_en.jpg',
                'language_id' => '1',
            ],
            [
                'path' => '1628502291-triple_zero_ar.jpg',
                'language_id' => '2',
            ],
            [
                'path' => '1628502303-triple_zero_kr.jpg',
                'language_id' => '3',
            ],
            [
                'path' => '1628502314-triple_zero_ru.jpg',
                'language_id' => '4',
            ],
            [
                'path' => '1628502331-triple_zero_fr.jpg',
                'language_id' => '5',
            ],
            [
                'path' => '1628502343-triple_zero_sp.jpg',
                'language_id' => '6',
            ],
            [
                'path' => '1628502353-triple_zero_th.jpg',
                'language_id' => '7',
            ],
            [
                'path' => '1628502363-triple_zero_jp.jpg',
                'language_id' => '8',
            ],
            [
                'path' => '1628502372-triple_zero_por.jpg',
                'language_id' => '9',
            ],
            [
                'path' => '1628502381-triple_zero_ch.jpg',
                'language_id' => '10',
            ],
            [
                'path' => '1628502391-triple_zero_it.jpg',
                'language_id' => '11',
            ],
            [
                'path' => '1628502404-triple_zero_tr.jpg',
                'language_id' => '12',
            ],
            [
                'path' => '1628502413-triple_zero_de.jpg',
                'language_id' => '13',
            ],
            [
                'path' => '1628502421-triple_zero_tw.jpg',
                'language_id' => '14',
            ],
          ];

          Banner::insert($banners);
    }
}
