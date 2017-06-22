@extends('layouts.main')


@section('title')
    <title>Slavens Realty Application</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/careers.css">
@endsection

@section('section')
    

    <header>
        <h1>Slavens Realty</h1>
        <h2>Application</h2>
    </header>
    
    <div id="careers-container">
        <form id="form" class="job-container" method="POST" action="{{route('apply.store')}}">
            {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Name" required>
        </div>

        <div class="form-group">
            <label for="License-Number">CA-BRE License Number (if applicable)</label>
            <input type="text" class="form-control" id="License-Number" placeholder="CA BRE License #">
        </div>

        <div class="form-group">
            <label for="Phone">Phone</label>
            <input type="tel" class="form-control" id="Phone" placeholder="Phone" required>
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input type="email" class="form-control" id="email" placeholder="email" required>
        </div>

        <div class="form-group">
            <label for="postion">Postion</label>
            <input type="text" class="form-control" id="postion" placeholder="postion" required>
        </div>

        <input type="submit" value="Apply Now">

        </form>
    </div>

    @endsection
        