@extends('layouts.main')


@section('title')
    <title>Slavens Realty</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/careers.css">
@endsection

@section('nav')
    @include('partials.nav-inverse')
@endsection

@section('section')
    

    <header>
        <h1>Thank You!</h1>
    </header>

    <div id="careers-container">
        @if(session('message'))

        <p>
            {{session('message')}}
        </p>
            
        @endif
    </div>

@endsection


@section('footer')
    @include('partials.footer2')
@endsection