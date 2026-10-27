<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Slider;
use App\Models\Order;
use App\Models\Language;
use App\Models\Announcement;
use App\Models\Testimonial;
use App\Models\TranslatedTestimonial;

class HomepageController extends Controller
{
    public function index()
    {
        return view('app');
    }

    public function getHomeInfo($lang)
    {
        switch($lang) {
            case 'ar':
                $current_lang = 'عرب؛ عربيّc';
            break;
            case 'kr':
                $current_lang = '한국어';
            break;
            case 'ru':
                $current_lang = 'Pусский';
            break;
            case 'fr':
                $current_lang = 'Français';
            break;
            case 'sp':
                $current_lang = 'Español';
            break;
            case 'th':
                $current_lang = 'ภาษาไทย';
            break;
            case 'jp':
                $current_lang = '日本語';
            break;
            case 'por':
                $current_lang = 'Português';
            break;
            case 'ch':
                $current_lang = '中文(简体)';
            break;
            case 'it':
                $current_lang = 'Italiano';
            break;
            case 'tr':
                $current_lang = 'Türkçe';
            break;
            case 'de':
                $current_lang = 'Deutsch';
            break;
            case 'tw':
                $current_lang = '中文(繁體)';
            break;
            default:
                $current_lang = 'English';
        }

        $slider_list = Slider::join('languages', 'sliders.language_id', '=', 'languages.id')
                        ->select(['sliders.id', 'sliders.path', 'sliders.link'])
                        ->where('languages.name', '=', $current_lang)
                        ->orderby('sliders.order', 'ASC')
                        ->get();

        $banner_list = Banner::join('languages', 'banners.language_id', '=', 'languages.id')
                        ->select(['banners.id', 'path', 'image_large', 'image_small', 'banner_attr'])
                        ->where('languages.name', '=', $current_lang)
                        ->get();

        foreach($banner_list as $b_index => $banner) {
            $banner_list[$b_index]->banner_attr = json_decode($banner->banner_attr);
        }
                        
        $announcement = Announcement::join('languages', 'announcements.language_id', '=', 'languages.id')
                        ->select(['announcements.id', 'announcements.text'])
                        ->where('languages.name', '=', $current_lang)
                        ->get();

        $testimonial_list = Testimonial::join('campuses','testimonials.campus_id','=','campuses.id')
                        ->join('nationalities', 'testimonials.nationality_id', '=', 'nationalities.id')
                        ->leftJoin('translated_testimonial', 'translated_testimonial.testimonials_id', '=', 'testimonials.id')
                        ->join('languages', 'translated_testimonial.languages_id', '=', 'languages.id')
                        ->where('testimonials.is_active', '=', 1)
                        ->where('languages.name', '=', $current_lang)
                        ->select(['testimonials.id','testimonials.image','campuses.name as campus_name', 'nationalities.name as nationality_name', 'translated_testimonial.title', 'translated_testimonial.text'])
                        ->orderBy('testimonials.id','DESC')
                        ->get();
        return response()->json(['slider_list' => $slider_list, 'banner_list' => $banner_list, 'announcement' => $announcement, 'testimonial_list' => $testimonial_list]);
    }
    
}
