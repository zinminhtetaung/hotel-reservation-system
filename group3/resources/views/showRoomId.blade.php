@extends('layouts.app')

@section('content')

<!-- Styles -->
<link href="{{ asset('css/lib/jquery.dataTables.min.css') }}" rel="stylesheet">

<!-- Script -->
<script src="{{ asset('js/lib/jquery.dataTables.min.js') }}"></script>

<div class="body clearfix">
  <div class="wrap">
    <div class="content">
      <!-- Results -->
      <div class="card">
        <div class="card-header">{{ __('Search results') }}</div>
        <div class="card-body">
          <div style="overflow-x:auto;">
            <table class="table" id="room-list">
              <thead>
                <tr>
                  <th class="t-head">ID</th>
                  <th class="t-head">Room Number</th>
                  <th class="t-head">Status</th>
                </tr>
              </thead>

              <tbody class="tbody">
                @if ($room)
                @foreach ($room as $room)
                <tr>
                  <td> <input type="text" class="js-copytextarea copy-txt" name="myInput" value="{{ $room->id }}">
                    <button class="js-textareacopybtn copy-btn" style="vertical-align:top;">Copy ID</button>
                  </td>
                  <td>{{ $room->room_number }}</td>
                  <td>{{ $room->status }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        @endif
      </div>

    </div>
    <a href="{{ route('reservationList')}}" class="btn copy-btn">Back to Reservation</a>
  </div>
</div>
<script src="{{ asset('js/room-list.js') }}"></script>
@endsection