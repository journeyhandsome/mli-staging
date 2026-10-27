<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GenerateRoute;
use App\Models\Testimonial;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::truncate();

        $testimonials =  [
        //1st testimonial
            [
                'image' => '1628060810-mathieu.jpg',
                'nationality_id' => '4',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //2nd testimonial    
            [
                'image' => '1628061377-maria.jpg',
                'nationality_id' => '13',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //3rd testimonial    
            [
                'image' => '1628063174-kaito-1.jpg',
                'nationality_id' => '7',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //4th testimonial    
            [
                'image' => '1628063831-mohammed.jpg',
                'nationality_id' => '1',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //5th testimonial    
            [
                'image' => '1628066080-aayush.jpg',
                'nationality_id' => '13',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //6th testimonial    
            [
                'image' => '1628066349-julia.jpg',
                'nationality_id' => '13',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //7th testimonial    
            [
                'image' => '1628066610-johanna.jpg',
                'nationality_id' => '13',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //8th testimonial    
            [
                'image' => '1628067192-polina.jpg',
                'nationality_id' => '13',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //9th testimonial    
            [
                'image' => '1628068497-nanami.jpg',
                'nationality_id' => '7',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //10th testimonial    
            [
                'image' => '1628069001-vaclav.jpg',
                'nationality_id' => '13',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //11th testimonial    
            [
                'image' => '1628069853-tanice.jpg',
                'nationality_id' => '8',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //12th testimonial    
            [
                'image' => '1628070274-mertcan-1.jpg',
                'nationality_id' => '9',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //13th testimonial    
            [
                'image' => '1628070618-miki2.jpg',
                'nationality_id' => '9',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //14th testimonial    
            [
                'image' => '1628124330-yukari.jpg',
                'nationality_id' => '9',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //15th testimonial    
            [
                'image' => '1628124992-giovanna.jpg',
                'nationality_id' => '10',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //16th testimonial    
            [
                'image' => '1628125406-cindy.jpg',
                'nationality_id' => '8',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //17th testimonial    
            [
                'image' => '1628126940-chintan.jpg',
                'nationality_id' => '13',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //18th testimonial    
            [
                'image' => '1628127256-haruka.jpg',
                'nationality_id' => '7',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //19th testimonial    
            [
                'image' => '1628127696-alejandra.jpg',
                'nationality_id' => '5',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //20th testimonial    
            [
                'image' => '1628128170-adbulmajeed.jpg',
                'nationality_id' => '1',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //21st testimonial    
            [
                'image' => '1628128541-lisa.jpg',
                'nationality_id' => '13',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //22nd testimonial    
            [
                'image' => '1628132309-bruno.jpg',
                'nationality_id' => '8',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //23rd testimonial    
            [
                'image' => '1628132640-denis.jpg',
                'nationality_id' => '3',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //24th testimonial    
            [
                'image' => '1628133568-touda.jpg',
                'nationality_id' => '13',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //25th testimonial    
            [
                'image' => '1628133870-hinata.jpg',
                'nationality_id' => '7',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //26th testimonial    
            [
                'image' => '1628134197-shoi.jpg',
                'nationality_id' => '7',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //27th testimonial    
            [
                'image' => '1628134450-sara.jpg',
                'nationality_id' => '5',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //28th testimonial    
            [
                'image' => '1628134661-ella.jpg',
                'nationality_id' => '13',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //29th testimonial    
            [
                'image' => '1628134935-Kaisei.jpg',
                'nationality_id' => '7',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //30th testimonial    
            [
                'image' => '1628139214-Miharu.jpg',
                'nationality_id' => '7',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //31st testimonial    
            [
                'image' => '1628140951-Momoka.jpg',
                'nationality_id' => '7',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //32nd testimonial    
            [
                'image' => '1628142750-Sandrine.jpg',
                'nationality_id' => '4',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //33rd testimonial    
            [
                'image' => '1628144657-Esther.jpg',
                'nationality_id' => '2',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //34th testimonial    
            [
                'image' => '1628144869-Lola.jpg',
                'nationality_id' => '4',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //35th testimonial    
            [
                'image' => '1628145375-Miki.jpg',
                'nationality_id' => '7',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //36th testimonial    
            [
                'image' => '1628145767-Vanesa.jpg',
                'nationality_id' => '13',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //37th testimonial    
            [
                'image' => '1628146224-Miki3.jpg',
                'nationality_id' => '7',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //38th testimonial    
            [
                'image' => '1628146419-Anastasiia.jpg',
                'nationality_id' => '3',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //39th testimonial    
            [
                'image' => '1628146649-marina.jpg',
                'nationality_id' => '7',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //40th testimonial    
            [
                'image' => '1628146867-Sofia.jpg',
                'nationality_id' => '3',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //41st testimonial    
            [
                'image' => '1628147114-Oguz.jpg',
                'nationality_id' => '13',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //42nd testimonial    
            [
                'image' => '1628147349-Emily.jpg',
                'nationality_id' => '9',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //43rd testimonial    
            [
                'image' => '1628147734-Fumiya.jpg',
                'nationality_id' => '7',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //44th testimonial    
            [
                'image' => '1628148128-Martin.jpg',
                'nationality_id' => '13',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //45th testimonial    
            [
                'image' => '1628148669-Victor.jpg',
                'nationality_id' => '8',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //46th testimonial    
            [
                'image' => '1628148897-hani.jpg',
                'nationality_id' => '1',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //47th testimonial    
            [
                'image' => '1628149121-Maria2.jpg',
                'nationality_id' => '13',
                'campus_id' => '1',
                'user_id' => '1',
                'is_active' => '1',
            ],
        //48th testimonial    
            [
                'image' => '1628149365-Saori.jpg',
                'nationality_id' => '7',
                'campus_id' => '2',
                'user_id' => '1',
                'is_active' => '1',
            ],
          ];

          Testimonial::insert($testimonials);


          /**
           * Need to insert routes for the testimonial manually
           */

        $generateRoute =  [
            [
                'link' => '1628060810-mathieu',
            ],
            [
                'link' => '1628061377-maria',
            ],
            [
                'link' => '1628063174-kaito-1',
            ],
            [
                'link' => '1628063831-mohammed',
            ],
            [
                'link' => '1628066080-aayush',
            ],
            [
                'link' => '1628066349-julia',
            ],
            [
                'link' => '1628066610-johanna',
            ],
            [
                'link' => '1628067192-polina',
            ],
            [
                'link' => '1628068497-nanami',
            ],
            [
                'link' => '1628069001-vaclav',
            ],
            [
                'link' => '1628069853-tanice',
            ],
            [
                'link' => '1628070274-mertcan-1',
            ],
            [
                'link' => '1628070618-miki2',
            ],
            [
                'link' => '1628124330-yukari',
            ],
            [
                'link' => '1628124992-giovanna',
            ],
            [
                'link' => '1628125406-cindy',
            ],
            [
                'link' => '1628126940-chintan',
            ],
            [
                'link' => '1628127256-haruka',
            ],
            [
                'link' => '1628127696-alejandra',
            ],
            [
                'link' => '1628128170-adbulmajeed',
            ],
            [
                'link' => '1628128541-lisa',
            ],
            [
                'link' => '1628132309-bruno',
            ],
            [
                'link' => '1628132640-denis'
            ],
            [
                'link' => '1628133568-touda',
            ],
            [
                'link' => '1628133870-hinata',
            ],
            [
                'link' => '1628134197-shoi',
            ],
            [
                'link' => '1628134450-sara',
            ],
            [
                'link' => '1628134661-ella',
            ],
            [
                'link' => '1628134935-Kaisei',
            ],
            [
                'link' => '1628139214-Miharu',
            ],
            [
                'link' => '1628140951-Momoka',
            ],
            [
                'link' => '1628142750-Sandrine',
            ],
            [
                'link' => '1628144657-Esther',
            ],
            [
                'link' => '1628144869-Lola',
            ],
            [
                'link' => '1628145375-Miki',
            ],
            [
                'link' => '1628145767-Vanesa',
            ],
            [
                'link' => '1628146224-Miki3',
            ],
            [
                'link' => '1628146419-Anastasiia',
            ],
            [
                'link' => '1628146649-marina',
            ],
            [
                'link' => '1628146867-Sofia',
            ],
            [
                'link' => '1628147114-Oguz',
            ],
            [
                'link' => '1628147349-Emily',
            ],
            [
                'link' => '1628147734-Fumiya',
            ],
            [
                'link' => '1628148128-Martin',
            ],
            [
                'link' => '1628148669-Victor',
            ],
            [
                'link' => '1628148897-hani',
            ],
            [
                'link' => '1628149121-Maria2',
            ],
            [
                'link' => '1628149365-Saori',
            ],
        ];

        $language = [
            '/ar/',
            '/ch/',
            '/de/',
            '/en/',
            '/fr/',
            '/it/',
            '/jp/',
            '/kr/',
            '/por/',
            '/ru/',
            '/sp/',
            '/th/',
            '/tr/',
            '/tw/'
        ];

        foreach($generateRoute as $genRoute) {
            foreach($language as $lang) {
                $link = $lang . $genRoute['link'];

                GenerateRoute::insert(array(
                    "link" => $link
                ));
            }
        }
    }
}
