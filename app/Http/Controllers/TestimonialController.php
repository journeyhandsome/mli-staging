<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\Nationality;
use App\Models\Campus;
use App\Models\Language;
use App\Models\TranslatedTestimonial;
use App\Models\User;
use App\Http\Requests\TestimonialPostRequest;
use App\Http\Requests\TestimonialUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $testimonial_list = Testimonial::join('campuses','testimonials.campus_id','=','campuses.id')
                        ->join('nationalities', 'testimonials.nationality_id', '=', 'nationalities.id')
                        ->where('testimonials.is_active', '=', 1)
                        ->select(['testimonials.id','testimonials.image','campuses.name as campus_name', 'nationalities.name as nationality_name'])
                        ->orderBy('testimonials.id','DESC')
                        ->paginate(10);

        foreach ($testimonial_list as $testimonial) {
            $english_translated = TranslatedTestimonial::join('languages', 'translated_testimonial.languages_id', '=', 'languages.id')
                                        ->where('translated_testimonial.testimonials_id', '=', $testimonial -> id)
                                        ->where('languages.name', '=', "English")
                                        ->select(['translated_testimonial.title', 'translated_testimonial.text'])
                                        ->get()->last();
            $testimonial -> english_translated = $english_translated;

            $languages_list = TranslatedTestimonial::join('languages', 'translated_testimonial.languages_id', '=', 'languages.id')
                                        ->where('translated_testimonial.testimonials_id', '=', $testimonial -> id)
                                        ->select(['languages.id','languages.name'])
                                        ->get();
            $testimonial -> languages_list = $languages_list;                           

            foreach ($languages_list as $language) {
                $translated_testimonial = TranslatedTestimonial::join('languages', 'translated_testimonial.languages_id', '=', 'languages.id')
                                        ->where('translated_testimonial.testimonials_id', '=', $testimonial -> id)
                                        ->where('translated_testimonial.languages_id', '=', $language -> id)
                                        ->select(['translated_testimonial.title', 'translated_testimonial.text'])
                                        ->get()->last();

                $language -> translated_testimonial = $translated_testimonial;
            }
        }
        return view('admin/testimonial.index', compact('testimonial_list'));
    }

    public function showTestimonialPerNationality($lang, $testimonial)
    {
        $lang = global_lang_title($lang);
        $testimonial = Testimonial::join('nationalities', 'testimonials.nationality_id', '=', 'nationalities.id')
                        ->leftJoin('translated_testimonial', 'translated_testimonial.testimonials_id', '=', 'testimonials.id')
                        ->join('languages', 'translated_testimonial.languages_id', '=', 'languages.id')
                        ->where('testimonials.image', 'LIKE', $testimonial . '%')
                        ->where('languages.name', '=', $lang)
                        ->select(['testimonials.id','testimonials.image', 'nationalities.name as nationality_name', 'translated_testimonial.title', 'translated_testimonial.text'])
                        ->get()
                        ->first();

        if($testimonial) {
            return response()->json($testimonial);
        }

        return response()->json(array(
            'code'      =>  404,
            'message'   =>  'No data found'
        ), 404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $nationality_list = Nationality::orderBy('id', 'ASC')->get();

        foreach ($nationality_list as $nationality) {
            $campus_list = Campus::orderBy('id', 'ASC')->get();

            $nationality -> campus_list = $campus_list;

            foreach ($nationality -> campus_list as $campus) {
                $language_list = Language::orderBy('id', 'ASC')->get();

                $campus -> language_list = $language_list;
            }
        }

        $language_list = Language::orderBy('id', 'ASC')->get();
        
        $new_testimonial = new Testimonial();
        $new_testimonial -> nationality_id = 0;
        $new_testimonial -> campus_id = 0;
        $new_testimonial -> is_active = 0;
        $new_testimonial -> save();

        return view('admin/testimonial.create', compact('nationality_list', 'language_list', 'new_testimonial'));
    }

    public function saveTranslation(Request $request)
    {
        $translation = TranslatedTestimonial::where('testimonials_id', '=', $request->testimonial_id)
                                    ->where('languages_id', '=', $request->language_id)
                                    ->get()->last();

        if ($translation) {
            if ($request->type == 'title') {
                $translation -> title = $request->value;
                $translation -> save();
            }
            else {
                $translation -> text = $request->value;
                $translation -> save();
            }
        }
        else {
            if ($request->type == 'title') {
                $new_translation = new TranslatedTestimonial();
                $new_translation -> testimonials_id = $request->testimonial_id;
                $new_translation -> languages_id = $request->language_id;
                $new_translation -> title = $request->value;
                $new_translation -> text = '';
                $new_translation -> save();
            }
            else {
                $new_translation = new TranslatedTestimonial();
                $new_translation -> testimonials_id = $request->testimonial_id;
                $new_translation -> languages_id = $request->language_id;
                $new_translation -> title = '';
                $new_translation -> text = $request->value;
                $new_translation -> save();
            }
        }

        return $translation;
        
    }

    public function removeTranslation(Request $request)
    {
        $translation = TranslatedTestimonial::where('testimonials_id', '=', $request->testimonial_id)
                                    ->where('languages_id', '=', $request->language_id)
                                    ->get()->last();

        $translation -> delete();
    }

    public function getTestimonial(Request $request) {
        $testimonial_id = $request->testimonial_id;
        $language = $request->language;

        $testimonial = TranslatedTestimonial::where('testimonials_id', '=', $testimonial_id)
                                    ->where('languages_id', '=', $language)
                                    ->select(['id', 'title', 'text'])->get()->last();

        return response()->json($testimonial);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(TestimonialPostRequest $request)
    {   
        
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('images/testimonial/', $filename);

            $testimonial = Testimonial::find($request->testimonial_id);
            $testimonial -> image = $filename;
            $testimonial -> nationality_id = $request->nationality_id;
            $testimonial -> campus_id = $request->campus_id;
            $testimonial -> is_active = 1;
            $testimonial -> user_id = Auth::user()->id;
            $testimonial -> save();
        }
        else {
            $testimonial = Testimonial::find($request->testimonial_id);
            $testimonial -> nationality_id = $request->nationality_id;
            $testimonial -> campus_id = $request->campus_id;
            $testimonial -> is_active = 1;
            $testimonial -> user_id = Auth::user()->id;
            $testimonial -> save();
        }

        return redirect('admin/testimonial')->with('success', 'Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        $testimonial = Testimonial::find($id);

        return view('admin/testimonial.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nationality_list = Nationality::orderBy('id', 'ASC')->get();
        $campus_list = Campus::orderBy('id', 'ASC')->get();

        $testimonial = Testimonial::find($id);
        $language_list = Language::orderBy('id', 'ASC')->get();

        foreach ($language_list as $language) {
            $translated = TranslatedTestimonial::where('testimonials_id', '=', $id)
                                    ->where('languages_id', '=', $language -> id)
                                    ->select(['id', 'title', 'text'])->get()->last();

            $language -> translated = $translated;
        }

        return view('admin/testimonial.edit', compact('nationality_list', 'campus_list', 'testimonial', 'language_list', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialUpdateRequest $request, $id)
    {
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('images/testimonial/', $filename);

            $testimonial = Testimonial::find($id);
            $testimonial -> image = $filename;
            $testimonial -> nationality_id = $request->edit_nationality_id;
            $testimonial -> campus_id = $request->edit_campus_id;
            $testimonial -> user_id = Auth::user()->id;
            $testimonial -> save();
        }
        else {
            $testimonial = Testimonial::find($id);
            $testimonial -> nationality_id = $request->edit_nationality_id;
            $testimonial -> campus_id = $request->edit_campus_id;
            $testimonial -> user_id = Auth::user()->id;
            $testimonial -> save();
        }

        return redirect('admin/testimonial')->with('success', 'Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);


        $language_list = Language::orderBy('id', 'ASC')->get();

        foreach ($language_list as $language) {
            $translated = TranslatedTestimonial::where('testimonials_id', '=', $id)
                                            ->where('languages_id', '=', $language -> id)
                                            ->select(['id', 'title', 'text'])->get()->last();

            if ($translated) {
                $translated -> delete();
            }
        }
        
        $destination = 'images/testimonial/'.$testimonial->image;
        if(File::exists($destination))
        { 
            File::delete($destination);
        }
        
        $testimonial->delete();
        return redirect('admin/testimonial')->with('success', 'Deleted Successfully!');
    }
}
