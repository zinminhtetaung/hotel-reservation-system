@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="text-center">
      <h2>Update User</h2>
      <h2>Update Reservation</h2>
    </div>
  </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif


<form action="/updateReservation/{{ $reservation->id }}" method="POST" onSubmit="return confirm('Do you want to update this reservation?')" class="form-horizontal">
  {{ csrf_field() }}

  <div class="form-group">
    <label for="reservation" class="col-sm-3 control-label">Room ID</label>
    <div class="col-sm-6">
      <input type="text" name="room_id" value="{{ $reservation->room_id }}" class="form-control"disabled>
    </div>
  </div>
  <div class="form-group">
      <label for="customer_name" class="col-sm-3 control-label">Customer Name</label>
      <div class="col-sm-6">
        <input type="text" name="customer_name" value="{{ $reservation->customer_name }}" class="form-control"required>
      </div>
    </div>
    <div class="form-group">
      <label for="phone" class="col-sm-3 control-label">Phone</label>
      <div class="col-sm-6">
        <input type="text" name="phone" value="{{ $reservation->phone}}" class="form-control" required>
      </div>
    </div>
    <div class="form-group">
      <label for="number_of_guest" class="col-sm-3 control-label">Number of guests</label>
      <div class="col-sm-6">
        <input type="number" min=0 name="number_of_guest" value="{{ $reservation->number_of_guest }}" class="form-control" required>
      </div>
    </div>
    <div class="form-group">
      <label for="check_in" class="col-sm-3 control-label">Check In</label>
      <div class="col-sm-6">
        <input type="date" name="check_in" value="{{ $reservation->check_in }}" class="form-control"required>
      </div>
    </div>
    <div class="form-group">
      <label for="check_out" class="col-sm-3 control-label">Check Out</label>
      <div class="col-sm-6">
        <input type="date" name="check_out" value="{{ $reservation->check_out }}" class="form-control" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-warning">
          <i class="fa fa-btn fa-pencil-alt"></i> Edit reservation
        </button>
      </div>
    </div>
</form>

@endsection