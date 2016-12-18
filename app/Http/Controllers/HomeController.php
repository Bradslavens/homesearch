<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home/welcome');
    }

    
    public function propertyList(Request $request)
    {

        // get list of properties based on search request

        return view('propertyList.home');
        
    }
}
