{{-- variables
$listing
$listings->appends(['propertyQuery' => $propertyQuery])->links()
 --}}

@extends('layouts.main')
    

@section('title')
    <title>Slavens Realty Property Listings</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/listings.css">
@endsection

@section('section')
    

    {{-- property list --}}
    <h2>Property List</h2>

    @foreach($listings as $listing)
        <div class="listing-container">
            <div class="main-image">
                <img class="listing-image" src="{{$listing->images->first()->link}}">
                <a class="more-images" href="#">{{$listing->images->count()}} Pictures</a>
            </div>
            {{--end #main-image --}}

            <div class="summary">
                <div class="price">
                    $ {{ number_format($listing->L_AskingPrice)}}
                </div>
                <div class="address">
                    {{$listing->L_AddressNumber}}
                    {{$listing->L_AddressDirection}}
                    {{$listing->L_AddressStreet}}
                    {{$listing->L_Address2}}
                    {{$listing->L_City}}
                    {{$listing->L_State}}
                    {{$listing->L_Zip}}
                </div>
                <div class="bed-bath">
                    {{$listing->LM_Int1_3}} <strong>Bedroom(s)</strong> <br>
                    {{$listing->LM_Int2_3}} <strong>Full Baths</strong> / {{$listing->LM_Int1_5}} <strong> 1/2 Baths</strong>
                </div>
                <div class="square-feet">
                    {{$listing->LM_Int4_1}} <strong>SF</strong>
                </div>
            </div>
            {{-- end #summary --}}

            <div class="button-group">
                <a href="#" class="details">Details</a>
                <a href="#" class="contact-agent">Contact Agent</a>
            </div>
            
        </div>
        {{-- end listing container --}}

    @endforeach
    {{-- end property list --}}




    {{-- pagination --}}
    <div class="pagination-container">
        {{ $listings->appends(['propertyQuery' => $propertyQuery])->links() }}
    </div>
    {{-- end pagination --}}

@endsection


@section('footer')
    @include('partials.footer')
@endsection



