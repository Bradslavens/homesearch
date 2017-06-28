<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PersonApplied;

class ApplicantController extends Controller
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
        return view('apply');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'licenseNumber' => 'numeric',
            ]);


        $applicant = new \App\Applicant;
        $applicant->name = $request->name;
        $applicant->licenseNumber = $request->licenseNumber;
        $applicant->phone = $request->phone;
        $applicant->email = $request->email;
        $applicant->position = $request->position;
        $applicant->source = session('source');

        $applicant->save();

        event(new PersonApplied($applicant));

        session()->flash('message', 'Thank You. Application sent for: '.$applicant->name . ' We will respond to you shortly.');

        return view('thankyou');

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
