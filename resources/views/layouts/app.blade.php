<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />
    
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">

    <title>882 ISC: Status Screen</title>
  </head>
  <body class="d-flex flex-column min-vh-100">
        
        @include('shared.navbar')
      
      <div class="container-fluid" style="height:50px">
        @include('flash::message')
      </div>
        
        @yield('content')

        @include('shared.footer')

  <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
  </body>
</html>