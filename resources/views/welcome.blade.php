<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Slavens Realty</title>

    <link rel="stylesheet" type="text/css" href="/css/landing.css">
    <style type="text/css">

    </style>

  </head>
  <body>
        <div id="container">
            <div id="heading">
                <p id="intro">We Are</p>
                <h1>Slavens</h1>
                <h1>Realty</h1>
                <p><a href="#">Contact Us</a> for Buying, Selling or Leasing Residential Homes, up to 4 units in San Diego County.</p>
            </div>
            <form id="form" method="GET" action="{{route('listing.index')}}">
                {{-- {{csrf_field()}} --}}
                <label for="form">Search Listings:</label>
                <input name="properyQuery" type="text" placeholder="Enter an MLS#, Address, City, State or Zip">
                
                <input type="submit" value="Go!">
            </form>
            <nav>
                <div class="items"><a href="about">About Us</a></div>
                <div class="items"><a href="{{route('contact.create')}}">Contact Us</a></div>
                <div class="items"><a href="{{route('careers')}}">Careers</a></div>
            </nav>
            @include('partials.footer')
        </div>
  </body>
</html>