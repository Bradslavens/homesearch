@extends('layouts.clean')


@section('title')
    <title>Slavens Realty - Meet Our Agents</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/agents.css">
@endsection

@section('nav')
    <div id="nav">
        <img src="images/logo.png">
        <i class="fa fa-bars" aria-hidden="true" data-toggle="nav"></i>
    </div>
    @include('partials.nav-main')
@endsection

@section('section')
    
    
    
@endsection


@section('footer')
    @include('partials.footer2')
@endsection