@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
  <!-- Current reservations -->
  @if ($room)
  <div class="panel panel-default">
    <div class="panel-heading">
      Room Information
    </div>

    <div class="panel-body">
      <table class="table table-bordered mt-5">
          <tr>
              <th>ID</th>
              <th>Room Number</th>
              <th>Status</th>
          </tr>
          
          <tr>
              <td> <input type="text" class="js-copytextarea" name="myInput" value="{{ $room->id }}">
              <button class="js-textareacopybtn" style="vertical-align:top;">Copy ID</button>              
              </td>   
              <td>{{ $room->room_number }}</td>   
              <td>{{ $room->status }}</td>                         
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  @endif
  <a href="/" class="btn btn-info">Create Reservation</a>
</div>
@endsection