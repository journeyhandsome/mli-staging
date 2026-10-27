<?php

namespace App\Http\Controllers;

use App\Models\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class UploadFileController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = UploadFile::oldest()->paginate(10);
        return view('admin/forms.index', compact('files'));
    }
}