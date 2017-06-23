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
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div id="careers-container">
        <form id="form" class="job-container" method="POST" action="{{route('apply.store')}}">
            {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
        </div>

        <div class="form-group">
            <label for="License-Number">CA-BRE License Number (if applicable)</label>
            <input type="text" class="form-control" name="licenseNumber" id="licenseNumber" placeholder="CA BRE License #">
        </div>

        <div class="form-group">
            <label for="Phone">Phone</label>
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" required>
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
        </div>

        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" class="form-control" name="position" id="position" placeholder="Position" required>
        </div>

        <input type="submit" id="submit" value="Apply">

        </form>
    </div>

    @endsection
        