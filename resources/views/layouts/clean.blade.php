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

    <script src="https://use.fontawesome.com/0c8602578f.js"></script>


    @yield('css')

    @yield('title')


  </head>
  <body>

    @yield('nav')

    @yield('section')
    
    @yield('footer')
  

  </body>
</html>