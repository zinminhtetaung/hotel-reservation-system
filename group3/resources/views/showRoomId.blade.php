@extends('layouts.app')

@section('content')

<!-- Styles -->
<link href="{{ asset('css/lib/jquery.dataTables.min.css') }}" rel="stylesheet">

<!-- Script -->
<script src="{{ asset('js/lib/jquery.dataTables.min.js') }}"></script>

<div class="body clearfix">
  <div class="wrap">
    <div class="content">
      <div class="card">
        <!-- Current reservations -->
        @if ($room)
        <div class="card-header">Room Information</div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th class="t-head">ID</th>
                <th class="t-head">Room Number</th>
                <th class="t-head">Status</th>
              </tr>
            </thead>

            <tbody class="tbody">
              <tr>
                <td> <input type="text" class="js-copytextarea copy-txt" name="myInput" value="{{ $room->id }}">
                  <button class="js-textareacopybtn copy-btn" style="vertical-align:top;">Copy ID</button>
                </td>
                <td>{{ $room->room_number }}</td>
                <td>{{ $room->status }}</td>
              </tr>
            </tbody>
          </table>
        </div>

        @endif
        <a href="/" class="btn copy-btn">Create Reservation</a>
      </div>
    </div>
  </div>
</div>
@endsection