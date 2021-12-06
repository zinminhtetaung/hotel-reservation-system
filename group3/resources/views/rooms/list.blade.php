@extends('layouts.app')

@section('content')
<!-- Script -->
<script src="{{ asset('js/room-list.js') }}"></script>
<h1 class="head">ROOM INFORMATION</h1>
<div class="body clearfix">
  <div class="wrap">
    <div class="content">
      <!-- Display Validation Errors -->
      @include('common.errors')

      <!-- New reservation Form -->

      @if (Auth::user()->role=='manager')
      <form action="{{ route('create.room') }}" method="POST" class="add-form" enctype="multipart/form-data">
        {{ csrf_field() }}

        <!-- reservation Name -->
        <div class="form-group">
          <label for="hotel_name" class="input-ttl required">Hotel name</label>
          <div class="input-box">
            <select name="hotel_name" class="select-box">
              <option class="select" value="">No hotel chosen</option>
              @foreach ($hotels as $hotel)
              <option class="select" value="{{$hotel->hotel_name}}"> {{$hotel->hotel_name}} </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="room_number" class="input-ttl required">Room number</label>
          <div class="input-box">
            <input type="text" min=0 name="room_number" class="input-txt" placeholder="L1,N1,S1">
          </div>
        </div>
        <div class="form-group">
          <label for="room_type" class="input-ttl required">Room Type</label>
          <div class="input-box">
            <select name="room_type" class="select-box">
              <option class="select" value="">No room chosen</option>
              <option class="select" value="Single">&nbsp; Single &nbsp;</option>
              <option class="select" value="Double">&nbsp; Double &nbsp;</option>
              <option class="select" value="Family">&nbsp; Family &nbsp;</option>
              <option class="select" value="Twins">&nbsp; Twins &nbsp;</option>
              <option class="select" value="Suite">&nbsp; Suite &nbsp;</option>
              <option class="select" value="Premiere">&nbsp; Premiere &nbsp;</option>
              <option class="select" value="King Suite">&nbsp; King Suite &nbsp;</option>
              <option class="select" value="Presidential suite">&nbsp; Presidential suite &nbsp;</option>
              <option class="select" value="Queen Suite">&nbsp; Queen Suite &nbsp;</option>
              <option class="select" value="Deluxe suite">&nbsp; Deluxe suite &nbsp;</option>
              <option class="select" value="Juinior suite">&nbsp; Juinior suite &nbsp;</option>
              <option class="select" value="Executive double">&nbsp; Executive double &nbsp;</option>
              <option class="select" value="Premier">&nbsp; Premier &nbsp;</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="service" class="input-ttl required">Service</label>
          <div class="input-box">
            <select name="service" class="select-box">
              <option class="select" value="">No service chosen</option>
              <option class="select" value="Breakfast free">&nbsp; Breakfast free &nbsp;</option>
              <option class="select" value="Breakfast free & pool usage">&nbsp; Breakfast free & pool usage &nbsp;</option>
              <option class="select" value="Breakfast free, gym & pool usage">&nbsp; Breakfast free, gym & pool usage &nbsp;</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="price" class="input-ttl required">Price</label>
          <div class="input-box">
            <input type="integer" name="price" class="input-txt">
          </div>
        </div>
        <div class="form-group">
          <label for="status" class="input-ttl required">Status</label>
          <div class="input-box">
            <select name="status" class="select-box">
              <option class="select" value="">No status chosen</option>
              <option class="select" value="Available">&nbsp; Available &nbsp;</option>
              <option class="select" value="Not Available">&nbsp; Not Available &nbsp;</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="input-ttl required">{{ __('Image') }}</label>
          <div class="input-box">
            <label class="img-lable" for="upload">Upload an image</label>
            <input type="file" class="image input-img" name="image" id="upload" />
          </div>
        </div>

        <!-- Add reservation Button -->
        <div class="form-group">
          <button type="submit" onSubmit="return confirm('Do you want to add this reservation?')" class="btn add-btn">
            <i class="fa fa-plus"></i> Add Room
          </button>
        </div>
        @endif
      </form>
      <div class="card">
        <div class="card-header">{{ __('Room Information') }}</div>
        <div class="card-body">
          <div style="overflow-x:auto;">
            <table class="table" id="room-list">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Hotel ID</th>
                  <th>Room Number</th>
                  <th>Room Type</th>
                  <th>Service</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Image</th>
                  @if (Auth::user()->role=='manager')
                  <th>Operation1</th>
                  <th>Operation2</th>
                  @endif
                </tr>
              </thead>
              <tbody class="tbody">
                @foreach ($roomList as $room)
                <tr>
                  <td>{{$room->id}}</td>
                  <td>{{$room->hotel_id}}</td>
                  <td>
                    <a class="room_number" onclick="showRoomDetail({{json_encode($room)}})" data-toggle="modal" data-target="#room-detail-popup">{{$room->room_number}}</a>
                  </td>
                  <td>{{$room->room_type}}</td>
                  <td>{{$room->service}}</td>
                  <td>{{$room->price}}</td>
                  <td>{{$room->status}}</td>

                  <td><img height="50px" width="75px" src="{{asset('/storage/images/'.$room->image)}}" /></td>
                  @if (Auth::user()->role=='manager')
                  <td>
                    <form method="POST" action="/rooms/{{ $room->id }}/delete" onSubmit="return confirm('Are you sure you want to delete?')">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn del-btn">Delete</button>
                    </form>
                  </td>

                  <!-- Update Button -->
                  <td>
                    <a type="button" class="btn btn-primary" href="/rooms/{{ $room->id }}/update">Update</a>
                  </td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="modal fade" id="room-detail-popup" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">{{ __('Room Detail') }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="room-detail">
                  <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-6">
                      <div class="row">
                        <label class="col-md-3 text-md-left">{{ __('Hotel ID') }}</label>
                        <label class="col-md-9 text-md-left">
                          <i class="profile-text" id="hotel-id"></i>
                        </label>
                      </div>
                      <div class="row">
                        <label class="col-md-3 text-md-left">{{ __('Room Number') }}</label>
                        <label class="col-md-9 text-md-left">
                          <i class="profile-text" id="room-number"></i>
                        </label>
                      </div>
                      <div class="row">
                        <label class="col-md-3 text-md-left">{{ __('Room Type') }}</label>
                        <label class="col-md-9 text-md-left">
                          <i class="profile-text" id="room-type"></i>
                        </label>
                      </div>
                      <div class="row">
                        <label class="col-md-3 text-md-left">{{ __('Service') }}</label>
                        <label class="col-md-9 text-md-left">
                          <i class="profile-text" id="service"></i>
                        </label>
                      </div>
                      <div class="row">
                        <label class="col-md-3 text-md-left">{{ __('Price') }}</label>
                        <label class="col-md-9 text-md-left">
                          <i class="profile-text" id="price"></i>
                        </label>
                      </div>
                      <div class="row">
                        <label class="col-md-3 text-md-left">{{ __('Status') }}</label>
                        <label class="col-md-9 text-md-left">
                          <i class="profile-text" id="status"></i>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection