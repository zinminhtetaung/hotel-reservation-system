@extends('layouts.app')

@section('content')
<script src="{{ asset('js/room-list.js') }}"></script>

<h1 class="head">USER INFORMATION</h1>

<div class="body clearfix">
  <div class="wrap">
    <div class="content">
      <!-- Display Validation Errors -->
      @include('common.errors')
      <!-- New User Form -->
      @if (Auth::user()->role=='admin' || Auth::user()->role=='0')
      <form action="{{route('user.create')}}" method="POST" onSubmit="return confirm('Do you want to Add this User?')" class="add-form">
        {{ csrf_field() }}

        <!-- User Name -->

        <div class="form-group">
          <label for="user_name" class="input-ttl">UserName</label>
          <div class="input-box">
            <input type="text" min=0 name="user_name" class="input-txt" required>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="input-ttl">Email</label>
          <div class="input-box">
            <input type="email" min=0 name="email" class="input-txt" required>
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="input-ttl">Password</label>
          <div class="input-box">
            <input type="password" min=0 name="password" class="input-txt" required>
          </div>
        </div>
        <div class="form-group">
          <label for="role" class="input-ttl">Role</label>
          <div class="input-box">
            <select name="role" class="select-box">
              <option class="select" value="admin">&nbsp; admin &nbsp;</option>
              <option class="select" value="manager">&nbsp; manager &nbsp;</option>
              <option class="select" value="receptionist">&nbsp; receptionist &nbsp;</option>
            </select>
          </div>
        </div>
        <!-- Add User Button -->
        <div class="form-group">
          <button type="submit" onSubmit="return confirm('Do you want to add this User?')" class="btn add-btn">
            <i class="fa fa-plus"></i> Add User
          </button>
        </div>
      </form>
      @endif
      <!-- Current Users -->
      @if (count($User) > 0)
      <div class="card">
        <div class="card-header">User Info</div>

        <div class="card-body">
          <div style="overflow-x:auto;">
            <table class="table" id="room-list">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Role</th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                  @if (Auth::user()->role=='admin' || Auth::user()->role=='0')
                  <th>Action 1</th>
                  <th>Action 2</th>
                  @endif
                </tr>
              </thead>
              <tbody class="tbody">
                @foreach ($User as $User)
                <tr>
                  <td>{{ $User->id }}</td>
                  <td>{{ $User->user_name }}</td>
                  <td>{{ $User->email }}</td>
                  <td>{{"########"}}</td>
                  <td>{{ $User->role }}</td>
                  <td>{{ date('d/m/Y', strtotime($User->created_at)) }}</td>
                  <td>{{ date('d/m/Y', strtotime($User->updated_at)) }}</td>
                  @if (Auth::user()->role=='admin' || Auth::user()->role=='0')
                  <td>
                    <a type="button" class="btn btn-primary" href="/users/{{ $User->id }}/update">Update</a>
                  </td>
                  <td>
                    <form action="/user/{{ $User->id }}/delete" method="POST" onSubmit="return confirm('Are you sure you want to delete?')">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}

                      <button type="submit" class="btn del-btn">
                        <i class="fa fa-btn fa-trash"></i>Delete
                      </button>
                    </form>
                  </td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @endif
    </div>
    <!-- TODO: Current Users -->
    @endsection

  </div>
</div>
</div>