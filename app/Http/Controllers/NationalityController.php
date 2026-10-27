<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Http\Requests\NationalityPostRequest;
use Illuminate\Support\Facades\File;

class NationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nationalities = Nationality::orderBy('id','ASC')->paginate(10);
        return view('nationality.index', compact('nationalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nationality.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NationalityPostRequest $request)
    {
        $nationality = new Nationality();
        $nationality->name = $request->name;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('images/flags/', $filename);

            $nationality->image = $filename;
        }
        $nationality->save();

        return redirect()->route('nationality.index')->with('success', 'Created Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function edit(Nationality $nationality)
    {
        return view('nationality.edit', compact('nationality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function update(NationalityPostRequest $request, Nationality $nationality)
    {
        $nationality->name = $request->name;  

         if($request->hasfile('image'))
        {       
            $destination = 'images/flags/'.$nationality->image;
            if(File::exists($destination))
            { 
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('images/flags/', $filename);

            $nationality->image = $filename;
        }
        $nationality->save();
        return redirect()->route('nationality.index')->with('success', 'Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nationality = Nationality::find($id);
        $destination = 'images/flags/'.$nationality->image;
        if(File::exists($destination))
        { 
            File::delete($destination);
        }
        
        $nationality->delete();
        return back()->with('success', 'Deleted Successfully!');
    }
}
