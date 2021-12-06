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

    <form class="booking-form " action="{{route('booking.store')}}" method="post">
      {{ csrf_field() }}
      <div class="bookingform-gp">
        <label>Room Number</label>
        <div class="text-box">
          <input class="txt-box" type="text" name="room_id" readonly="readonly" value="{{$rooms->id}}">
        </div>
      </div>
      <div class="bookingform-gp">
        <label>Status</label>
        <div class="text-box">
          <input class="txt-box" type="text" name="status" readonly="readonly" value="{{$rooms->status}}"><br>
        </div>
      </div>
      <div class="bookingform-gp">
        <label>Customer Name</label>
        <div class="text-box">
          <input class="txt-box" type="text" name="customername" required><br>
        </div>
      </div>
      <div class="bookingform-gp">
        <label>Email</label>
        <div class="text-box">
          <input class="txt-box" type="email" name="email"><br>
        </div>
      </div>
      <div class="bookingform-gp">
        <label>Phone Number</label>
        <div class="text-box">
          <input class="txt-box" type="text" name="phonenumber" required><br>
        </div>
      </div>
      <div class="bookingform-gp">
        <label>Number of guest</label>
        <div class="text-box">
          <input class="txt-box" type="number" name="guestno" required><br>
        </div>
      </div>
      <div class="bookingform-gp">
        <label>Check In</label><br>
        <div class="text-box">
          <input class="text-box1" type="date" name="checkin" required><br>
        </div>
      </div>
      <div class="bookingform-gp">
        <label>Check Out</label><br>
        <div class="text-box">
          <input class="text-box1" type="date" name="checkout" required><br>
        </div>
      </div>
      <button class="confirm-btn">Confirm</button><br>

    </form>

  </div>

</div>
@endsection