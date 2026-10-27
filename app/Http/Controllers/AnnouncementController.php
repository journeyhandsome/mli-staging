<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Requests\AnnouncementPostRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $language_list = Language::orderBy('id', 'ASC')->get();

        foreach ($language_list as $language) {
            $announcement = Announcement::where('language_id', '=', $language -> id)
                                        ->select(['id', 'text', 'language_id'])                            
                                        ->get()->last();

            $language -> announcement = $announcement;
        }

        
        return view('admin/announcement.create  ', compact('language_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementPostRequest $request)
    {
    
        $announcement = Announcement::where('language_id', '=', $request->language_id)
                                ->select('id')->get()->last();
        if ($announcement) {
            $announcement -> text = $request->text;
            $announcement -> language_id = $request -> language_id;
            $announcement -> save();
        }
        else {
            $add_announcement = new Announcement();
            $add_announcement->text = $request->text;
            $add_announcement -> language_id = $request -> language_id;
            $add_announcement->save();
        }

        $request->session()->put('success', 'Updated Successfully!');
        $request->session()->put('language_id', $request -> language_id);

        return response()->json(true);
    }


}