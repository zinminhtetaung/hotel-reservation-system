@extends('layouts.app')

@section('content')
<!-- Styles -->
<link href="{{ asset('css/lib/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/hotel-list.css') }}" rel="stylesheet">

<!-- Script -->
<script src="{{ asset('js/lib/moment.min.js') }}"></script>
<script src="{{ asset('js/lib/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/hotel-list.js') }}"></script>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Hotel Information') }}</div>
        <div class="card-body">
          <div class="row search-bar">
            <a class="btn btn-primary header-btn" href="/hotel/download">{{ __('Download') }}</a>
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
              
          
          <table class="table table-hover table-responsive" id="hotel-list">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th class="header-cell" scope="col">Hotel Name</th>
                <th class="header-cell" scope="col">Description</th>
                <th class="header-cell" scope="col">Phone Number</th>
                <th class="header-cell" scope="col">Location</th>
                <th class="header-cell" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($hotelList as $hotel)
              <tr>
                <td>{{$hotel->id}}</td>
                <td>
                  <a class="hotel-name" onclick="showHotelDetail({{json_encode($hotel)}})" data-toggle="modal" data-target="#hotel-detail-popup">{{$hotel->hotel_name}}</a></td>
                <td>{{$hotel->description}}</td>
                <td>{{$hotel->phone}}</td>
                <td>{{$hotel->location}}</td>
                <td>
                  <button type="button" class="btn btn-danger" onclick="showDeleteConfirm({{json_encode($hotel)}})" data-toggle="modal" data-target="#delete-confirm">Delete</button>
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
                    <div class="modal-body" id="hotel-delete">
                      <h4 class="delete-confirm-header">Are you sure to delete hotel?</h4>
                      <div class="col-md-12">
                        <div class="row">
                          <label class="col-md-3 text-md-left">{{ __('ID') }}</label>
                          <label class="col-md-9 text-md-left">
                            <i class="profile-text" id="hotel-id"></i>
                          </label>
                        </div>
                        <div class="row">
                          <label class="col-md-3 text-md-left">{{ __('Name') }}</label>
                          <label class="col-md-9 text-md-left">
                            <i class="profile-text" id="hotel-name"></i>
                          </label>
                        </div>
                        <div class="row">
                          <label class="col-md-3 text-md-left">{{ __('Roll_Number') }}</label>
                          <label class="col-md-9 text-md-left">
                            <i class="profile-text" id="hotel-roll-Number"></i>
                          </label>
                        </div>
                        <div class="row">
                          <label class="col-md-3 text-md-left">{{ __('Class') }}</label>
                          <label class="col-md-9 text-md-left">
                            <i class="profile-text" id="hotel-class"></i>
                          </label>
                        </div>
                        <div class="row">
                          <label class="col-md-3 text-md-left">{{ __('DOB') }}</label>
                          <label class="col-md-9 text-md-left">
                            <i class="profile-text" id="hotel-dob"></i>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <form method="POST" action="{{ url('hotels/list/'.$hotel->id) }}">
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
                  <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-6">
                      <div class="row">
                        <label class="col-md-3 text-md-left">{{ __('Hotel Name') }}</label>
                        <label class="col-md-9 text-md-left">
                          <i class="profile-text" id="hotel-name"></i>
                        </label>
                      </div>
                      <div class="row">
                        <label class="col-md-3 text-md-left">{{ __('Description') }}</label>
                        <label class="col-md-9 text-md-left">
                          <i class="profile-text" id="hotel-roll-number"></i>
                        </label>
                      </div>
                      <div class="row">
                        <label class="col-md-3 text-md-left">{{ __('Phone Number') }}</label>
                        <label class="col-md-9 text-md-left">
                          <i class="profile-text" id="hotel-class"></i>
                        </label>
                      </div>
                      <div class="row">
                        <label class="col-md-3 text-md-left">{{ __('Location') }}</label>
                        <label class="col-md-9 text-md-left">
                          <i class="profile-text" id="hotel-dob"></i>
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
          <!-- <div class="modal fade" id="delete-confirm" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete Confirm</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="hotel-delete">
                  <h4 class="delete-confirm-header">Are you sure to delete hotel?</h4>
                  <div class="col-md-12">
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('ID') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="hotel-id"></i>
                      </label>
                    </div>
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('Name') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="hotel-name"></i>
                      </label>
                    </div>
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('Roll_Number') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="hotel-roll-Number"></i>
                      </label>
                    </div>
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('Class') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="hotel-class"></i>
                      </label>
                    </div>
                    <div class="row">
                      <label class="col-md-3 text-md-left">{{ __('DOB') }}</label>
                      <label class="col-md-9 text-md-left">
                        <i class="profile-text" id="hotel-dob"></i>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button onclick="deleteHotelById({{json_encode(csrf_token())}})" type="button" class="btn btn-danger">Delete</button>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection