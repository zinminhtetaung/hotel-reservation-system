<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Hotel Reservation System</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

  <!-- Styles -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

  <style>
    body {
      font-family: 'Lato';
    }

    .fa-btn {
      margin-right: 6px;
    }
  </style>
</head>

<body id="app-layout">
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
          Reservation
        </a>
        <a class="navbar-brand" href="{{ url('/onlineBooking') }}">
          Online Booking
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/hotels/list">Hotel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/rooms/list">Room</a>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </nav>

  @include('common.errors')

  @yield('content')

  <!-- JavaScripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="{{asset('js/script.js')}}"></script>
</body>

</html>