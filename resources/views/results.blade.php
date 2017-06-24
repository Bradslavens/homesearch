@extends('layouts.main')


@section('title')
    <title>Slavens Realty Property Listings</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/listings.css">
@endsection

@section('section')
    

    <header>
        <h1>Slavens Realty</h1>
        <h2>Selected Property Listings</h2>
    </header>
    
    <div class="listing-container">

        @foreach ($listings as $listing)
        
            <div class="property-container">
                @if(is_object($listing->images->first()))
                <img src="{{$listing->images->first()->link}}">
                @endif
                
                <div class="details">
                    <span class="price">$ {{number_format($listing->L_AskingPrice, 0)}}</span>
                    <span class="beds">3 Bedroom / 2 Bath</span>
                    <address class="address">{{$listing->FullAddress}}</address>
                </div>
            
            </div>
         @endforeach   
        
    </div>

    @endsection
    

    @section('footer')
        @include('partials.footer')
    @endsection