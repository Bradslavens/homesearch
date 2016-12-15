@extends('layouts.main');

@section('content');

<div class="row">
    <div class="col-xs-12 col-md-8 col-md-offset-2">
        <h1>Welcome to Slavens Realty</h1>
    </div>
</div>

<div class="row">
    <div class="col-xs=12 col-md-8 col-md-offset-2">
        <h2>Search for a home in San Diego:</h2>
        <form method="GET" action="propertyList">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Search for homes for sale:</label>
                <input class="form-control" type="text" name="search-params" placeholder="Enter Address, City, Zip or MLS#">
            </div>
            <input type="submit" name="submit" value="Search">
        </form>
    </div>
</div>

@endsection;