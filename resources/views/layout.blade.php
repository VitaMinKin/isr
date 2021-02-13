<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ URL::asset("css/app.css") }}">
    <link rel="stylesheet" href="{{ URL::asset("css/main.css") }}">

    <title>Hello, world!</title>
  </head>
  <body>
    
        @yield('content')
        @yield('footer')

  </body>
  <script type="text/javascript" src="{{ URL::asset("js/app.js") }}"></script>
  <script type="text/javascript" src="{{ URL::asset("js/main.js") }}"></script>
</html>