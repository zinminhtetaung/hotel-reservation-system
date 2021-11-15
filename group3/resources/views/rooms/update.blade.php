@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="text-center">
      <h2>Update Room</h2>
    </div>
  </div>
</div>

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

<form action="/updateRoom/{{ $roomList->id }}" method="POST" onSubmit="return confirm('Do you want to update this room?')" class="form-horizontal">
  {{ csrf_field() }}

  <div class="form-group">
    <label for="room" class="col-sm-3 control-label">Hotel ID</label>
    <div class="col-sm-6">
      <select name="hotel_id" class="form-select ">
        @foreach ($hotels as $hotel)
          @if ($roomList->hotel_id == $hotel->id)
            <option value="{{ $hotel->id }}" selected="selected">&nbsp; {{ $hotel->id }}&nbsp; </option>
          @else
          <option value="{{ $hotel->id }}">&nbsp; {{ $hotel->id }}&nbsp; </option>
        @endif
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="room_number" class="col-sm-3 control-label">Room number</label>
    <div class="col-sm-6">
      <input type="text" min=0 name="room_number" class="form-control" value="{{$roomList->room_number }}">
    </div>
  </div>
  <div class="form-group">
    <label for="room_type" class="col-sm-3 control-label">Room Type</label>
    <div class="col-sm-6">
      <input type="text" name="room_type" class="form-control" value="{{ $roomList->room_type }}">
    </div>
  </div>
  <div class="form-group">
    <label for="service" class="col-sm-3 control-label">Service</label>
    <div class="col-sm-6">
      <input type="text" name="service" class="form-control" value="{{ $roomList->service }}">
    </div>
  </div>
  <div class="form-group">
    <label for="price" class="col-sm-3 control-label">Price</label>
    <div class="col-sm-6">
      <input type="integer" name="price" class="form-control" value="{{ $roomList->price }}">
    </div>
  </div>
  <div class="form-group">
    <label for="status" class="col-sm-3 control-label">Status</label>
    <div class="col-sm-6">
      <input type="text" name="status" class="form-control" value="{{ $roomList->status }}">
    </div>
  </div>
  <div class="form-group row">
        <label for="old-image" class="col-md-4 col-form-label text-md-right">{{ __('Old Image') }}</label>
        <div class="col-sm-6">
            <img class="preview-image" src="{{asset('/storage/images/'.$roomList->image)}}" />
        </div>
    </div>
  <div class="form-group">
      <label class="col-md-4 col-form-label text-md-right ">{{ __('New Image') }}</label>
      <div class="col-sm-6">
      <input type="file" class="image form-control" name="image" autocomplete="image" required/>
      <!-- <div class="mt-2" id="img-preview"></div>
      @error('image')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror -->
      </div>
  </div>
  <div class="col-sm-12  text-center">
    <button type="submit" class="btn btn-primary">Update</button>
  </div>

</form>
@endsection