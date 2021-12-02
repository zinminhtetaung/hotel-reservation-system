@extends('layouts.app')

@section('content')
<h1 class="head">SEARCH FORM</h1>

<script src="{{ asset('js/room-list.js') }}"></script>

<div class="body clearfix">
  <div class="wrap">
    <div class="content">
      <!-- Display Validation Errors -->
      @include('common.errors')

      <!-- Search by RoomID -->
      <form action="{{ route('searchRID')}}" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="text" name="room_id" class="search-txt" placeholder="search by roomID">
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search
          </button>
        </div>
      </form>

      <!-- Search by Customer Name -->
      <form action="{{ route('searchCusNm')}}" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="text" name="customer_name" class="search-txt" placeholder="search by customer name">
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search 
          </button>
        </div>
      </form>

      <!-- Search by Phone Number -->
      <form action="{{ route('searchPhNo')}}" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="text" name="phone" class="search-txt" placeholder="search by phone number">
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search 
          </button>
        </div>
      </form>

      <!-- Search by Number of Guest -->
      <form action="{{ route('searchGNo')}}" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="number" min=0 name="number_of_guest" class="search-txt" placeholder=" search by Number of Guest">
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search 
          </button>
        </div>
      </form>

      <!-- Search by Check_In time -->
      <form action="{{ route('searchCheckIn')}}" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="date" name="check_in" class="search-txt" >
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search by Check_In time
          </button>
        </div>
      </form>

      <!-- Search by Check_out time -->
      <form action="{{ route('searchCheckOut')}}" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="date" name="check_out" class="search-txt">
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search by Check_out time
          </button>
        </div>
      </form>
      <!-- Result reservations -->
      <div class="card">
        <div class="card-header">{{ __('Search results') }}</div>
        <div class="card-body">
          <div style="overflow-x:auto;">
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
                  @if (Auth::user()->role=='receptionist')
                  <th>Delete Action</th>
                  @endif
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
                  <td>{{ date('d/m/Y', strtotime($reservation->check_in)) }}</td>
                  <td>{{ date('d/m/Y', strtotime($reservation->check_out)) }}</td>
                  <td>{{date('d/m/Y', strtotime($reservation->created_at))}}</td>
                  <td>{{date('d/m/Y', strtotime($reservation->updated_at))}}</td>
                  <!-- Delete Button -->
                  @if (Auth::user()->role=='receptionist')
                  <td>
                    <form action="/search/{{ $reservation->id }}/{{ $reservation->room_id }}" method="POST" onSubmit="return confirm('Are you sure you want to delete?')">
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
  @endsection