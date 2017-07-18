{{-- variables
$listing
$listings->appends(['propertyQuery' => $propertyQuery])->links()
 --}}

@extends('layouts.listings')
    

@section('title')
    <title>Slavens Realty Property Listings</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/listings.css">
@endsection

@section('nav')
    @include('partials.nav-filter')
@endsection

@section('section')
    

    {{-- property list --}}
    <h2>Property List</h2>

    @foreach($listings as $listing)
        <div class="listing-container">
            <div class="main-image">
                <img class="listing-image" src="{{$listing->images->first()->link}}">
                <a class="more-images" href="{{route('listing.show', ['listing' => $listing->id])}}">{{$listing->images->count()}} Pictures</a>
            </div>
            {{--end #main-image --}}

            <div class="details1">
                <div class="summary">
                    <div class="price">
                        $ {{ number_format((float)$listing->L_AskingPrice)}}
                    </div>
                    <div class="address">
                        Address:
                        @if($listing->L_IdxInclude == 0)
                            {{$listing->L_AddressNumber}}
                            {{$listing->L_AddressDirection}}
                            {{$listing->L_AddressStreet}}
                            {{$listing->L_Address2}}
                            {{$listing->L_City}}
                            {{$listing->L_State}}
                            {{$listing->L_Zip}}
                        @elseif($listing->L_IdxInclude == 2)
                            <p>Address not available per seller's request: Please <a href="{{route('contact.create')}}">Contact Agent</a> For Address</p>
                        @endif  

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
                    <a href="{{route('listing.show', ['listing' => $listing->id])}}" class="details">Details</a>
                    <a href="{{route('contact.create')}}" class="contact-agent">Contact Agent</a>
                </div>
                {{-- end button group --}}
            </div>
            {{-- end details1 --}}
            
        </div>
        {{-- end listing container --}}

    @endforeach
    {{-- end property list --}}




    {{-- pagination --}}
    <div class="pagination-container">
        {{ $listings->appends(['propertyQuery' => $propertyQuery, 'priceHigh' => $priceHigh, 'priceLow' => $priceLow, 'bedrooms' => $bedrooms, 'bathrooms' => $bathrooms])->links() }}
    </div>
    {{-- end pagination --}}

@endsection


@section('footer')
    @include('partials.footer')
@endsection



