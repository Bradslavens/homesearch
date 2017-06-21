<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Slavens Realty Property Listings</title>

    <link rel="stylesheet" type="text/css" href="/css/listings.css">

  </head>
  <body>

    <header>
        <h1>Slavens Realty</h1>
        <h2>Selected Property Listings</h2>
    </header>
    
    <div class="listing-container">

        @foreach ($listings as $listing)
        
            <div class="property-container">
                <img src="{{$listing->images->first()->link}}">
                
                <div class="details">
                    <span class="price">{{$listing->L_AskingPrice}}</span>
                    <span class="beds">3 Bedroom / 2 Bath</span>
                    <address class="address">{{$listing->FullAddress}}</address>
                </div>
            
            </div>
         @endforeach   
        
    </div>
    
    <footer>
        <p>Slavens Realty, 3399 Ruffin Rd. CA-BRE#01522202, 619-253-0529</p>
    </footer>
        
  </body>
</html>