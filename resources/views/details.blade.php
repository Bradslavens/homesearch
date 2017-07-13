{{-- variables
$listing
$listings->appends(['propertyQuery' => $propertyQuery])->links()
 --}}

@extends('layouts.main')
    

@section('title')
    <title>Slavens Realty Property Detail</title>
@endsection

@section('css')
    
@endsection

@section('section')
    

    {{-- property list --}}
    <h2>Property Detail</h2>

    <img id="large-image" src="{{$property->images()->first()->link}}">

    @foreach($property->images as $image)
        <img class="small-image" src="{{$image->link}}">
    @endforeach

    <p>{{$property->LR_remarks11}}</p>
    <div class="propert-detail">
        Full Address: {{$property->FullAddress}}
    </div>
        Listing ID: {{$property->L_ListingID}}
    </div>
    <div class="propert-detail">
        Asking Price: {{$property->L_AskingPrice}}
    </div>
    <div class="propert-detail">
        beds: {{$property->LM_Int1_3}}
    </div>
    <div class="propert-detail">
        Full Baths: {{$property->LM_Int2_3}}
    </div>
    <div class="propert-detail">
        Half Baths: {{$property->LM_Int1_5}}
    </div>
    <div class="propert-detail">
        Estimated SF: {{$property->LM_Int4_1}}
    </div>
    <div class="propert-detail">
        Terms: {{$property->LFD_Terms_42}}
    </div>
    <div class="propert-detail">
        Pets: {{$property->LM_Char10_6}}
    </div>
    <div class="propert-detail">
        Stories: {{$property->LM_Char10_11}}
    </div>
    <div class="propert-detail">
        Lot Size: {{$property->LM_Char10_15}}
    </div>
    <div class="propert-detail">
        Age Restrictions: {{$property->LM_Char50_5}}
    </div>
    <div class="propert-detail">
        Fire Place: {{$property->LM_Int1_8}}
    </div>
    <div class="propert-detail">
        Year Built: {{$property->LM_Int2_1}}
    </div>
    <div class="propert-detail">
        Parking Garage Spaces: {{$property->LM_Int4_7}}
    </div>
    <div class="propert-detail">
        Parking Total Spaces: {{$property->LM_Int4_8}}
    </div>
    <div class="propert-detail">
        Listing Total Fees: {{$property->LM_Int4_16}}
    </div>
    <div class="propert-detail">
        Home Owner Fees: {{$property->LM_Dec_3}}
    </div>
    <div class="propert-detail">
        Home Owner Total Fees: {{$property->LM_Dec_4}}
    </div>
    <div class="propert-detail">
        CDF Mello Roos: {{$property->LM_Dec_6}}
    </div>
    <div class="propert-detail">
        Cooling: {{$property->LFD_Cooling_3}}
    </div>
    <div class="propert-detail">
        Equipment: {{$property->LFD_Equipment_4}}
    </div>
    <div class="propert-detail">
        Laundry Location: {{$property->LFD_LaundryLocation_15}}
    </div>
    <div class="propert-detail">
        Pool: {{$property->LFD_Pool_25}}
    </div>
    <div class="propert-detail">
        School District: {{$property->LFD_SchoolDistrict_32}}
    </div>
    <div class="propert-detail">
        View: {{$property->LFD_View_44}}
    </div>
    <div class="propert-detail">
        Property Condition: {{$property->LFD_PropertyCondition_305}}
    </div>


@endsection


@section('footer')
    @include('partials.footer')
@endsection



