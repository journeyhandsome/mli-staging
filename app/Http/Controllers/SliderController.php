<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Order;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Requests\SliderPostRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr = [];
        $check_language_list = Language::orderBy('id', 'ASC')->get();
        foreach ($check_language_list as $language) {
            $slider_list = Slider::join('languages','sliders.language_id','=','languages.id')
                        ->where('sliders.language_id', '=', $language -> id)
                        ->select(['sliders.id','sliders.order','sliders.path','languages.name','languages.image'])
                        ->orderBy('languages.id','ASC')
                        ->orderBy('sliders.order','ASC')
                        ->get();

            if (count($slider_list) != 0) {
                array_push($arr, $language -> id);
            }
        }
        $language_list = Language::whereIn('id', $arr)->orderBy('id', 'ASC')->get();
        return view('admin/slider.index', compact('language_list'));
    }

    public function getsliders(Request $request)
    {
        $language_id = $request -> language_id;

        if ($language_id == 'all') {
            $language_list = Language::orderBy('id', 'ASC')->get();
            foreach ($language_list as $language) {
                $slider_list = Slider::join('languages','sliders.language_id','=','languages.id')
                                ->where('sliders.language_id', '=', $language -> id)
                                ->select(['sliders.id','sliders.order','sliders.path','languages.name','languages.image', 'sliders.language_id'])
                                ->orderBy('languages.id','ASC')
                                ->orderBy('sliders.order','ASC')
                                ->get();

                $language -> slider_list = $slider_list;
            }

            return view('admin/slider/detail', compact('language_id', 'language_list'));
        }
        else {
            $language_list = Language::where('id', '=', $language_id)
                                ->orderBy('id', 'ASC')->get();

            foreach ($language_list as $language) {
                $slider_list = Slider::join('languages','sliders.language_id','=','languages.id')
                                ->where('sliders.language_id', '=', $language -> id)
                                ->select(['sliders.id','sliders.order','sliders.path','languages.name','languages.image'])
                                ->orderBy('languages.id','ASC')
                                ->orderBy('sliders.order','ASC')
                                ->get();

                $language -> slider_list = $slider_list;
            }

            return view('admin/slider/detail', compact('language_list', 'language_id'));
        }
    }

    public function create()
    {   
        
        $language_list = Language::orderBy('id', 'ASC')->get();
        foreach ($language_list as $language) {
            $slider_list = Slider::where('language_id', '=', $language -> id)
                            ->orderBy('order', 'ASC')->get();

            $language -> slider_list = $slider_list;
        }

        return view('admin/slider.create', compact('language_list'));
    }

    public function sliderOrder(Request $request)
    {
        $slider_ids = $request -> ids;
        $language_id = $request -> language_id;

        $slider_list = Slider::where('language_id', '=', $language_id)->get();

        foreach ($slider_list as $slider) {
            $slider -> order = 0;
            $slider -> save();
        }

        $count = 0;
        foreach ($slider_ids as $slider_id) {
            $count++;
            $update_slider = Slider::find($slider_id);
            $update_slider -> order = $count;
            $update_slider -> save();
        }

        $get_slider_list = Slider::where('language_id', '=', $language_id)->orderBy('order', 'ASC')->get();
        return response()->json($get_slider_list);
    }

    public function store(SliderPostRequest $request)
    {
        $check_slider = Slider::where('language_id', '=', $request -> language_id)
                                ->orderBy('order', 'ASC')->get()->last();

        $selected_slider = Slider::where('language_id', '=', $request -> language_id)
                            ->where('order', '=', $request -> order)
                            ->get()->last();

        if ($check_slider) {
            if ($selected_slider) {
                $selected_slider -> order = $check_slider -> order + 1;
                $selected_slider -> save();
            }

            $slider = new Slider;
            $slider->order = $request->order;
            $slider->language_id = $request->language_id;
            $slider->link = $request->link;
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalName();
                $filename = time().'-'.$extension;
                $file->move('images/slider/', $filename);

                $slider->path = $filename;
            }
            $slider->save();
        }
        else {
            $slider = new Slider;
            $slider->order = $request->order;
            $slider->language_id = $request->language_id;
            $slider->link = $request->link;
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalName();
                $filename = time().'-'.$extension;
                $file->move('images/slider/', $filename);

                $slider->path = $filename;
            }
            $slider->save();
        }
        
        return redirect()->route('slider.index')->with('success', 'Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        $language_list = Language::all();
        return view('admin/slider.edit', compact('slider','language_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
       public function update(Request $request, $id )
    {
        $slider = Slider::find($id);

        $slider->link = $request->link;
        if($request->hasfile('image'))
        {       
            $request->validate([
                'image' => 'mimes:jpg,png,jpeg',
            ]);
            
            $destination = 'images/slider/'.$slider->path;
            if(File::exists($destination))
            { 
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('images/slider/', $filename);

            $slider->path = $filename;
            
        }
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider -> delete();

        $slider_list = Slider::where('language_id', '=', $request -> language_id)->orderBy('order', 'ASC')->get();

        foreach ($slider_list as $slider) {
            $slider -> order = 0;
            $slider -> save();
        }

        $get_slider_list = Slider::where('language_id', '=', $request -> language_id)->orderBy('order', 'ASC')->get();

        $count = 0;
        foreach ($get_slider_list as $get_slider) {
            $count++;
            $get_slider -> order = $count;
            $get_slider -> save();
        }

        return back()->with('success', 'Deleted Successfully!');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'integer',
        ]);

        foreach ($request->ids as $index => $id) {
            DB::table('sliders')
                ->where('id', $id)
                ->update([
                    'order' => $index + 1
                ]);
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
