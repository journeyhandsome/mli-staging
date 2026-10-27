<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GenerateRoute;

class GenerateRouteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GenerateRoute::truncate();

        $generateRoute = [];
        $languages = [
            'ar',
            'ch',
            'de',
            'en',
            'fr',
            'it',
            'jp',
            'kr',
            'por',
            'ru',
            'sp',
            'th',
            'tr',
            'tw'
        ];

        //homepages
        $home = $this->generateArrayLinks($languages, '');
        $generateRoute = array_merge($generateRoute, $home);

        //testimonial
        $home = $this->generateArrayLinks($languages, 'testimonial');
        $generateRoute = array_merge($generateRoute, $home);

        //homepages
        $home = $this->generateArrayLinks($languages, 'faq-covid19');
        $generateRoute = array_merge($generateRoute, $home);

        //faq
        $home = $this->generateArrayLinks($languages, 'faq');
        $generateRoute = array_merge($generateRoute, $home);

        //admission
        $home = $this->generateArrayLinks($languages, 'admission');
        $generateRoute = array_merge($generateRoute, $home);

        //admission fail
        $home = $this->generateArrayLinks($languages, 'admission/fail');
        $generateRoute = array_merge($generateRoute, $home);

        //admission thanks
        $home = $this->generateArrayLinks($languages, 'admission/thanks');
        $generateRoute = array_merge($generateRoute, $home);

        //contact
        $home = $this->generateArrayLinks($languages, 'contact');
        $generateRoute = array_merge($generateRoute, $home);

        //contact thanks
        $home = $this->generateArrayLinks($languages, 'contact/thanks');
        $generateRoute = array_merge($generateRoute, $home);

        //health form
        $home = $this->generateArrayLinks($languages, 'health-form');
        $generateRoute = array_merge($generateRoute, $home);

        //freetrial
        $home = $this->generateArrayLinks($languages, 'freetrial');
        $generateRoute = array_merge($generateRoute, $home);

        //freetrial thanks
        $home = $this->generateArrayLinks($languages, 'freetrial/thanks');
        $generateRoute = array_merge($generateRoute, $home);

        //material
        $home = $this->generateArrayLinks($languages, 'material');
        $generateRoute = array_merge($generateRoute, $home);

        //material thanks
        $home = $this->generateArrayLinks($languages, 'material/thanks');
        $generateRoute = array_merge($generateRoute, $home);

        //how to apply / how to apply for a student visa
        $home = $this->generateArrayLinks($languages, 'how-to-apply-for-a-student-visa');
        $generateRoute = array_merge($generateRoute, $home);

        //how to apply / others
        $home = $this->generateArrayLinks($languages, 'how-to-apply/others');
        $generateRoute = array_merge($generateRoute, $home);

        //visa holder
        $home = $this->generateArrayLinks($languages, 'visaholder');
        $generateRoute = array_merge($generateRoute, $home);

        //how to apply / visa holder
        $home = $this->generateArrayLinks($languages, 'how-to-apply/visaholder');
        $generateRoute = array_merge($generateRoute, $home);

        //how to apply / have visa
        $home = $this->generateArrayLinks($languages, 'how-to-apply/havevisa');
        $generateRoute = array_merge($generateRoute, $home);

        //how to apply / short
        $home = $this->generateArrayLinks($languages, 'how-to-apply/short');
        $generateRoute = array_merge($generateRoute, $home);

        //how to apply / transfer
        $home = $this->generateArrayLinks($languages, 'how-to-apply/transfer');
        $generateRoute = array_merge($generateRoute, $home);

        //how to apply / overseas
        $home = $this->generateArrayLinks($languages, 'how-to-apply/overseas');
        $generateRoute = array_merge($generateRoute, $home);

        //how to apply / visa overseas
        $home = $this->generateArrayLinks($languages, 'how-to-apply/visa_overseas');
        $generateRoute = array_merge($generateRoute, $home);

        //how to apply / change of status
        $home = $this->generateArrayLinks($languages, 'how-to-apply/change-of-status');
        $generateRoute = array_merge($generateRoute, $home);

        //how to apply / nonf1
        $home = $this->generateArrayLinks($languages, 'how-to-apply/nonf1');
        $generateRoute = array_merge($generateRoute, $home);

        //how to apply / student visa f1
        $home = $this->generateArrayLinks($languages, 'how-to-apply/student-visa-f1');
        $generateRoute = array_merge($generateRoute, $home);

        //how to apply / student visa f1 / overseas students
        $home = $this->generateArrayLinks($languages, 'how-to-apply/student-visa-f1/overseas-students');
        $generateRoute = array_merge($generateRoute, $home);

        //how to apply / student visa f1 / transfer students
        $home = $this->generateArrayLinks($languages, 'how-to-apply/student-visa-f1/transfer-students');
        $generateRoute = array_merge($generateRoute, $home);

        //how to apply / student visa f1 / change of status
        $home = $this->generateArrayLinks($languages, 'how-to-apply/student-visa-f1/change-of-status');
        $generateRoute = array_merge($generateRoute, $home);

        //promo contact
        $home = $this->generateArrayLinks($languages, 'promo_contact');
        $generateRoute = array_merge($generateRoute, $home);

        //promo contact / thanks
        $home = $this->generateArrayLinks($languages, 'promo_contact/thanks');
        $generateRoute = array_merge($generateRoute, $home);

        //promo material
        $home = $this->generateArrayLinks($languages, 'promo_material');
        $generateRoute = array_merge($generateRoute, $home);

        //promo material / thanks
        $home = $this->generateArrayLinks($languages, 'promo_material/thanks');
        $generateRoute = array_merge($generateRoute, $home);

        // i20application
        $home = $this->generateArrayLinks($languages, 'i20application');
        $generateRoute = array_merge($generateRoute, $home);

        // i20application thanks
        $home = $this->generateArrayLinks($languages, 'i20application/thanks');
        $generateRoute = array_merge($generateRoute, $home);

        // price-auto-v2
        $home = $this->generateArrayLinks($languages, 'price-auto-v2');
        $generateRoute = array_merge($generateRoute, $home);

        // price-v2
        $home = $this->generateArrayLinks($languages, 'price-v2');
        $generateRoute = array_merge($generateRoute, $home);

        //tf_material
        $home = $this->generateArrayLinks($languages, 'tf_material/thanks');
        $generateRoute = array_merge($generateRoute, $home);

        //school-magazine
        $home = $this->generateArrayLinks($languages, 'school-magazine');
        $generateRoute = array_merge($generateRoute, $home);

        //career
        $home = $this->generateArrayLinks($languages, 'career/thanks');
        $generateRoute = array_merge($generateRoute, $home);

        // lptf
        $home = $this->generateArrayLinks($languages, 'lptf');
        $generateRoute = array_merge($generateRoute, $home);

        //2023promo
        $home = $this->generateArrayLinks($languages, '2023promo');
        $generateRoute = array_merge($generateRoute, $home);

        //payment
        $home = $this->generateArrayLinks($languages, 'payment');
        $generateRoute = array_merge($generateRoute, $home);

        //dancecamp
        $home = $this->generateArrayLinks($languages, 'dancecamp');
        $generateRoute = array_merge($generateRoute, $home);

        //dancecamp/online-application
        $home = $this->generateArrayLinks($languages, 'dancecamp/online-application');
        $generateRoute = array_merge($generateRoute, $home);

        GenerateRoute::insert($generateRoute);
    }

    private function generateArrayLinks($languages, $key) {
        $arr = [[
            'link' => '/'. $key
        ]];

        foreach($languages as $language) {
            array_push($arr, [
                'link' => '/'. $language .'/'. $key
            ]);
        }

        return $arr;
    }
}
