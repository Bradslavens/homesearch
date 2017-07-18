@extends('layouts.main')

@section('title')
    <title>Slavens Realty Thank You for Applying!</title>
@endsection

@section('content')
    <p>Dear, {{$applicant->name}}, Thank you for applying to Slavens Realty.  We'll get back to you shortly.</p>
@endsection

@section('nav')
    @include('partials.nav-inverse')
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/careers.css">
@endsection

@section('footer')
    @include('partials.footer2')
@endsection