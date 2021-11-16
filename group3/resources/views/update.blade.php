@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="text-center">
      <h2>Update User</h2>
    </div>
  </div>
</div>

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

<form action="/updateUser/{{ $User->id }}" method="POST" onSubmit="return confirm('Do you want to update this user?')" class="form-horizontal">
  {{ csrf_field() }}

  <div class="form-group">
    <label for="user" class="col-sm-3 control-label">User Name</label>
    <div class="col-sm-6">
      <input type="text" min=0 name="user_name" value="{{ $User->user_name }}" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-3 control-label">Email</label>
    <div class="col-sm-6">
      <input type="text" min=0 name="email" value="{{ $User->email }}" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-3 control-label">Password</label>
    <div class="col-sm-6">
      <input type="text" min=0 name="password" value="{{ $User->password }}" class="form-control">
    </div>
  </div>

  
  <div class="form-group">
    <label for="role" class="col-sm-3 control-label">Role</label>
    <div class="col-sm-6">
      <input type="text" min=0 name="role" value="{{ $User->role }}" class="form-control">
    </div>
  </div>
  <div class="col-sm-12  text-left">
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
  <div class="col-sm-12  text-left">
    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to exit')">Cancel</button>
  </div>

</form>
@endsection