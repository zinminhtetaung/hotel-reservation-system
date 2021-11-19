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
  <link href="{{asset('css/lib/font.css') }}" rel="stylesheet">
  <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- Styles -->
  <link href="{{ asset('css/lib/jquery.dataTables.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/hotel.css')}}">
  <!-- Script -->
  <script src="{{ asset('js/app.js') }}"></script>
</head>
@include('sidebar.sidebar')

<body>
  <div id="app">
    <header class="header clearfix">
      <div class="wrap clearfix">
        <a class="logo" href="{{ url('/') }}">
          <img src="{{asset('logo.jpeg')}}">
        </a>
        <nav class="logout">
          <ul>
            <li>
              <a class="nav-ttl" href="/logout">Logout</a>
            </li>
          </ul>
        </nav>
    </header>
  </div>
  <main>
    @yield('content')
  </main>

  </div>
  <!-- JavaScripts -->
  <script src="{{asset ('js/lib/jquery.min.js')}}"></script>
  <script src="{{asset ('js/lib/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/script.js')}}"></script>
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset ('js/lib/Chart.min.js')}}"></script>
  <script src="{{ asset('js/lib/jquery.dataTables.min.js') }}"></script>
</body>

</html>