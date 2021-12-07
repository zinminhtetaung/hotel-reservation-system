@extends('userlayouts.app')
@section ('content')

<div class="header">
  <div class="container clearfix">
    <h1 class="logo">
      <a href="#"><img class="logoimg pc" src="{{ asset('image/logo.jpeg') }}" alt="logo"></a>
      <a href="#"><img class="logoimg sp" src="{{ asset('image/splogo.png') }}" alt="logo"></a>
    </h1>
    <nav>
      <div class="menu-btn">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="nav-bar">
        <ul class="nav-inner clearfix">
          <li><a href="{{route('home')}}">Home</a></li>
          <li><a href="{{route('hotelview')}}" class="active">Hotel</a></li>
          <li> <a href="{{route('roomuserview')}}">Room</a></li>
          @if (!Auth::user())
          <li><a href="{{route('login')}}">Login</a></li>
          @endif
          @if (Auth::user())
          <li><a href="{{route('reservationList')}}">Dashboard</a></li>
          @endif
        </ul>
      </div>
    </nav>
  </div>
</div>
<div class="viewcontent">
  <img class="view-img" src="{{ asset('image/view-image.jpg') }}" alt="hotel-img">
  <div class="container">
    <div class=" view ">
      <a class="view-btn" href="{{route('roomuserview')}}">View Room</a>
    </div>
  </div>
</div>


<div class="hotel-content2">
  <div class="container clearfix">

    <div class="hotel clearfix">
      <img class="lottle-img" src="{{ asset('image/Lotte.jpeg') }}" alt="lottle-img">
      <form class="lottle-info">
        <input type="text" class="hotel-textbox" disabled value="{{$hotelList[0]->hotel_name}}"><br>
        <input type="text" class="hotel-textbox" disabled value="{{$hotelList[0]->description}}"><br>
        <input type="text" class="hotel-textbox" disabled value="{{$hotelList[0]->phone}}"><br>
        <textarea class="hotel-textbox" rows="4" cols="20" disabled>{{$hotelList[0]->location}}</textarea>
      </form>
    </div>
    <div class="hotel clearfix">
      <img class="novotel-img" src="{{ asset('image/Novotel.jpg') }}" alt="novotel-img">
      <form class="novotel-info">
        <input type="text" class="hotel-textbox" disabled value="{{$hotelList[1]->hotel_name}}"><br>
        <input type="text" class="hotel-textbox" disabled value="{{$hotelList[1]->description}}"><br>
        <input type="text" class="hotel-textbox" disabled value="{{$hotelList[1]->phone}}"><br>
        <textarea class="hotel-textbox" rows="4" cols="20" disabled>{{$hotelList[1]->location}}</textarea>
      </form>
    </div>
    <div class="hotel">
      <img class="sedona-img" src="{{ asset('image/Sedona.jpg') }}" alt="sedona-img">
      <form class="sedona-info">
        <input type="text" class="hotel-textbox" disabled value="{{$hotelList[2]->hotel_name}}"><br>
        <input type="text" class="hotel-textbox" disabled value="{{$hotelList[2]->description}}"><br>
        <input type="text" class="hotel-textbox" disabled value="{{$hotelList[2]->phone}}"><br>
        <textarea class="hotel-textbox" rows="4" cols="20" disabled>{{$hotelList[2]->location}}</textarea>
      </form>
    </div>
  </div>
</div>
@endsection