@extends('userlayouts.app')
@section ('content')

<div class="header">
    <div class="container">
     <div class="header-in clearfix">
           <h1 class="logo"> <a href=""><img src="{{ asset('image/logo.jpeg') }}" alt="logo"></a></h1> 
           <ul class="nav">
               <li><a href="{{url('/')}}">Home</a></li>
             <li><a href="{{route('hotelview')}}" >Hotel</a></li>
              <li> <a href="{{route('roomuserview')}}" class="active">Room</a></li>
               <li><a href="">Login</a></li>
           </ul>
     </div>
    </div>
</div>
<div class="viewcontent">
       <div class="container clearfix">
       <div class="roomcnt1-img clearfix">
       <img class="larrow-img" src="{{ asset('image/Left arrow.png') }}" alt="arrow-img">
       <img class="view-img" src="{{ asset('image/Novotel_double.jpg') }}" alt="room-img">
       <img class="rarrow-img" src="{{ asset('image/Right arrow.png') }}" alt="arrow-img">
       </div> 
       <div class=" view ">
       <a class="view-btn" href="#">View Room</a>
       </div>
</div>
</div>
<div class="content1">
    <div class="container clearfix">
        <div class="room-title">
            <h2 class="roominfo-ttl">Room Information</h2>
        </div>
    </div>
        @foreach($roomList as $room)
        <div class="room clearfix">
        <img class="novoroom1-img" src="{{asset('/storage/images/'.$room->image)}}" alt="room1-img">
       <table class="room1-info">
           <tr>
               <td>Hotel ID:</td>
               <td>{{$room->hotel_id}}</td>
           </tr>
           <tr>
               <td>Room No:</td>
               <td>{{$room->room_number}}</td>
           </tr>
           <tr>
               <td>Room Type:</td>
               <td>{{$room->room_type}}</td>
           </tr>
           <tr>
               <td>Services:</td>
               <td>{{$room->service}}</td>
           </tr>
           <tr>
               <td>Price:</td>
               <td>{{$room->price}}</td>
           </tr>
           <tr>
               <td>Status:</td>
               <td>{{$room->status}}</td>
           </tr>
           <tr>
               <td colspan="2"><a href="{{route('createbooking',$room->id)}}">
                   <button type="submit" class="booking-btn">Booking</button>
                </a></tr></td>
       </table>
       
        </div>
      @endforeach 
        
</div>



@endsection