@extends('layouts.app')

@section('content')
<div class="body clearfix">
  <div class="wrap">
    <div class="content">
      <div class="card">
        <div class="card-header">Update User</div>
        <div class="card-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form method="POST" onSubmit="return confirm('Do you want to update this user?')" class="add-form">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="user" class="input-ttl">User Name</label>
              <div class="input-box">
                <input type="text" min=0 name="user_name" value="{{ $User->user_name }}" class="input-txt">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="input-ttl">Email</label>
              <div class="input-box">
                <input type="text" min=0 name="email" value="{{ $User->email }}" class="input-txt">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="input-ttl">Password</label>
              <div class="input-box">
                <input type="text" min=0 name="password" value="{{ $User->password }}" class="input-txt">
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

            <button type="submit" class="btn upd-btn">Update</button>
            <a href="{{route('userlist')}}" class="btn check-btn" onclick="return confirm('Are you sure to exit')">Cancel</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection