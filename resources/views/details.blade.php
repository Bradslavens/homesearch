{{-- variables
$listing
$listings->appends(['propertyQuery' => $propertyQuery])->links()
 --}}

@extends('layouts.main')
    

@section('title')
    <title>Slavens Realty Property Detail</title>
@endsection

@section('section')
    

    {{-- property list --}}
    <h2>Property Detail</h2>

    <img id="large-image" src="{{$property->images()->first()->link}}">

    <div class="small-image-container">
        @foreach($property->images as $image)
            <img class="small-image" src="{{$image->link}}">
        @endforeach
    </div>

    {{-- remarks --}}
    <p><span>Remarks: </span>{{$property->LR_remarks11}}</p>

    <div class="propert-detail">
        <p><span>Full Address: </span>
        @if($property->L_IdxInclude == 0 )
            {{$property->FullAddress}}
        @elseif($property->L_IdxInclude == 2)
            <p>Address not available per seller's request: Please <a href="{{route('contact.create')}}">Contact Agent</a> For Address</p>
        @endif
        </p>
    </div>
    <div class="propert-detail">
        <p><span>Asking Price: $</span>{{number_format($property->L_AskingPrice)}}</p>
    </div>
    <div class="propert-detail">
        <p><span>beds: </span> {{$property->LM_Int1_3}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Full Baths: </span> {{$property->LM_Int2_3}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Half Baths: </span> {{$property->LM_Int1_5}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Estimated SF: </span> {{$property->LM_Int4_1}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Terms: </span> {{$property->LFD_Terms_42}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Pets: </span> {{$property->LM_Char10_6}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Stories: </span> {{$property->LM_Char10_11}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Lot Size: </span> {{$property->LM_Char10_15}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Age Restrictions: </span> {{$property->LM_Char50_5}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Fire Place: </span> {{$property->LM_Int1_8}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Year Built: </span> {{$property->LM_Int2_1}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Parking Garage Spaces: </span> {{$property->LM_Int4_7}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Parking Total Spaces: </span> {{$property->LM_Int4_8}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Listing Total Fees: $</span> {{number_format($property->LM_Int4_16)}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Home Owner Fees: $</span> {{number_format($property->LM_Dec_3)}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Home Owner Total Fees: $</span> {{number_format($property->LM_Dec_4)}}</p>
    </div>
    <div class="propert-detail">
        <p><span>CDF Mello Roos: $</span> {{number_format($property->LM_Dec_6)}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Cooling: </span> {{$property->LFD_Cooling_3}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Equipment: </span> {{$property->LFD_Equipment_4}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Laundry Location: </span> {{$property->LFD_LaundryLocation_15}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Pool: </span> {{$property->LFD_Pool_25}}</p>
    </div>
    <div class="propert-detail">
        <p><span>School District: </span> {{$property->LFD_SchoolDistrict_32}}</p>
    </div>
    <div class="propert-detail">
        <p><span>View: </span> {{$property->LFD_View_44}}</p>
    </div>
    <div class="propert-detail">
        <p><span>Property Condition: </span> {{$property->LFD_PropertyCondition_305}}</p>
    </div>
    <div>
        <p><span>Listing ID:</span> {{$property->L_ListingID}}</p>
    </div>


@endsection


@section('footer')
    @include('partials.footer')
@endsection



