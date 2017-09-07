{{-- variables, listingCount --}}
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Slavens Realty</title>
    
    <style>
      @import url('https://fonts.googleapis.com/css?family=Spectral');
      @import url('https://fonts.googleapis.com/css?family=Fjalla+One|Khula');            
      @import url('https://fonts.googleapis.com/css?family=Satisfy');
    </style>


    
    <link rel="stylesheet" type="text/css" href="/css/landing.css">

  </head>
  <body>
        <div id="container">
            <div id="heading">
                <p id="intro">We Are</p>
                {{-- <h1 style="background-color: red; color: white;">Warning! Page Under construction , do not use, information not accurate.. Thanks :)</h1> --}}
                <h1>Slavens</h1>
                <h1>Realty</h1>
                <p><a href="{{route('contact.create')}}">Contact Us</a> for Buying, Selling or Leasing Residential Homes, up to 4 units in San Diego County.</p>
            </div>
            <form id="form" method="GET" action="{{route('listing.index')}}">
                {{-- {{csrf_field()}} --}}
                <label for="form"><h2>Search From  <span class="bold">{{number_format($listingCount)}}</span> Local Listings:</h2></label>
                <input name="propertyQuery" type="search" placeholder="Enter an MLS#, Address, City, State or Zip">
                
                <input type="hidden" name="priceHigh" value="9999999999999">
                <input type="hidden" name="priceLow" value="0">
                <input type="hidden" name="bedrooms" value="0">
                <input type="hidden" name="bathrooms" value="0">
                
                <input type="submit" value="SEARCH">
            </form>
            
            @include('partials.nav-main')

            <div id="service-areas">
                <p>
                    <h4>Search the Following Zip Codes:</h4>

                    {{-- for comma --}}
                    <?php 
                        $c = count($properties); 
                        $i = 0; 
                    ?>

                    @foreach($properties as $property)

                        <a href="/listing?propertyQuery={{$property->L_Zip}}&priceHigh=9999999999999&priceLow=0&bedrooms=0&bathrooms=0">{{$property->L_Zip}}</a>
                        {{-- add a comma to the end except last one --}}
                        <?php if(++$i !== $c){ echo ","; } ?>
                    @endforeach
                </p>
            </div>
            @include('partials.footer')
        </div>
  </body>
</html>