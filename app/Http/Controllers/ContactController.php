<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
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
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request, [
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'max:255',
            ]);

        // see if contact exist
        $contact = \App\Contact::where('name', $request->name)->first();

        if($contact)
        {
            // update contact
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->save();

            $contact->comments()->save(['comment' => $request->comment]);
        }
        else
        {
            $contact = new \App\Contact;

            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->save();

            $contact->comments()->save(['comment' => $request->comment]);
        }

        event(new ContactMade($contact));

        session()->flash('message', 'Thank You for contacting us '. $contact->name . '. We will get back to you right away');

        return view('thankYouContact', ['contact' => $contact]);
        
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
