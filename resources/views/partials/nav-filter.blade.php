<div class="nav-container nav-inverse">
    <nav>
        <h1><a href="/">Slavens Realty</a></h1>
        
        <button class="nav-button" onclick="goBack()">Back</button>

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
      <form method="GET" action="{{route('listing.index')}}">

          {{-- {{csrf_field()}} --}}

          {{-- previous query  --}}
          @if(session('query'))
            <input type="hidden" name="propertyQuery" value="{{session('query')}}">
          @endif
          <div class="form-groups">

            <div class="form-group">
              <label for="priceLow">Price Low</label>
              <input type="text" name="priceLow" value="$0">
            </div>

            <div class="form-group">
              <label for="priceHigh">Price High</label>
              <input type="text" name="priceHigh" value="$1,000,000,000">
            </div>

          </div>

          <div class="form-groups">
            <div class="form-group">
              <label for="bedrooms">Min Bedrooms</label>
              <input type="text" value="0" name="bedrooms">
            </div>

            <div class="form-group">
              <label for="bathrooms">Min Baths</label>
              <input type="text" value="0" name="bathrooms">
            </div>
          </div>

          {{-- add more --}}
          <div class="form-group">
              <input type="submit" value="Filter">
          </div>
          

      </form>
    </div>


</div>