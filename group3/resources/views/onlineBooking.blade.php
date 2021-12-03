@extends('layouts.app')

@section('content')

<script src="{{ asset('js/room-list.js') }}"></script>
<h1 class="head">ONLINE BOOKING</h1>
<div class="body clearfix">
  @if ($notification = Session::get('success'))
  <div class="alert-success">
    <strong>{{ $notification }}</strong>
  </div>
  @endif
  <div class="wrap">
    <div class="content">
      <!-- Current reservations -->
      <div class="card">
        <div class="card-header">Current bookings</div>
        <div class="card-body">
          <div style="overflow-x:auto;">
            <table class="table dataTable no-footer" id="room-list">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Customer Name</th>
                  <th>Phone Number</th>
                  <th>Email</th>
                  <th>Room Id</th>
                  <th>Number of Guest</th>
                  <th>Check In</th>
                  <th>Check Out</th>
                  @if (Auth::user()->role=='receptionist')
                  <th>View Booking</th>
                  <th>Delete Action</th>
                  @endif
                </tr>
              </thead>
              <tbody class="tbody">
              @if (count($bookings) > 0)
                @foreach ($bookings as $booking)
                <tr>
                  <td>{{ $booking->id }}</td>
                  <td>{{ $booking->customer_name }}</td>
                  <td>{{ $booking->phone }}</td>
                  <td>{{ $booking->email }}</td>
                  <td>{{ $booking->room_id }}</td>
                  <td>{{ $booking->number_of_guest}}</td>
                  <td>{{ date('d/m/Y', strtotime($booking->check_in)) }}</td>
                  <td>{{ date('d/m/Y', strtotime($booking->check_out)) }}</td>
                  <!-- Update Button -->
                  @if (Auth::user()->role=='receptionist')
                  <td>
                    <a type="button" class="btn btn-primary" href="/booking/{{$booking->id}}">View</a>

                  </td>
                  <!-- Delete Button -->
                  <td>
                    <form action="/booking/{{$booking->id}}/{{$booking->room_id}}" method="POST" onSubmit="return confirm('Are you sure you want to delete?')">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn del-btn">
                        <i class="fa fa-btn fa-trash"></i>Delete
                      </button>
                    </form>
                  </td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>

<!-- TODO: Current Bookings -->
@endsection