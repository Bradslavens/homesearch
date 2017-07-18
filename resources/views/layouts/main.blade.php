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



    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    
    <script src="/js/Slides-SlidesJS-3/Slides-SlidesJS-3/source/jquery.slides.min.js"></script>
    
    <script src="/js/custom.js"></script>
  



  </head>
  <body>

    @yield('nav')

    @yield('section')
    
    @yield('footer')

  </body>
</html>