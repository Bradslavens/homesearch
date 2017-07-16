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
              <a href="/"><h1>Slavens Realty</h1></a>

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
      </div>

    @yield('section')
    
    @yield('footer')
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="/js/Slides-SlidesJS-3/Slides-SlidesJS-3/source/jquery.slides.min.js"></script>

    
    <script src="/js/custom.js"></script>
  

  </body>
</html>