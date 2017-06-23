@extends('layouts.main')


@section('title')
    <title>Slavens Realty</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/careers.css">
@endsection

@section('section')
    

    <header>
        <h1>Slavens Realty</h1>
        <h2>Thank You!</h2>
    </header>
    
    <div id="careers-container">
        @if(session('message'))

        <div id="message">
            {{session('message')}}
        </div>
            
        @endif
    </div>

    @endsection
    
    
    @section('footer')
        @include('partials.footer2')
    @endsection