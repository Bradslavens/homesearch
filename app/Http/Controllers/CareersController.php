<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CareersController extends Controller
{

    public function __construct()
    {
        $this->middleware('web');
    }


    //
    //
    public function index($source = null)
    {
        // set sessiion 4
        
        session(['source' => $source]);

        return view('careers');
    }
}
