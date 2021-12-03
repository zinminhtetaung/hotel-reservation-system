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
  <link rel="stylesheet" href="{{ asset('css/login.css')}}">

  <!-- Script -->
  <script src="{{ asset('js/app.js') }}"></script>
</head>
@include('sidebar.index')

<body>
  <div id="app">
    <header class="header clearfix">
      <div class="wrap clearfix">
        <a class="logo" href="{{ url('/') }}">
          <img src="{{asset('logo.jpeg')}}">
        </a>
        <nav class="logout">
              <div class="dropdown">
                  <button class="dropbtn">{{Auth::user()->user_name}}</button>
                  
                  <div class="dropdown-content">
                    <a class="nav-ttl" href="{{ route('logout') }}">Logout</a>
                  </div>
              </div>

        </nav>
        <div class="header__toggle">
          <i class='bx bx-menu' id="header-toggle"></i>
        </div>
    </header>
  </div>
  <main>
    @yield('content')
  </main>

  </div>
  <!-- JavaScripts -->
  <script src="{{asset ('js/lib/jquery.min.js')}}"></script>
  <script src="{{asset ('js/lib/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/common.js')}}"></script>
  <script src="{{asset('js/sidebar.js')}}"></script>
  <script src="{{asset ('js/lib/Chart.min.js')}}"></script>
  <script src="{{ asset('js/lib/jquery.dataTables.min.js') }}"></script>
</body>

</html>