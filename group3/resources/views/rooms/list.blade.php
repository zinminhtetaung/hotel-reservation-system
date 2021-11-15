@extends('layouts.app')

@section('content')
<!-- Styles -->
<link href="{{ asset('css/lib/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/hotel-list.css') }}" rel="stylesheet">

<!-- Script -->
<script src="{{ asset('js/lib/moment.min.js') }}"></script>
<script src="{{ asset('js/lib/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/room-list.js') }}"></script>

<div class="container">
    <div class="row justify-content-center">
          <!-- Display Validation Errors -->
  @include('common.errors')

<!-- New reservation Form -->
<form action="/rooms/create" method="POST" class="form-horizontal" enctype="multipart/form-data">
  {{ csrf_field() }}

  <!-- reservation Name -->
  <div class="form-group">
    <label for="hotel_id" class="col-md-4 col-form-label text-md-left required">Hotel ID</label>
    <div class="col">
      <select name="hotel_id" class="form-select">
      @foreach ($hotels as $h_id)
          <option value="{{$h_id->id}}">&nbsp; {{$h_id->id}} &nbsp;</option>
      @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="room_number" class="col col-form-label text-md-left required">Room number</label>
    <div class="col">
      <input type="text" min=0 name="room_number" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="room_type" class="col-md-4 col-form-label text-md-left required">Room Type</label>
    <div class="col">
      <input type="text" name="room_type" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="service" class="col-md-4 col-form-label text-md-left required">Service</label>
    <div class="col">
      <input type="text" name="service" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="price" class="col-md-4 col-form-label text-md-left required">Price</label>
    <div class="col">
      <input type="integer" name="price" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="status" class="col-md-4 col-form-label text-md-left required">Status</label>
    <div class="col">
      <input type="text" name="status" class="form-control">
    </div>
  </div>
  <div class="form-group">
      <label class="col-md-4 col-form-label text-md-left required">{{ __('Image') }}</label>
      <div class="col">
      <input type="file" class="image form-control" name="image" />
      <!-- <div class="mt-2" id="img-preview"></div>
      @error('image')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror -->
      </div>
  </div>

  <!-- Add reservation Button -->
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
      <button type="submit" onSubmit="return confirm('Do you want to add this reservation?')" class="btn btn-success">
        <i class="fa fa-plus"></i> Add Room
      </button>
    </div>
  </div>
</form>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Room Information') }}</div>
                <div class="card-body">
                    <div class="row search-bar">            
                        <!-- <form class="row search-bar" type="get" action="{{url('/s/search')}}">
                        <div class="row m-0">
                            <label class="p-2 search-lbl">From :</label>
                            <input class="search-input mb-2 form-control" id="dateStart" name="start" type="date" />
                        </div>
                        <div class="row m-0">
                            <label class="p-2 search-lbl">To :</label>
                            <input class="search-input mb-2 form-control" id="dateEnd" name="end" type="date" />
                        </div>
                        <button class="btn btn-primary mb-2 search-btn" id="search-click">Search</button>
                        </form> -->


                        <table class="table table-hover table-responsive" id="room-list">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th class="header-cell" scope="col">Hotel ID</th>
                                    <th class="header-cell" scope="col">Room Number</th>
                                    <th class="header-cell" scope="col">Room Type</th>
                                    <th class="header-cell" scope="col">Service</th>
                                    <th class="header-cell" scope="col">Price</th>
                                    <th class="header-cell" scope="col">Status</th>
                                    <th class="header-cell" scope="col">Image</th>
                                    <th class="header-cell" scope="col">Operation1</th>
                                    <th class="header-cell" scope="col">Operation2</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    
                                    <td><img height="50px" src="{{asset('/storage/images/'.$room->image)}}"/></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" onclick="showDeleteConfirm({{json_encode($room)}})" data-toggle="modal" data-target="#delete-confirm">Delete</button>
                                    </td>
                                    <!-- Update Button -->
                                    <td>
                                        <form action="/rooms/update/{{ $room->id }}" method="POST" >
                                        {{ csrf_field() }}
                                            <button type="submit" class="btn btn-warning">
                                            <i class="fa fa-btn fa-pencil-alt"></i>Update
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="delete-confirm" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Confirm</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="room-delete">
                                                <h4 class="delete-confirm-header">Are you sure to delete room?</h4>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label class="col-md-3 text-md-left">{{ __('ID') }}</label>
                                                        <label class="col-md-9 text-md-left">
                                                            <i class="profile-text" id="room-id"></i>
                                                        </label>
                                                    </div>
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form method="POST" action="/rooms/delete/{{ $room->id }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
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
    </div>
    @endsection