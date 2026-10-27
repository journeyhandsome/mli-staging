<?php

namespace App\Http\Controllers;

use App\Models\GenerateRoute;
use Illuminate\Http\Request;

class GenerateRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generateRoute = GenerateRoute::orderBy('id','ASC')->get();

        return response()->json($generateRoute);
    }
}
