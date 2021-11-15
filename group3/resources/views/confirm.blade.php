@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="text-center">
      <h2>Online Booking Details</h2>
    </div>
  </div>
</div>


<form action="/confirm-booking" method="POST"  class="form-horizontal">
  {{ csrf_field() }}

  <input type="hidden" name="id" value="{{ $booking->id }}">

  <div class="form-group">
    <label for="booking" class="col-sm-3 control-label">Room ID</label>
    <div class="col-sm-6">
      <input type="text" name="room_id" value="{{ $booking->room_id }}" class="form-control">
    </div>
  </div>
  <div class="form-group">
      <label for="customer_name" class="col-sm-3 control-label">Customer Name</label>
      <div class="col-sm-6">
        <input type="text" name="customer_name" value="{{ $booking->customer_name }}" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label for="phone" class="col-sm-3 control-label">Phone</label>
      <div class="col-sm-6">
        <input type="text" name="phone" value="{{ $booking->phone}}" class="form-control" >
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Email</label>
      <div class="col-sm-6">
        <input type="text" name="email" value="{{ $booking->email}}" class="form-control" >
      </div>
    </div>
    <div class="form-group">
      <label for="number_of_guest" class="col-sm-3 control-label">Number of guests</label>
      <div class="col-sm-6">
        <input type="number" min=0 name="number_of_guest" value="{{ $booking->number_of_guest }}" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label for="check_in" class="col-sm-3 control-label">Check In</label>
      <div class="col-sm-6">
        <input type="date" name="check_in" value="{{ $booking->check_in }}" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label for="check_out" class="col-sm-3 control-label">Check Out</label>
      <div class="col-sm-6">
        <input type="date" name="check_out" value="{{ $booking->check_out }}" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-info"> Confirm</button>
        <a href="/onlineBooking" class="btn btn-danger">Cancel</a>
      </div>
    </div>
</form>

@endsection