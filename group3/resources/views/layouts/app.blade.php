<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Hotel Reservation System</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!--========== BOX ICONS ==========-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

  <!-- Styles -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>

  @include('common.errors')
  @include('sidebar.sidebar')

  @yield('content')

  <!-- JavaScripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="{{asset('js/script.js')}}"></script>
  <script src="{{asset('js/graph.js')}}"></script>
  <script src="{{asset('js/app.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  
 
 
</head>

<body>
  
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>