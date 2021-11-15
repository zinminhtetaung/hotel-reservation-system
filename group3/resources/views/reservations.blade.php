@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
 <!-- Check Id and status -->
 <form action="/show-room" method="POST" class="form-horizontal">                                                   
    {{ csrf_field() }}
    <div class="form-group">
      <label for="room_number" class="col-sm-3 control-label">Room Number</label>
      <div class="col-sm-6">
        <input type="text" name="room_number" class="form-control"required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
      <button type="submit" class="btn btn-info">Check Room</button>
      </div>
    </div>
  </form>
  
  <!-- New reservation Form -->
  <form action="/reservation" method="POST" onSubmit="return confirm('Do you want to add this reservation?')" class="form-horizontal">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
    {{ csrf_field() }}

    <!-- reservation form -->
    <div class="form-group">
      <label for="room_id" class="col-sm-3 control-label">Room ID</label>
      <div class="col-sm-6">
        <input type="text" name="room_id" class="form-control"required>
      </div>
    </div>
    <div class="form-group">
      <label for="customer_name" class="col-sm-3 control-label">Customer Name</label>
      <div class="col-sm-6">
        <input type="text" name="customer_name" class="form-control"required>
      </div>
    </div>
    <div class="form-group">
      <label for="phone" class="col-sm-3 control-label">Phone</label>
      <div class="col-sm-6">
        <input type="text" name="phone" class="form-control" required>
      </div>
    </div>
    <div class="form-group">
      <label for="number_of_guest" class="col-sm-3 control-label">Number of guests</label>
      <div class="col-sm-6">
        <input type="number" min=0 name="number_of_guest" class="form-control" required>
      </div>
    </div>
    <div class="form-group">
      <label for="check_in" class="col-sm-3 control-label">Check In</label>
      <div class="col-sm-6">
        <input type="date" name="check_in" class="form-control"required>
      </div>
    </div>
    <div class="form-group">
      <label for="check_out" class="col-sm-3 control-label">Check Out</label>
      <div class="col-sm-6">
        <input type="date" name="check_out" class="form-control" required>
      </div>
    </div>
    
    <!-- Add reservation Button -->
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-plus"></i> Add reservation
        </button>
      </div>
    </div>
  </form>

 
  <!-- Current reservations -->
  @if (count($reservations) > 0)
  <div class="panel panel-default">
    <div class="panel-heading">
      Current reservations
    </div>

    <div class="panel-body">
      <table class="table table-bordered mt-5">
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
          @foreach ($reservations as $reservation)
          <tr>
              <td>{{ $reservation->id }}</td>              
              <td>{{ $reservation->customer_name }}</td>
              <td>{{ $reservation->phone }}</td>
              <td>{{ $reservation->room_id }}</td>
              <td>{{ $reservation->number_of_guest}}</td>
              <td>{{ $reservation->check_in }}</td>
              <td>{{ $reservation->check_out }}</td>
              <td>{{ $reservation->created_at }}</td>
              <td>{{ $reservation->updated_at }}</td>
         
            <!-- Delete Button -->
            <td>
              <form action="/reservation/{{ $reservation->id }}/{{ $reservation->room_id }}" method="POST" onSubmit="return confirm('Are you sure you want to delete?')">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">
                  <i class="fa fa-btn fa-trash"></i>Delete
                </button>
              </form>
              </td>
             <!-- Update Button -->
            <td>
              <form action="/update/{{ $reservation->id }}" method="POST" >
              {{ csrf_field() }}
                <button type="submit" class="btn btn-warning">
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

<!-- TODO: Current reservations -->
@endsection