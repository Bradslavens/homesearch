@extends('layouts.main')


@section('title')
    <title>Slavens Realty Contact Form</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/careers.css">
@endsection

@section('section')
    

    <header>
        <h1>Slavens Realty</h1>
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

    <ul>
        <li>Phone: 619-253-0529</li>
        <li>Address: 3399 Ruffin Rd. #M2, San Diego, CA 92123</li>
    </ul>
    
    <div id="careers-container">
        <form id="form" class="job-container" method="POST" action="{{route('contact.store')}}">
            {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
        </div>

        <div class="form-group">
            <label for="Phone">Phone</label>
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" >
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
        </div>

        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea class="form-control" name="comment" id="comment" placeholder="comment"></textarea>
        </div>

        <input type="submit" id="submit" value="Send">

        </form>
    </div>

    @endsection
    
    
    @section('footer')
        @include('partials.footer2')
    @endsection