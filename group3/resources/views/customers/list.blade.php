@extends('layouts.app')

@section('content')
<h1 class="head">CUSTOMER INFORMATION</h1>

<script src="{{ asset('js/room-list.js') }}"></script>

<div class="body clearfix">
  <div class="wrap">
    <div class="content">
      <!-- Display Validation Errors -->
      @include('common.errors')

      <!-- Customer Name -->
      <form action="{{ route('custName') }}" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="text" name="customer_name" class="search-txt" placeholder="customer name">
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search
          </button>
        </div>
      </form>

      <!-- Phone Number -->
      <form action="{{ route('phNo')}}" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="text" name="phone" class="search-txt" placeholder="phone number">
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search
          </button>
        </div>
      </form>

      <!-- Check_In time -->
      <form action="{{ route('checkIn')}}" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="date" name="check_in" class="search-txt" placeholder="check_in time">
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search by Check_in
          </button>
        </div>
      </form>

      <!-- Check_out time -->
      <form action="{{ route('checkOut')}}" method="POST" class="form-search">
        {{ csrf_field() }}
        <div class="search-form">
          <input type="date" name="check_out" class="search-txt" placeholder="check_out time">
          <button type="submit" class="btn search-btn">
            <i class="fa fa-search"></i> Search by Check_out
          </button>
        </div>
      </form>

      <!-- Result customers -->
      <div class="card">
        <div class="card-header">{{ __('Customer Record') }}</div>
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
                </tr>
              </thead>
              <tbody class="tbody">
                @foreach ($custInfo as $customer)
                <tr>
                  <td>{{ $customer->id }}</td>
                  <td>{{ $customer->customer_name }}</td>
                  <td>{{ $customer->phone }}</td>
                  <td>{{ $customer->room_id }}</td>
                  <td>{{ $customer->number_of_guest}}</td>
                  <td>{{ date('d/m/Y', strtotime($customer->check_in)) }}</td>
                  <td>{{ date('d/m/Y', strtotime($customer->check_out)) }}</td>
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