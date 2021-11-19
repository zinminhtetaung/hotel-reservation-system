@extends('layouts.app')

@section('content')

<script src="{{ asset('js/room-list.js') }}"></script>

<div class="body clearfix">
  <div class="wrap">
    <div class="content">
      <!-- Display Validation Errors -->
      @include('common.errors')

      <!-- Search by RoomID -->
      <form action="/searchRID" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="text" name="room_id" class="search-txt" placeholder="search by roomID">
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search by Room
          </button>
        </div>
      </form>

      <!-- Search by Customer Name -->
      <form action="/searchCustomer" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="text" name="customer_name" class="search-txt" placeholder="search by customer name">
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search by Customer Name
          </button>
        </div>
      </form>

      <!-- Search by Phone Number -->
      <form action="/searchPhNo" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="text" name="phone" class="search-txt" placeholder="search by phone number">
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search by Phone Number
          </button>
        </div>
      </form>

      <!-- Search by Number of Guest -->
      <form action="/searchGuest" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="number" min=0 name="number_of_guest" class="search-txt" placeholder=" search by Number of Guest">
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search by Number of Guest
          </button>
        </div>
      </form>

      <!-- Search by Check_In time -->
      <form action="/searchCheckIn" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="date" name="check_in" class="search-txt" placeholder="search by check_in time">
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search by Check_In time
          </button>
        </div>
      </form>

      <!-- Search by Check_out time -->
      <form action="/searchCheckout" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="date" name="check_out" class="search-txt" placeholder="search by check_out time">
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search by Check_out time
          </button>
        </div>
      </form>

      <!-- Search by Created time -->
      <!-- <form action="/searchCheckout" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="date" name="start_date" class="search-txt">
        </div>
        <input type="date" name="end_date" class="search-txt">
        <button type="submit" class="btn search-btn">
          <i class="fa fa-search"></i> Search by Created time
        </button>
      </form> -->

      <!-- Result reservations -->
      <div class="card">
        <div class="card-header">{{ __('Search results') }}</div>
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
                  <form action="/search/{{ $reservation->id }}/{{ $reservation->room_id }}" method="POST" onSubmit="return confirm('Are you sure you want to delete?')">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn del-btn">
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
    </div>
  </div>
  @endsection