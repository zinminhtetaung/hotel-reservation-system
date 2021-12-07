@extends('userlayouts.app')

@section('content')

<div class="header">
  <div class="container clearfix">
    <h1 class="logo"> 
      <a href="#" ><img  class="logoimg pc" src="{{ asset('image/logo.jpeg') }}" alt="logo"></a>
      <a href="#"><img  class="logoimg sp" src="{{ asset('image/splogo.png') }}" alt="logo"></a>
    </h1>
    @if (Auth::user())
      <a class="back" href="{{route('reservationList')}}">
        <img src="{{ asset('image/l_arrow.png') }}"> Back to Dashboard</a>
    @endif
    <nav>
    <div class="menu-btn">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="nav-bar">
    <ul class="nav-inner clearfix">
      <li><a href="{{route('home')}}">Home</a></li>
      <li><a href="{{route('hotelview')}}">Hotel</a></li>
      <li> <a href="{{route('roomuserview')}}" >Room</a></li>
      <li><a href="{{route('login')}}"class="active">Login</a></li>
    </ul>
    </div>
    </nav>
  </div>
</div>
<div class="body">
  <div class="warp">
    <div class="login-box">
      <div>
        <div class="login-title">{{ __('LOGIN') }}</div>
        <div>
          <form method="POST" >
            @csrf
            <div>
              <div class="email-box">
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div>
              <div class="password-box">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Enter Your Password" required autocomplete="current-password">
                <input class="show-pwd" type="checkbox" onclick="myFunction()">Show Password
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div>
              <div>
                <button type="submit" class="login-button">
                  {{ __('Login') }}
                </button>
                <div class="login-comment">
                  <p>If you have login problem contact to system admin</p>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection