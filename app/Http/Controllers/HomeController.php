<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Property;

class HomeController extends Controller
{
    public function index()
    {
        session(['notbot' => 'notbot']);
        
        $listingCount = Property::where('L_StatusCatID', 'Active')->count();

        return view('welcome', ['listingCount' => $listingCount]);
    }

    
    public function propertyList(Request $request)
    {

        // get list of properties based on search request

        return view('home');
        
    }
}
