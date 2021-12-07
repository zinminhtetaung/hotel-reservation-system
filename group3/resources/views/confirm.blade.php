@extends('layouts.app')

@section('content')
<h1 class="head">Online Booking Confirm</h1>
<div class="body clearfix">
  <div class="wrap">
    <div class="content">
      <div class="card">
        <div class="card-header">Online Booking Details</div>
        <div class="card-body">
          <form method="POST" onSubmit="return confirm('Do you want to add this booking?')" class="add-form">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $booking->id }}">
            <div class="form-group">
              <label for="booking" class="input-ttl">Room ID</label>
              <div class="input-box">
                <input type="text" name="room_id" value="{{ $booking->room_id }}" class="input-txt">
              </div>
            </div>
            <div class="form-group">
              <label for="customer_name" class="input-ttl">Customer Name</label>
              <div class="input-box">
                <input type="text" name="customer_name" value="{{ $booking->customer_name }}" class="input-txt">
              </div>
            </div>
            <div class="form-group">
              <label for="phone" class="input-ttl">Phone</label>
              <div class="input-box">
                <input type="text" name="phone" value="{{ $booking->phone}}" class="input-txt">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="input-ttl">Email</label>
              <div class="input-box">
                <input type="text" name="email" value="{{ $booking->email}}" class="input-txt">
              </div>
            </div>
            <div class="form-group">
              <label for="number_of_guest" class="input-ttl">Number of guests</label>
              <div class="input-box">
                <input type="number" min=0 name="number_of_guest" value="{{ $booking->number_of_guest }}" class="input-txt">
              </div>
            </div>
            <div class="form-group">
              <label for="check_in" class="input-ttl">Check In</label>
              <div class="input-box">
                <input type="date" name="check_in" value="{{ $booking->check_in }}" class="input-txt">
              </div>
            </div>
            <div class="form-group">
              <label for="check_out" class="input-ttl">Check Out</label>
              <div class="input-box">
                <input type="date" name="check_out" value="{{ $booking->check_out }}" class="input-txt">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 input-box">
                <button type="submit" class="btn upd-btn"> Confirm</button>
              <a href="{{route('onlineBookingList')}}" class="btn check-btn" onclick="return confirm('Are you sure to exit')">Cancel</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection