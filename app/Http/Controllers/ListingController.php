<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ListingController extends Controller
{

    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showListings(Request $request)
    {   
        $trim1 = str_replace(',', ' ', $request->input('query'));
        $trim2 = str_replace('.', ' ', $trim1);
        $trim = preg_replace('/\s+/', ' ', $trim2);

        $query = explode(' ', $trim );

        // dd(count($query));

        if(count($query) == 1 )
        {
            $listings = \App\Property::where('L_ListingID', 'like', '%'. $request->input('query') . '%')
                ->orWhere('L_Zip', 'like', '%'. $request->input('query') . '%')
                ->get(); 
        }
        else
        {
            $queryString = '%';
            foreach ($query as $q) 
            {
                $queryString .= $q . '%';
            }

            $listings = \App\Property::where('FullAddress', 'like', $queryString)->get();
        }
        
        return view('results', ['listings' => $listings]);
    }
}
