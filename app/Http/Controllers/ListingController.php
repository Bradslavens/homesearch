<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use \App\Property;

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

        session(['query' => $request->propertyQuery]);

        if(count($query) == 1 && strlen($query[0]) > 4 )
        {            
            $listings = Property::where([
                    ['L_ListingID', 'like', '%'. $request->propertyQuery . '%'],
                    ['L_AskingPrice','<=', preg_replace("/[^0-9]/","", urldecode($request->priceHigh))],
                    ['L_AskingPrice', '>=', preg_replace("/[^0-9]/","", urldecode($request->priceLow))],
                    ['LM_Int1_3', '>=',  $request->bedrooms],
                    ['LM_Int2_6', '>=', $request->bathrooms],  // getting null
                    ['L_StatusCatID', 'Active'],
                ])
                ->orWhere([
                    ['L_Zip', 'like', '%'. $request->propertyQuery . '%'],
                    ['L_AskingPrice','<=', preg_replace("/[^0-9]/","", urldecode($request->priceHigh))],
                    ['L_AskingPrice', '>=', preg_replace("/[^0-9]/","", urldecode($request->priceLow))],
                    ['LM_Int1_3', '>=',  $request->bedrooms],
                    ['LM_Int2_6', '>=', $request->bathrooms],
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

            $listings = Property::where([
                    ['FullAddress', 'like', $queryString],
                    ['L_StatusCatID', 'Active'],
                    ['L_AskingPrice','<=', preg_replace("/[^0-9]/","", urldecode($request->priceHigh))],
                    ['L_AskingPrice', '>=', preg_replace("/[^0-9]/","", urldecode($request->priceLow))],
                    ['LM_Int1_3', '>=',  $request->bedrooms],
                    ['LM_Int2_6', '>=' , $request->bathrooms],
                ])->simplePaginate(3);
        }

        $pq = urlencode($request->propertyQuery);


        return view('results', ['listings' => $listings, 'propertyQuery' => $pq, 'priceHigh' => $request->priceHigh, 'priceLow' => $request->priceLow, 'bedrooms' => $request->bedrooms, 'bathrooms' => $request->bathrooms]);

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
    public function show($listing)
    {
        $property = Property::find($listing);

        return view('details', ['property' => $property]);
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
