@extends('layouts.main')


@section('title')
    <title>Slavens Realty Contact Form</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/contact.css">
@endsection

@section('nav')
    @include('partials.nav-inverse')
@endsection

@section('section')

    <header>
        <h2>Contact Form</h2>
    </header>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="container">
        <form id="form" class="job-container" method="POST" action="{{route('contact.store')}}">
            {{ csrf_field() }}

            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>

            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" >

            <input type="email" class="form-control" name="email" id="email" placeholder="email" required>

            <textarea class="form-control" name="comment" id="comment" placeholder="comment"></textarea>

        <input type="submit" id="submit" value="Send">

        </form>
    </div>

@endsection


@section('footer')
    @include('partials.footer2')
@endsection