@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
  <!-- Display Validation Errors -->
  

  <!-- New User Form -->
  <form action="/addUser" method="POST" onSubmit="return confirm('Do you want to Add this User?')" class="form-horizontal">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
    {{ csrf_field() }}

    <!-- User Name -->
    
    <div class="form-group">
      <label for="user_name" class="col-sm-3 control-label">UserName</label>
      <div class="col-sm-6">
        <input type="text" min=0 name="user_name" class="form-control" required>
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Email</label>
      <div class="col-sm-6">
        <input type="email" min=0 name="email" class="form-control" required>
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-3 control-label">Password</label>
      <div class="col-sm-6">
        <input type="password" min=0 name="password" class="form-control" required>
      </div>
    </div>
    <div class="form-group">
      <label for="role" class="col-sm-3 control-label">Role</label>
      <div class="col-sm-6">
        <input type="text" min=0 name="role" class="form-control" required>
      </div>
    </div>
    

    <!-- Add User Button -->
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" onSubmit="return confirm('Do you want to add this User?')" class="btn btn-success">
          <i class="fa fa-plus"></i> Add User
        </button>
      </div>
    </div>
  </form>

<div class="panel-body">
  <!-- Current Users -->
  @if (count($User) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
      User Info
      </div>

      <div class="panel-body">
        <table class="table table-bordered mt-5">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Action</th>
            </tr>
            @foreach ($User as $User)
              <tr>
                  <td>{{ $User->id }}</td>
                  <td>{{ $User->user_name }}</td>
                  <td>{{ $User->email }}</td>
                  <td>{{ $User->password }}</td>
                  <td>{{ $User->role }}</td>
                  <td>{{ $User->created_at }}</td>
                  <td>{{ $User->updated_at }}</td>
                  <td>
                  <form action="/users/update/{{ $User->id }}" method="POST" >
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-warning">
                      <i class="fa fa-btn fa-pencil-alt"></i>Update
                    </button>
                  </form>
                  <form action="/user/{{ $User->id }}" method="POST" onSubmit="return confirm('Are you sure you want to delete?')">
                  {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-danger">
                  <i class="fa fa-btn fa-trash"></i>Delete
                </button>
              </form>
                </td>
              </tr>
            @endforeach
        </table>
      </div>
    </div>
  @endif
</div>

<!-- TODO: Current Users -->
@endsection

</div>
