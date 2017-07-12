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

              <div class="toggle">
                 <button data-toggle="nav" class="rotatable">
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

                {{-- previous query  --}}

                @if(session('query'))
                  <input type="hidden" name="propertyQuery" value="{{session('query')}}">
                @endif
                <div class="form-groups">

                  <div class="form-group">
                    <label for="priceLow">Price Low</label>
                    <input type="text" name="priceLow" placeholder="$0">
                  </div>

                  <div class="form-group">
                    <label for="priceHigh">Price High</label>
                    <input type="text" name="priceHigh" placeholder="$1,000,000,000">
                  </div>

                </div>

                <div class="form-groups">
                  <div class="form-group">
                    <label for="bedrooms">Min Bedrooms</label>
                    <input type="text" name="bedrooms">
                  </div>

                  <div class="form-group">
                    <label for="bathrooms">Min Baths</label>
                    <input type="text" name="bathrooms">
                  </div>
                </div>

                {{-- add more --}}
                <div class="form-group">
                    <input type="submit" value="Filter">
                </div>
                

            </form>
          </div>


      </div>

    @yield('section')
    
    @yield('footer')
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    
    <script src="/js/custom.js"></script>
  

  </body>
</html>