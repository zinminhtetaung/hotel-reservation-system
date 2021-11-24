@extends('userlayouts.app')

@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">


<div class="header">

  <div class="header-in clearfix">
    <h1 class="logo"> <a href=""><img src="{{ asset('image/logo.jpeg') }}" alt="logo"></a></h1>
    <ul class="nav">
      <li><a href="{{url('user/home')}}">Home</a></li>
      <li><a href="{{route('hotelview')}}">Hotel</a></li>
      <li> <a href="{{route('roomuserview')}}">Room</a></li>
      <li><a href="{{url('/loginuser')}}" class="active">Login</a></li>
    </ul>
  </div>

</div>

<div class="body">
  <div class="warp">
    <div class="login-box">
      <div>
        <div class="login-title">{{ __('LOGIN') }}</div>

        <div>
          <form method="POST" action="/loginuser">
            @csrf

            <div>
              <!-- <label for="email">{{ __('E-Mail Address') }}</label> -->

              <div  class="email-box">
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div>
              <!-- <label for="password">{{ __('Password') }}</label> -->

              <div class="password-box">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Enter Your Password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div>
              <div>
                <div>
                  <!-- <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> -->

                  <!-- <label for="remember">
                    {{ __('Remember Me') }}
                  </label> -->
                </div>
              </div>
            </div>

            <div>
              <div>
                <button type="submit" class="login-button">
                  {{ __('Login') }}
                </button>

                <!-- @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
                @endif -->
              </div>
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