<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;
use App\Http\Requests\CampusPostRequest;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campus = Campus::latest()->get();
        return view('campus.index', compact('campus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('campus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CampusPostRequest $request)
    {

        Campus::create($request->all());

        return redirect()->route('campus.index')->with('success', 'Created Successfully!');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit(Campus $campus)
    {
        return view('campus.edit', compact('campus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(CampusPostRequest $request, Campus $campus)
    {
        $campus->name = $request->name;
        $campus->save();
        return redirect()->route('campus.index')->with('success', 'Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus)
    {
        $campus->delete();
        return back()->with('success', 'Deleted Successfully!');
    }
}
