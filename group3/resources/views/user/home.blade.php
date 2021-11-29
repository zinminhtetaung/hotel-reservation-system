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
<div class="home-content1">
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
  </div>
</div>
<div class="home-content2">
  <div class="container clearfix">
    <h2>ROOM INFORMATION</h2>
    @if(count($roomList)>0)
    @for($i=0; $i < count($roomList); $i++) @if($i< 8) <div class="cnt2-img">
      <div class="cnt2-card">
        <img src="{{asset('/storage/images/'.$roomList[$i]->image)}}" alt="room">
        <p>{{$roomList[$i]->room_number}}</p>
      </div>
  </div>
  @endif
  @endfor
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
        <h3>AWESOME DESIGN</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste maiores neque perferendis
          consequuntur ratione molestias eveniet animi tempora quo!
        </p>

      </div>
      <div class="cnt3-text2">
        <h3>CAREFULLY HANDCRAFTED</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste maiores neque perferendis
          consequuntur ratione molestias eveniet animi tempora quo!
        </p>

      </div>
      <div class="cnt3-text1">
        <h3>FULLY RESPONSIVE</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste maiores neque perferendis
          consequuntur ratione molestias eveniet animi tempora quo!
        </p>

      </div>
      <div class="cnt3-text2">
        <h3>FULLY RESPONSIVE</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste maiores neque perferendis
          consequuntur ratione molestias eveniet animi tempora quo!
        </p>
      </div>
    </div>
  </div>
</div>
@endsection