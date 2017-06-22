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
    public function index()
    {
        return view('careers');
    }
}
