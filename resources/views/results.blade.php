@extends('layouts.main')


@section('title')
    <title>Slavens Realty Property Listings</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/listings.css">
@endsection

@section('section')
    
    <div class="container">

        <header>
            <h1>Slavens Realty</h1>
            <h2>Selected Property Listings</h2>
        </header>

        <div class="listing-container">
                
                @foreach ($listings as $listing)
                
                    <div class="property-container">
                        @if(is_object($listing->images->first()))
                        <img class="responsive-image" src="{{$listing->images->first()->link}}">
                        @endif
                        
                        <div class="details">
                            <span class="price">$ {{number_format($listing->L_AskingPrice, 0)}}</span>
                            <span class="beds">{{$listing->LM_Int1_3}} beds / {{$listing->LM_Int2_3}} @if($listing->LM_Int1_5).{{$listing->LM_Int1_5}} @endif Baths</span>
                            <span class="sfeet">{{$listing->LM_Int4_1}} Estimated Square Feet</span>
                            <address>{{$listing->FullAddress}}</address>
                        </div>
                        <div class="request-tour">
                            <a href="contact">Request A Tour</a>
                        </div>
                    
                    </div>
                 @endforeach   

        </div>
        {{-- listing container --}}

    </div>
    {{-- container --}}


    
    

    <div class="pagination-container">
        {{ $listings->links() }}
    </div>

    @endsection
    

    @section('footer')
        @include('partials.footer')
    @endsection