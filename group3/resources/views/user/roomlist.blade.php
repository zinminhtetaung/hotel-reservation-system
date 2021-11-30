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
      <li><a href="{{route('home')}}">Home</a></li>
      <li><a href="{{route('hotelview')}}">Hotel</a></li>
      <li> <a href="{{route('roomuserview')}}" class="active">Room</a></li>
      @if (!Auth::user())
        <li><a href="{{route('login')}}">Login</a></li>
      @endif 
    </ul>
  </div>
</div>
</div>
<div class="viewcontent">
  <img class="view-img" src="{{ asset('image/room-image.png') }}" alt="hotel-img">
  <div class="container clearfix">
    <div class=" view ">
      <a class="view-btn" href="{{route('hotelview')}}">View Hotel</a>
    </div>
  </div>
</div>
<div class="room-content1">
  <div class="container clearfix">
    <div class="room-title">
      <h2 class="roominfo-ttl">Room Information</h2>
    </div>
  </div>
  <a  onclick="topFun()" id="sctop"><img class="arrow-img" src="{{asset('image/uparrow.png')}}" alt="arrow"></a>
  @foreach($roomList as $room)

  <div class="room clearfix">
    <img class="novoroom1-img" src="{{asset('/storage/images/'.$room->image)}}" alt="room1-img">
    <table class="room1-info">
      <tr>
        <td class="td1">Hotel Name:</td>
        <td class="td2">{{$room->hotel_name}}</td>
      </tr>
      <tr>
        <td class="td1">Room No:</td>
        <td class="td2">{{$room->room_number}}</td>
      </tr>
      <tr>
        <td class="td1">Room Type:</td>
        <td class="td2">{{$room->room_type}}</td>
      </tr>
      <tr>
        <td class="td1">Services:</td>
        <td class="td2">{{$room->service}}</td>
      </tr>
      <tr>
        <td class="td1">Price:</td>
        <td class="td2">{{$room->price}}</td>
      </tr>
      <tr>
        <td class="td1">Status:</td>
        <td class="td2">{{$room->status}}</td>
      </tr>
      @if($room->status == "Available")
      <tr>
        <td colspan="2">
          <a href="{{route('booking.create',$room->id)}}">
            <button type="submit" class="booking-btn">Booking</button>
          </a>
        </td>
      </tr>
      @endif
    </table>
  </div>
  @endforeach
  {{$roomList->links()}}
</div>
@endsection