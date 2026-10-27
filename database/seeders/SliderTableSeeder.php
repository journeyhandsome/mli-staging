<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Slider::truncate();

        
        $sliders =  [
            //English
            [
                'order' => '1',
                'path' => '1628055663-banner 1.jpg',
                'language_id' => '1',
                'link' => '#',
            ],
            [
                'order' => '2',
                'path' => '1628056806-banner 2.jpg',
                'language_id' => '1',
                'link' => '/material',
            ],
            [
                'order' => '3',
                'path' => '1628056834-banner 3.jpg',
                'language_id' => '1',
                'link' => '/material',
            ],
            [
                'order' => '4',
                'path' => '1628056849-banner 4.jpg',
                'language_id' => '1',
                'link' => '/material',
            ],

            //Arabic
            [
                'order' => '1',
                'path' => '1628056906-banner 1.jpg',
                'language_id' => '2',
                'link' => '#',
            ],
            [
                'order' => '2',
                'path' => '1628056920-banner 2.jpg',
                'language_id' => '2',
                'link' => '/ar/material',
            ],
            [
                'order' => '3',
                'path' => '1628056942-banner 3.jpg',
                'language_id' => '2',
                'link' => '/ar/material',
            ],
            [
                'order' => '4',
                'path' => '1628056978-banner 4.jpg',
                'language_id' => '2',
                'link' => '/ar/material',
            ],
            //Korean
            [
                'order' => '1',
                'path' => '1628057080-1.jpg',
                'language_id' => '3',
                'link' => '#',
            ],
            [
                'order' => '2',
                'path' => '1628057105-2.jpg',
                'language_id' => '3',
                'link' => '/kr/material',
            ],
            [
                'order' => '3',
                'path' => '1628057132-3.jpg',
                'language_id' => '3',
                'link' => '/kr/material',
            ],
            [
                'order' => '4',
                'path' => '1628057161-4.jpg',
                'language_id' => '3',
                'link' => '/kr/material',
            ],
            //Russian
            [
                'order' => '1',
                'path' => '1628057248-banner 1.jpg',
                'language_id' => '4',
                'link' => '#',
            ],
            [
                'order' => '2',
                'path' => '1628057264-banner 2.jpg',
                'language_id' => '4',
                'link' => '/ru/material',
            ],
            [
                'order' => '3',
                'path' => '1628057294-banner 3.jpg',
                'language_id' => '4',
                'link' => '/ru/material',
            ],
            [
                'order' => '4',
                'path' => '1628057322-banner 4.jpg',
                'language_id' => '4',
                'link' => '/ru/material',
            ],
            //French
            [
                'order' => '1',
                'path' => '1628057365-banner 1.jpg',
                'language_id' => '5',
                'link' => '#',
            ],
            [
                'order' => '2',
                'path' => '1628057392-banner 2.jpg',
                'language_id' => '5',
                'link' => '/fr/material',
            ],
            [
                'order' => '3',
                'path' => '1628057409-banner 3.jpg',
                'language_id' => '5',
                'link' => '/fr/material',
            ],
            [
                'order' => '4',
                'path' => '1628057454-banner 4.jpg',
                'language_id' => '5',
                'link' => '/fr/material',
            ],
            //Spanish
            [
                'order' => '1',
                'path' => '1628057549-banner 1.jpg',
                'language_id' => '6',
                'link' => '#',
            ],
            [
                'order' => '2',
                'path' => '1628057568-banner 2.jpg',
                'language_id' => '6',
                'link' => '/sp/material',
            ],
            [
                'order' => '3',
                'path' => '1628057587-banner 3.jpg',
                'language_id' => '6',
                'link' => '/sp/material',
            ],
            [
                'order' => '4',
                'path' => '1628057609-banner 4.jpg',
                'language_id' => '6',
                'link' => '/sp/material',
            ],
            //Thai
            [
                'order' => '1',
                'path' => '1628057800-banner 1.jpg',
                'language_id' => '7',
                'link' => '#',
            ],
            [
                'order' => '2',
                'path' => '1628057818-banner 2.jpg',
                'language_id' => '7',
                'link' => '/th/material',
            ],
            [
                'order' => '3',
                'path' => '1628058078-banner 3.jpg',
                'language_id' => '7',
                'link' => '/th/material',
            ],
            [
                'order' => '4',
                'path' => '1628058096-banner 4.jpg',
                'language_id' => '7',
                'link' => '/th/material',
            ],
            //Japanese
            [
                'order' => '1',
                'path' => '1628058113-banner 1.jpg',
                'language_id' => '8',
                'link' => '#',
            ],
            [
                'order' => '2',
                'path' => '1628058137-banner 2.jpg',
                'language_id' => '8',
                'link' => '/jp/material',
            ],
            [
                'order' => '3',
                'path' => '1628059413-banner 3.jpg',
                'language_id' => '8',
                'link' => '/jp/material',
            ],
            [
                'order' => '4',
                'path' => '1628059430-banner 4.jpg',
                'language_id' => '8',
                'link' => '/jp/material',
            ],
            //Portugues
            [
                'order' => '1',
                'path' => '1628059542-banner 1.jpg',
                'language_id' => '9',
                'link' => '#',
            ],
            [
                'order' => '2',
                'path' => '1628059574-banner 2.jpg',
                'language_id' => '9',
                'link' => '/por/material',
            ],
            [
                'order' => '3',
                'path' => '1628059598-banner 3.jpg',
                'language_id' => '9',
                'link' => '/por/material',
            ],
            [
                'order' => '4',
                'path' => '1628059624-banner 4.jpg',
                'language_id' => '9',
                'link' => '/por/material',
            ],
            //Chinese
            [
                'order' => '1',
                'path' => '1628059662-banner 1.jpg',
                'language_id' => '10',
                'link' => '#',
            ],
            [
                'order' => '2',
                'path' => '1628059678-banner 2.jpg',
                'language_id' => '10',
                'link' => '/ch/material',
            ],
            [
                'order' => '3',
                'path' => '1628059700-banner 3.jpg',
                'language_id' => '10',
                'link' => '/ch/material',
            ],
            [
                'order' => '4',
                'path' => '1628059729-banner 4.jpg',
                'language_id' => '10',
                'link' => '/ch/material',
            ],
            //Italian
            [
                'order' => '1',
                'path' => '1628059749-banner 1.jpg',
                'language_id' => '11',
                'link' => '#',
            ],
            [
                'order' => '2',
                'path' => '1628059766-banner 2.jpg',
                'language_id' => '11',
                'link' => '/it/material',
            ],
            [
                'order' => '3',
                'path' => '1628059791-banner 3.jpg',
                'language_id' => '11',
                'link' => '/it/material',
            ],
            [
                'order' => '4',
                'path' => '1628059809-banner 4.jpg',
                'language_id' => '11',
                'link' => '/it/material',
            ],
            //Turkish
            [
                'order' => '1',
                'path' => '1628059832-banner 1.jpg',
                'language_id' => '12',
                'link' => '#',
            ],
            [
                'order' => '2',
                'path' => '1628059855-banner 2.jpg',
                'language_id' => '12',
                'link' => '/tr/material',
            ],
            [
                'order' => '3',
                'path' => '1628059882-banner 3.jpg',
                'language_id' => '12',
                'link' => '/tr/material',
            ],
            [
                'order' => '4',
                'path' => '1628059906-banner 4.jpg',
                'language_id' => '12',
                'link' => '/tr/material',
            ],
            //Deutsch
            [
                'order' => '1',
                'path' => '1628059943-banner 1.jpg',
                'language_id' => '13',
                'link' => '#',
            ],
            [
                'order' => '2',
                'path' => '1628059962-banner 2.jpg',
                'language_id' => '13',
                'link' => '/de/material',
            ],
            [
                'order' => '3',
                'path' => '1628059980-banner 3.jpg',
                'language_id' => '13',
                'link' => '/de/material',
            ],
            [
                'order' => '4',
                'path' => '1628060018-banner 4.jpg',
                'language_id' => '13',
                'link' => '/de/material',
            ],
            //Taiwanese
            [
                'order' => '1',
                'path' => '1628060048-banner 1.jpg',
                'language_id' => '14',
                'link' => '#',
            ],
            [
                'order' => '2',
                'path' => '1628060063-banner 2.jpg',
                'language_id' => '14',
                'link' => '/tw/material',
            ],
            [
                'order' => '3',
                'path' => '1628060086-banner 3.jpg',
                'language_id' => '14',
                'link' => '/tw/material',
            ],
            [
                'order' => '4',
                'path' => '1628060102-banner 4.jpg',
                'language_id' => '14',
                'link' => '/tw/material',
            ],
        ];
        
        Slider::insert($sliders);
    }
}
