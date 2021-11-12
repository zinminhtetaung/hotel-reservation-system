@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">

  <!-- Current reservations -->
  @if (count($bookings) > 0)
  <div class="panel panel-default">
    <div class="panel-heading">
      Current bookings
    </div>

    <div class="panel-body">
      <table class="table table-bordered mt-5">
          <tr>
              <th>ID</th>
              <th>Customer Name</th>
              <th>Phone Number</th>
              <th>Email</th>
              <th>Room Id</th>
              <th>Number of Guest</th>
              <th>Check In</th>
              <th>Check Out</th>
              <th>Created at</th>
              <th>Updated at</th>
              <th>View Booking</th>
              <th>Delete Action</th>
          </tr>
          @foreach ($bookings as $booking)
          <tr>
              <td>{{ $booking->id }}</td>              
              <td>{{ $booking->customer_name }}</td>
              <td>{{ $booking->phone }}</td>
              <td>{{ $booking->email }}</td>
              <td>{{ $booking->room_id }}</td>
              <td>{{ $booking->number_of_guest}}</td>
              <td>{{ $booking->check_in }}</td>
              <td>{{ $booking->check_out }}</td>
              <td>{{ $booking->created_at }}</td>
              <td>{{ $booking->updated_at }}</td>
             <!-- Update Button -->
              <td>
              <form action="/view-booking/{{$booking->id}}" method="POST" >
              {{ csrf_field() }}
                <button type="submit" class="btn btn-success">
                  <i class="fa fa-btn fa-eye"></i>View
                </button>
              </form>
            </td>
              <!-- Delete Button -->
              <td>
              <form action="/delete-booking/{{$booking->id}}/{{$booking->room_id}}" method="POST" onSubmit="return confirm('Are you sure you want to delete?')">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">
                  <i class="fa fa-btn fa-trash"></i>Delete
                </button>
              </form>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endif
</div>

<!-- TODO: Current Bookings -->
@endsection