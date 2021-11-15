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

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Script -->
  <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
  <div id="app">
    <nav class="navbar sticky-top navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{asset('logo.jpeg')}}" height="50px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <a class="navbar-brand" href="{{ url('/') }}">
            Reservation
          </a>
          <a class="navbar-brand" href="{{ url('/onlineBooking') }}">
            Online Booking
          </a>
          <a class="navbar-brand" href="/hotels/list">Hotel</a>

          <a class="navbar-brand" href="/rooms/list">Room</a>
        </div>
      </div>
    </nav>

    <main class="py-4">
      @yield('content')
    </main>
  </div>
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>