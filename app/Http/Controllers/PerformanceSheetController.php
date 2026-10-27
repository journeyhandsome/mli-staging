<?php

namespace App\Http\Controllers;

use App\Models\UploadFile;
use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\Http\Requests\UploadUpdateRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class PerformanceSheetController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = UploadFile::where('upload_files.category', '=', 'Performance Fact Sheet')
            ->oldest()->paginate(10);
        return view('admin/forms/performance_fact_sheet.index', compact('files'));
    }
   
    public function create()
    {   
        
        return view('admin/forms/performance_fact_sheet.upload_file');
    }


    public function store(UploadRequest $request)
    {
        $files = new UploadFile;
        $files->name = $request->name;
        $files->category = $request->category;
            if ($request->hasfile('file')) {
                $file = $request->file('file');
                $extension = $file->getClientOriginalName();
                $file->move('files/performance_fact_sheet/', $extension);

                $files->file = $extension;
            }
        $files->save();
        
        return redirect()->route('performance_fact_sheet.index')->with('success', 'Uploaded Successfully!');

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UploadFile  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $files = UploadFile::find($id);
        return view('admin/forms/performance_fact_sheet.edit', compact('files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UploadFile  $banner
     * @return \Illuminate\Http\Response
     */
       public function update(UploadUpdateRequest $request, $id )
    {
        $files = UploadFile::find($id);
        
        $files->name = $request->name;
        $files->category = $request->category;
        if($request->hasfile('file'))
        {       
            $destination = 'files/performance_fact_sheet/'.$files->file;
            if(File::exists($destination))
            { 
                File::delete($destination);
            }
            $file = $request->file('file');
            $extension = $file->getClientOriginalName();
            $file->move('files/performance_fact_sheet/', $extension);

            $files->file = $extension;
        }
        $files->save();

        return redirect()->route('performance_fact_sheet.index')->with('success', 'Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UploadFile  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $files = UploadFile::find($id);
        $destination = 'files/performance_fact_sheet/'.$files->file;
        if(File::exists($destination))
        { 
            File::delete($destination);
        }
        
        $files -> delete();

        return back()->with('success', 'Deleted Successfully!');
    }
}
