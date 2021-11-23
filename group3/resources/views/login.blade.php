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

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mt-4 mb-4">
        <div class="card-header">{{ __('Login') }}</div>

        <div class="card-body">
          <form method="POST" action="/loginuser">
            @csrf

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Login') }}
                </button>

                <!-- @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
                @endif -->
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection