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

    <link rel="stylesheet" type="text/css" href="/css/layout1.css">

    @yield('css')

    @yield('title')

  </head>
  <body>
  
      <div class="nav-container">
          <nav>
              <div class="home">
                  <a href="/">Home</a>
              </div>
              <div class="links">
                  <div class="contact">
                  <a href="{{route('contact.create')}}">Contact</a>
                  </div>
                  <div class="careers">
                  <a href="{{route('careers')}}">Careers</a>
                  </div>
                  <div class="aboutUs">
                  <a href="about">About</a>
                  </div>
              </div>
          </nav>
      </div>

    @yield('section')
    
    @yield('footer')
        
  </body>
</html>