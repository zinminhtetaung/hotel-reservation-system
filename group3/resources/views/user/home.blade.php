@extends('userlayouts.app')
@section ('content')
<div class="header">
  <div class="header-in clearfix">
    <h1 class="logo"> 
      <a href=""><img src="{{ asset('image/logo.jpeg') }}" alt="logo"></a>
    </h1>
    @if (Auth::user())
      <a class="back" href="{{route('reservationList')}}">
        <img src="{{ asset('image/l_arrow.png') }}"> Back to Dashboard</a>
    @endif
    <ul class="nav">
      <li><a href="{{route('home')}}" class="active">Home</a></li>
      <li><a href="{{route('hotelview')}}">Hotel</a></li>
      <li> <a href="{{route('roomuserview')}}">Room</a></li>
      <li><a href="{{url('/loginuser')}}">Login</a></li>
    </ul>
  </div>
</div>
<div class="home-content1 clearfix">
  <img class="homecnt1-img" src="{{ asset('image/novotel_view.jpg')}}" alt="home-img">
  <div class=" home-img ">
    <div class="container clearfix">
      <div class="card1">
        <img class="homehotel-img" src="{{asset('image/Lotte.jpeg')}}" alt="lottle">
        <p>Lotte</p>
      </div>
      <div class="card2">
        <img class="homehotel-img" src="{{asset('image/Novotel.jpg')}}" alt="novotel">
        <p>Novotel</p>
      </div>
      <div class="card3">
        <img class="homehotel-img" src="{{asset('image/Sedona.jpg')}}" alt="sedona">
        <p>Sedona</p>
      </div>
    </div>
    <a  onclick="topFun()" id="sctop"><img class="arrow-img" src="{{asset('image/uparrow.png')}}" alt="arrow"></a>
  </div>
</div>
<div class="home-content2">
  <div class="container clearfix">
    <h2>Popular Rooms</h2>
    @if(count($topRoomList)>0)
      @foreach ($topRoomList as $topRoom)    
        <div class="cnt2-card">
          <img src="{{asset('/storage/images/'.$topRoom->image)}}" alt="room">
          <p>{{$topRoom->room_number}}</p><br>
          <p>{{$topRoom->price}}</p><br>
          <p>{{$topRoom->room_type}}</p><br>
          <p>{{$topRoom->service}}</p><br>
        </div>

      @endforeach
      </div>
    @endif
  </div>
</div>
<div class="home-content3">
  <div class="container clearfix">
    <div class="map">
      <h2>CHOOSE HOTEL BY REGION</h2>
      <img src="{{asset('image/yangon_map.png')}}" alt="room">
    </div>
    <div class="reasons clearfix">
      <h2>REASONS TO BOOK WITH US</h2>
      <div class="cnt3-text1">
        <h3>Easy To Use</h3>
        <p>It's easy to learn and use the Hotel Reservation System Software.
          You're just click away from everything you need to run your business .
        </p>

      </div>
      <div class="cnt3-text2">
        <h3>Real-Time Booking</h3>
        <p>Upgrade from a request from to real-time online bookings from your website.
          No more back and forth emails.No double bookings .Work from anywhere.
        </p>

      </div>
      <div class="cnt3-text1">
        <h3>Monitoring</h3>
        <p>See your potential guest booking online in real-time,even before they finish. 
          Say hello to unique guest management; say goodbye to double bookings.
        </p>

      </div>
      <div class="cnt3-text2">
        <h3>Automated Emails</h3>
        <p>Its works day and night from anywhere,on any device. 
          It automatically sends immediate e-mail confirmations to you and your guest.
          So you can be productive and care-free right from the start.
        </p>
      </div>
    </div>
  </div>
</div>
@endsection