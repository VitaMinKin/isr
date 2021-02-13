<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ URL::asset("css/app.css") }}">
    <link rel="stylesheet" href="{{ URL::asset("css/main.css") }}">

    <title>882 ISC: Status Screen</title>
  </head>
  <body class="d-flex flex-column min-vh-100">
        @yield('navbar')
        @yield('content')
        @yield('footer')

  <script type="text/javascript" src="{{ URL::asset("js/app.js") }}"></script>
  <script type="text/javascript" src="{{ URL::asset("js/main.js") }}"></script>
  </body>
</html>