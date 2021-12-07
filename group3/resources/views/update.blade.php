@extends('layouts.app')

@section('content')

<div class="body clearfix">
  <div class="wrap">
    <div class="content">
      <div class="card">
        <div class="card-header">Update Reservation</div>
        <div class="card-body">

        <form method="POST" onSubmit="return confirm('Do you want to update this reservation?')" class="add-form">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="reservation" class="input-ttl">Room ID</label>
            <div class="input-box">
              <input type="text" name="room_id" value="{{ $reservation->room_id }}" class="input-txt" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="customer_name" class="input-ttl">Customer Name</label>
            <div class="input-box">
              <input type="text" name="customer_name" value="{{ $reservation->customer_name }}" class="input-txt" required>
            </div>
          </div>
          <div class="form-group">
            <label for="phone" class="input-ttl">Phone</label>
            <div class="input-box">
              <input type="text" name="phone" value="{{ $reservation->phone}}" class="input-txt" required>
            </div>
          </div>
          <div class="form-group">
            <label for="number_of_guest" class="input-ttl">Number of guests</label>
            <div class="input-box">
              <input type="number" min=0 name="number_of_guest" value="{{ $reservation->number_of_guest }}" class="input-txt" required>
            </div>
          </div>
          <div class="form-group">
            <label for="check_in" class="input-ttl">Check In</label>
            <div class="input-box">
              <input type="date" name="check_in" value="{{ $reservation->check_in }}" class="input-txt" required>
            </div>
          </div>
          <div class="form-group">
            <label for="check_out" class="input-ttl">Check Out</label>
            <div class="input-box">
              <input type="date" name="check_out" value="{{ $reservation->check_out }}" class="input-txt" required>
            </div>
          </div>
          <div class="form-group">
              <button type="submit" class="btn upd-btn">
                <i class="fa fa-btn fa-pencil-alt"></i> Edit
              </button>
              <a href="{{route('reservationList')}}" onclick="return confirm('Are you sure to exit')" class="btn check-btn">Cancel</a>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection