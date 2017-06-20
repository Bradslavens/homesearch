<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Slavens Realty</title>

    <link rel="stylesheet" type="text/css" href="/css/landing.css">

  </head>
  <body>
        <div id="container">
            <div id="heading">
                <p id="intro">We Are</p>
                <h1>Slavens</h1>
                <h1>Realty</h1>
                <p><a href="#">Contact Us</a> for Buying, Selling or Leasing Residential Homes, up to 4 units in San Diego County.</p>
            </div>
            <form id="form" method="POST" action="{{route('listing.showListings')}}">
                {{csrf_field()}}
                <label for="form">Search Current Listings:</label>
                <input name="query" type="text" placeholder="Enter an MLS#, Address, City, State or Zip">
                
                <input type="submit" name="go" value="go!">
            </form>
            <nav>
                <div class="items"><a href="#">About Us</a></div>
                <div class="items"><a href="#">Contact Us</a></div>
                <div class="items"><a href="#">Careers</a></div>
            </nav>
            <footer>
                <p>Slavens Realty, 3399 Ruffin Rd. #M2, San Diego, CA 92123 | CA-BRE License # 01522202</p>
                <p>&copy;Slavens, Inc.</p>
            </footer>
        </div>
  </body>
</html>