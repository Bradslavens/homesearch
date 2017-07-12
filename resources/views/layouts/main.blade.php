<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
      @import url('https://fonts.googleapis.com/css?family=Spectral');
      @import url('https://fonts.googleapis.com/css?family=Fjalla+One|Khula');            
      @import url('https://fonts.googleapis.com/css?family=Satisfy');
    </style>

    <link rel="stylesheet" type="text/css" href="/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/css/custom.css">


    @yield('css')

    @yield('title')


  </head>
  <body>

      <div class="nav-container">
          <nav>
              <h1>Slavens Realty</h1>

              <div data-toggle="filter" class="toggle">
                 <button>Filter</button>
              </div>

              <div data-toggle="nav" class="toggle rotatable">
                 <button>
                   <span class="bar">&horbar;</span>
                   <span class="bar">&horbar;</span>
                   <span class="bar">&horbar;</span>
                 </button>
              </div>

          </nav>
          
          <div data-target="nav" class="links">
            <a href="/">Home</a>
            <a href="{{route('contact.create')}}">Contact</a>
            <a href="{{route('careers')}}">Careers</a>
            <a href="about">About</a>
          </div>

          <div data-target="filter" id="filter">
            <form method="POST" action="#">
                {{ csrf_field() }}

                <label for="priceLow">Price Low</label>
                <input type="text" name="priceLow" placeholder="$0">

                <label for="priceHigh">Price High</label>
                <input type="text" name="priceHigh" placeholder="$1,000,000,000">

                <label for="bedrooms">Bedrooms</label>
                <input type="text" name="bedrooms">

                <label for="fullBaths">Full Baths</label>
                <input type="text" name="fullBaths">

                <label for="halfBaths">1/2 Baths</label>
                <input type="text" name="halfBaths">

                {{-- add more --}}

                <input type="submit" value="submit">

            </form>
          </div>


      </div>

    @yield('section')
    
    @yield('footer')
        
    <script src="/js/custom.js"></script>
  

  </body>
</html>