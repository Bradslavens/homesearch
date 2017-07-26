@extends('layouts.main')


@section('title')
    <title>Slavens Realty Application</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/careers.css">
@endsection

@section('nav')
    @include('partials.nav-inverse')
@endsection

@section('section')
    

    <header>
        <h1>Application</h1>
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
        <form id="form" class="job-container" method="POST" action="{{route('apply.store')}}">
            {{ csrf_field() }}

                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>

                <input type="text" class="form-control" name="licenseNumber" id="licenseNumber" placeholder="CA BRE License #">

                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" required>

                <input type="email" class="form-control" name="email" id="email" placeholder="email" required>

                <input type="text" class="form-control" name="position" id="position" value="{{$position}}" required>

            <input type="submit" id="submit" value="Apply">

        </form>
    </div>

    @endsection

    @section('footer')
        @include('partials.footer2')
    @endsection
        