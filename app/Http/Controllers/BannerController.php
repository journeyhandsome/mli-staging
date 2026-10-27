<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Order;
use App\Models\Language;
use App\Http\Requests\BannerPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner_list = Banner::join('languages','banners.language_id','=','languages.id')
                    ->select(['banners.id','banners.path','languages.name','languages.image', 'banners.image_large', 'banners.image_small'])
                    ->orderBy('languages.id','ASC')
                    ->paginate(5);

        
        return view('admin/banner.index', compact('banner_list'));
    }

    public function create()
    {   
        $language_list = Language::orderBy('id', 'ASC')->get();

        foreach ($language_list as $language) {
            $banner_list = Banner::where('language_id', '=', $language -> id)
                        ->select(['id', 'language_id'])                            
                        ->get();
            $language -> banner_list = $banner_list;
        }
        
        return view('admin/banner.create', compact('language_list'));
    }


    public function store(BannerPostRequest $request)
    {
        $banner = new Banner;
        $banner->language_id = $request->language_id;
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalName();
                $filename = time().'-'.$extension;
                $file->move('images/banner/', $filename);

                $banner->path = $filename;
            }
            if ($request->hasfile('image_large')) {
                $file = $request->file('image_large');
                $extension = $file->getClientOriginalName();
                $filename = time().'-'.$extension;
                $file->move('images/banner/', $filename);

                $banner->image_large = $filename;
            }
            if ($request->hasfile('image_small')) {
                $file = $request->file('image_small');
                $extension = $file->getClientOriginalName();
                $filename = time().'-'.$extension;
                $file->move('images/banner/', $filename);

                $banner->image_small = $filename;
            }


        $data_arr = [];
        if($request -> url != null){
            $count = count($request->url);
            
            if ($count > 0) {
                for ($i = 0; $i < $count; $i++) {
                    $url = $request->url[$i];
                    if($url != null){
                        array_push($data_arr, array('name' => $request->name[$i], 'url' => $request->url[$i], 'coordinates' => $request->coordinates[$i], 'color' => $request->color[$i]));
                    }
                }
            }
        }
        $data = $request->only('name','url','coordinates', 'color');
        $banner['banner_attr'] = json_encode($data_arr);
        $banner->save();
        
        return redirect()->route('banner.index')->with('success', 'Created Successfully!');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::find($id);

        return view('admin/banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        $language_list = Language::all();
        return view('admin/banner.edit', compact('banner','language_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
       public function update(Request $request, $id )
    {
        $banner = Banner::find($id);
        
        $data_arr = [];
        if($request -> url != null){
            $count = count($request->url);

            
            if ($count > 0) {
                for ($i = 0; $i < $count; $i++) {
                    $url = $request->url[$i];
                    if($url != null){
                        array_push($data_arr, array('name' => $request->name[$i], 'url' => $request->url[$i], 'coordinates' => $request->coordinates[$i], 'color' => $request->color[$i]));
                    }
                }
            }
        }

        if($request->hasfile('image'))
        {       
            $destination = 'images/banner/'.$banner->path;
            if(File::exists($destination))
            { 
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('images/banner/', $filename);

            $banner->path = $filename;
        }
        if($request->hasfile('image_large'))
        {       
            $destination = 'images/banner/'.$banner->image_large;
            if(File::exists($destination))
            { 
                File::delete($destination);
            }
            $file = $request->file('image_large');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('images/banner/', $filename);

            $banner->image_large = $filename;
        }
        if($request->hasfile('image_small'))
        {       
            $destination = 'images/banner/'.$banner->image_small;
            if(File::exists($destination))
            { 
                File::delete($destination);
            }
            $file = $request->file('image_small');
            $extension = $file->getClientOriginalName();
            $filename = time().'-'.$extension;
            $file->move('images/banner/', $filename);

            $banner->image_small = $filename;
        }
        $banner -> banner_attr = json_encode($data_arr);
        $banner->save();

        return redirect()->route('banner.index')->with('success', 'Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $banner = Banner::find($id);
        
        $destination = 'images/banner/'.$banner->path;
        if(File::exists($destination))
        { 
            File::delete($destination);
        }
        
        $banner -> delete();

        return back()->with('success', 'Deleted Successfully!');
    }

}
