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
          <form method="POST" onSubmit="return confirm('Do you want to update this room?')" class="add-form" enctype="multipart/form-data"> 
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
                <select name="room_type" class="select-box"> 
                <option value="{{ $roomList->room_type }}" selected>{{ $roomList->room_type }}</option> 
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
              <label for="service" class="input-ttl">Service</label> 
              <div class="input-box"> 
                <select name="service" class="select-box"> 
                  <option value="{{ $roomList->service }}" selected>{{ $roomList->service }}</option> 
                  <option class="select" value="Breakfast free">&nbsp; Breakfast free &nbsp;</option> 
                  <option class="select" value="Breakfast free & pool usage">&nbsp; Breakfast free & pool usage &nbsp;</option> 
                  <option class="select" value="Breakfast free, gym & pool usage">&nbsp; Breakfast free, gym & pool usage &nbsp;</option> 
                </select> 
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
                <select name="status" class="select-box"> 
                  <option value="{{ $roomList->status }}" selected>{{ $roomList->status }}</option> 
                  <option class="select" value="Available">&nbsp; Available &nbsp;</option> 
                  <option class="select" value="Not Available">&nbsp; Not Available &nbsp;</option> 
                </select> 
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
                <label class="img-lable" for="upload">Upload an image</label> 
                <input type="file" src="{{ URL::to('/')}}//storage/images/{{$roomList->image }}" value="{{ URL::to('/')}}//storage/images/{{$roomList->image }}" class="image input-img" name="image" id="upload"/> 
              </div> 
            </div> 
            <div class="col-sm-12  text-center"> 
              <button type="submit" class="btn upd-btn">Update</button> 
              <a href="{{route('roomList')}}" class="btn check-btn" onclick="return confirm('Are you sure to exit')">Cancel</a>
            </div> 
          </form> 
        </div> 
      </div> 
    </div> 
  </div> 
</div> 

@endsection 

 