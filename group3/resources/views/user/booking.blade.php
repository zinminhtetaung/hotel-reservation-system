@extends('userlayouts.app')
@section ('content')
<div class="content1">
<div class="container ">
            <h2 class="booking-title">Online Booking</h2>
            <form class="booking-form " action="{{route('storebooking')}}" method="post"> 
            {{ csrf_field() }}
                 <label class="booking-label">Room Number</label>
                <input  class="text-box1" type="text" name="roomnumber" disabled  value="{{$rooms->id}}"><br>
                <label class="booking-label">Customer Name</label>
                <input  class="text-box2" type="text" name="customername"><br>
                <label class="booking-label">Email</label>
                <input  class="text-box3" type="text" name="email"><br>
                <label class="booking-label">Phone Number</label>
                <input class="text-box4" type="text" name="phonenumber"><br>
                <label class="booking-label">Number of guest</label>
                <input class="text-box5" type="text" name="guestno"><br>
                <label class="booking-label">Check In</label>
                 <input class="text-box6" type="date" name="checkin"><br>
                 <label class="booking-label">Check Out</label>
                 <input class="text-box7"  type="date" name="checkout"><br>
                 <button class="confirm-btn">Confirm</button>
            </form>
        </div>

</div>
@endsection