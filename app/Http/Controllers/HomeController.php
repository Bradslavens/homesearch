<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Property;

class HomeController extends Controller
{
    public function index()
    {
        session(['isBot' => 'no']);
        
        $listingCount = Property::where('L_StatusCatID', 'Active')->count();

        $properties = Property::where('L_StatusCatID', 'Active')->select('L_Zip')->groupBy('L_Zip')->orderBy('L_Zip', 'desc')->get();

        return view('welcome', ['listingCount' => $listingCount, 'properties' => $properties]);
    }

    
    public function propertyList(Request $request)
    {

        
        // get list of properties based on search request

        return view('home');
        
    }
}
