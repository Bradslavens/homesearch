<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ListingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trim1 = str_replace(',', ' ', $request->propertyQuery);
        $trim2 = str_replace('.', ' ', $trim1);
        $trim = preg_replace('/\s+/', ' ', $trim2);

        $query = explode(' ', $trim );

        if(count($query) == 1 )
        {
            $listings = \App\Property::where([
                    ['L_ListingID', 'like', '%'. $request->propertyQuery . '%'],
                    ['L_StatusCatID', 'Active'],
                ])
                ->orWhere([
                    ['L_Zip', 'like', '%'. $request->propertyQuery . '%'],
                    ['L_StatusCatID', 'Active'],
                ])->simplePaginate(3); 
        }
        else
        {
            $queryString = '%';
            foreach ($query as $q) 
            {
                $queryString .= $q . '%';
            }

            $listings = \App\Property::where('FullAddress', 'like', $queryString)->simplePaginate(3);
        }


        return view('results', ['listings' => $listings]);

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

}
