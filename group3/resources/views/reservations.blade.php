@extends('layouts.app')

@section('content')

<script src="{{ asset('js/room-list.js') }}"></script>

<div class="body clearfix">
  <div class="wrap">
    <div class="content">
      <!-- Display Validation Errors -->
      @include('common.errors')
      <!-- Check Id and status -->
      <form action="/show-room" method="POST" class="add-form">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="room_number" class="input-ttl">Room Number</label>
          <div class="input-box">
            <input type="text" name="room_number" class="input-txt" required>
          </div>
        </div>
        <div class="form-group">
          <div class="input-box">
            <button type="submit" class="btn check-btn">Check Room</button>
          </div>
        </div>
      </form>

      <!-- New reservation Form -->
      <form action="/reservation" method="POST" onSubmit="return confirm('Do you want to add this reservation?')" class="add-form">
        {{ csrf_field() }}

        <!-- reservation form -->
        <div class="form-group">
          <label for="room_id" class="input-ttl">Room ID</label>
          <div class="input-box">
            <input type="text" name="room_id" class="input-txt" required>
          </div>
        </div>
        <div class="form-group">
          <label for="customer_name" class="input-ttl">Customer Name</label>
          <div class="input-box">
            <input type="text" name="customer_name" class="input-txt" required>
          </div>
        </div>
        <div class="form-group">
          <label for="phone" class="input-ttl">Phone</label>
          <div class="input-box">
            <input type="text" name="phone" class="input-txt" required>
          </div>
        </div>
        <div class="form-group">
          <label for="number_of_guest" class="input-ttl">Number of guests</label>
          <div class="input-box">
            <input type="number" min=0 name="number_of_guest" class="input-txt" required>
          </div>
        </div>
        <div class="form-group">
          <label for="check_in" class="input-ttl">Check In</label>
          <div class="input-box">
            <input type="date" name="check_in" class="input-txt" required>
          </div>
        </div>
        <div class="form-group">
          <label for="check_out" class="input-ttl">Check Out</label>
          <div class="input-box">
            <input type="date" name="check_out" class="input-txt" required>
          </div>
        </div>

        <!-- Add reservation Button -->
        <div class="form-group">
            <button type="submit" class="btn add-btn">
              <i class="fa fa-plus"></i> Add reservation
            </button>
        </div>
      </form>


      <!-- Current reservations -->
      @if (count($reservations) > 0)
      <div class="card">
        <div class="card-header">Current reservations</div>
        <div class="card-body">
          <table class="table" id="room-list">
            <thead>
              <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Phone Number</th>
                <th>Room Id</th>
                <th>Number of Guest</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Delete Action</th>
                <th>Update Action</th>
              </tr>
            </thead>
            <tbody class="tbody">
            @foreach ($reservations as $reservation)
            <tr>
              <td>{{ $reservation->id }}</td>
              <td>{{ $reservation->customer_name }}</td>
              <td>{{ $reservation->phone }}</td>
              <td>{{ $reservation->room_id }}</td>
              <td>{{ $reservation->number_of_guest}}</td>
              <td>{{ $reservation->check_in }}</td>
              <td>{{ $reservation->check_out }}</td>
              <td>{{date('Y/m/d', strtotime($reservation->created_at))}}</td>
              <td>{{date('Y/m/d', strtotime($reservation->updated_at))}}</td>

              <!-- Delete Button -->
              <td>
                <form action="/reservation/{{ $reservation->id }}/{{ $reservation->room_id }}" method="POST" onSubmit="return confirm('Are you sure you want to delete?')">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn del-btn">
                    <i class="fa fa-btn fa-trash"></i>Delete
                  </button>
                </form>
              </td>
              <!-- Update Button -->
              <td>
                <form action="/update/{{ $reservation->id }}" method="POST">
                  {{ csrf_field() }}
                  <button type="submit" class="btn upd-btn">
                    <i class="fa fa-btn fa-pencil-alt"></i>Update
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
  </div>
</div>
<!-- TODO: Current reservations -->
@endsection