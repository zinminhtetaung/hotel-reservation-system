@extends('layouts.app')

@section('content')

<div class="body clearfix">
  <div class="wrap">
    <div class="content">
      <div class="card">
        <div class="card-header">{{ __('Update Room') }}</div>
        <div class="card-body">

          @if ($errors->any())
          <div class="alert alert-danger">
            There were some problems with your input.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form action="/updateRoom/{{ $roomList->id }}" method="POST" onSubmit="return confirm('Do you want to update this room?')" class="add-form">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="room" class="input-ttl">Hotel Name</label>
              <div class="input-box">
                <select name="hotel_name" class="select-box">
                  @foreach ($hotels as $hotel)
                  <option value="{{$hotel->hotel_name}}">&nbsp; {{$hotel->hotel_name}} &nbsp;</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="room_number" class="input-ttl">Room number</label>
              <div class="input-box">
                <input type="text" min=0 name="room_number" class="input-txt" value="{{$roomList->room_number }}">
              </div>
            </div>
            <div class="form-group">
              <label for="room_type" class="input-ttl">Room Type</label>
              <div class="input-box">
                <input type="text" name="room_type" class="input-txt" value="{{ $roomList->room_type }}">
              </div>
            </div>
            <div class="form-group">
              <label for="service" class="input-ttl">Service</label>
              <div class="input-box">
                <input type="text" name="service" class="input-txt" value="{{ $roomList->service }}">
              </div>
            </div>
            <div class="form-group">
              <label for="price" class="input-ttl">Price</label>
              <div class="input-box">
                <input type="integer" name="price" class="input-txt" value="{{ $roomList->price }}">
              </div>
            </div>
            <div class="form-group">
              <label for="status" class="input-ttl">Status</label>
              <div class="input-box">
                <input type="text" name="status" class="input-txt" value="{{ $roomList->status }}">
              </div>
            </div>
            <div class="form-group">
              <label for="old-image" class="input-ttl">{{ __('Old Image') }}</label>
              <div class="input-box">
                <img class="preview-image" src="{{asset('/storage/images/'.$roomList->image)}}" />
              </div>
            </div>
            <div class="form-group">
              <label class="input-ttl">{{ __('New Image') }}</label>
              <div class="input-box">
                <input type="file" class="image input-txt" name="image" autocomplete="image" required />
              </div>
            </div>
            <div class="col-sm-12  text-center">
              <button type="submit" class="btn upd-btn">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection