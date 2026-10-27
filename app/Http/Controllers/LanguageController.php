<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Requests\LanguagePostRequest;
use Illuminate\Support\Facades\File;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::orderBy('id','ASC')->paginate(10);
        return view('language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguagePostRequest $request)
    {
        $language = new Language();
        $language->name = $request->name;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('images/lang/', $filename);

            $language->image = $filename;
        }
        $language->save();
        return redirect()->route('language.index')->with('success', 'Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        return view('language.show', ['language' =>  $language]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return view('language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(LanguagePostRequest $request, Language $language)
    {
        $language->name = $request->name;  

         if($request->hasfile('image'))
        {       
            $destination = 'images/lang/'.$language->image;
            if(File::exists($destination))
            { 
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('images/lang/', $filename);

            $language->image = $filename;
        }
        $language->save();
        return redirect()->route('language.index')->with('success', 'Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language = Language::find($id);
        $destination = 'images/flags/'.$language->image;
        if(File::exists($destination))
        { 
            File::delete($destination);
        }
        
        $language->delete();
        return back()->with('success', 'Deleted Successfully!');
    }
}
