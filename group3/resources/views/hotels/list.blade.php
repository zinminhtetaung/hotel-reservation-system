@extends('layouts.app')

@section('content')
<!-- Styles -->
<link href="{{ asset('css/lib/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/hotel-list.css') }}" rel="stylesheet">

<!-- Script -->
<script src="{{ asset('js/lib/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/hotel-list.js') }}"></script>

<div class="body clearfix">
  <div class="wrap">
    <div class="content">
      <div class="card">
        <div class="card-header">{{ __('Hotel Information') }}</div>
        <div class="card-body">
          <a class="btn btn-primary header-btn" href="/hotel/download">{{ __('Download') }}</a>
          <table class="table" id="hotel-list">
            <thead>
              <tr>
                <th class="header-cell" scope="col">ID</th>
                <th class="header-cell" scope="col">Hotel Name</th>
                <th class="header-cell" scope="col">Description</th>
                <th class="header-cell" scope="col">Phone Number</th>
                <th class="header-cell" scope="col">Location</th>
                <!-- <th class="header-cell" scope="col">Action</th> -->
              </tr>
            </thead>
            <tbody class="tbody">
              @foreach ($hotelList as $hotel)
              <tr>
                <td>{{$hotel->id}}</td>
                <td>
                  <a class="hotel-name" onclick="showHotelDetail({{json_encode($hotel)}})" data-toggle="modal" data-target="#hotel-detail-popup">{{$hotel->hotel_name}}</a>
                </td>
                <td>{{$hotel->description}}</td>
                <td>{{$hotel->phone}}</td>
                <td>{{$hotel->location}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="modal fade" id="hotel-detail-popup" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">{{ __('Hotel Detail') }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="hotel-detail">
                  <div class="info">
                    <label class="h-info">{{ __('Hotel Name') }}</label>
                    <label class="information">
                      <i class="profile-text" id="hotel-name"></i>
                    </label>
                  </div>
                  <div class="info">
                    <label class="h-info">{{ __('Description') }}</label>
                    <label class="information">
                      <i class="profile-text" id="hotel-description"></i>
                    </label>
                  </div>
                  <div class="info">
                    <label class="h-info">{{ __('Phone Number') }}</label>
                    <label class="information">
                      <i class="profile-text" id="hotel-phone"></i>
                    </label>
                  </div>
                  <div class="info">
                    <label class="h-info">{{ __('Location') }}</label>
                    <label class="information">
                      <i class="profile-text" id="hotel-location"></i>
                    </label>
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
</div>