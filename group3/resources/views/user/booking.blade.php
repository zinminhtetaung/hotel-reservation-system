@extends('userlayouts.app')
@section ('content')

<div class="booking-content1">
  <div class="container ">
    <a href="{{route('roomuserview')}}">Back</a>
    <!-- Display Validation Errors -->
    @include('common.errors')
    <h2 class="booking-title">Online Booking</h2>
    <div class="error-box">
      @if (Session::has('status available'))
      {{Session::get('status available')}}
      @endif
    </div>

    <form class="booking-form " action="{{route('storebooking')}}" method="post">
      {{ csrf_field() }}
      <label class="booking-label">Room Number</label>
      <input class="text-box1" type="text" name="room_id" readonly="readonly" value="{{$rooms->id}}"><br>
      <label class="booking-label">Status</label>
      <input class="text-box2" type="text" name="status" readonly="readonly" value="{{$rooms->status}}"><br>
      <label class="booking-label">Customer Name</label>
      <input class="text-box3" type="text" name="customername" required><br>
      <label class="booking-label">Email</label>
      <input class="text-box4" type="text" name="email" require><br>

      <label class="booking-label">Phone Number</label>
      <input class="text-box5" type="text" name="phonenumber" required><br>
      <label class="booking-label">Number of guest</label>
      <input class="text-box6" type="text" name="guestno" required><br>
      <label class="booking-label">Check In</label>
      <input class="text-box7" type="date" name="checkin" required><br>
      <label class="booking-label">Check Out</label>
      <input class="text-box8" type="date" name="checkout" required><br>
      <button class="confirm-btn">Confirm</button><br>

    </form>

  </div>

</div>
@endsection