@extends('layouts.app')

@section('content')

<h1 class="head">USER INFORMATION</h1>

<div class="body clearfix">
  <div class="wrap">
    <div class="content">
      <!-- Display Validation Errors -->
      @include('common.errors')
  

  <!-- New User Form -->
  <form action="/addUser" method="POST" onSubmit="return confirm('Do you want to Add this User?')" class="add-form">
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
        <input type="text" min=0 name="role" class="input-txt" required>
      </div>
    </div>
    

    <!-- Add User Button -->
    <div class="form-group">
        <button type="submit" onSubmit="return confirm('Do you want to add this User?')" class="btn add-btn">
          <i class="fa fa-plus"></i> Add User
        </button>
    </div>
  </form>

  <!-- Current Users -->
  @if (count($User) > 0)
  <div class="card">
        <div class="card-header">User Info</div>

      <div class="card-body">
        <table class="table">
            <thead>
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
            </thead>
            <tbody class="tbody">
            @foreach ($User as $User)
              <tr>
                  <td>{{ $User->id }}</td>
                  <td>{{ $User->user_name }}</td>
                  <td>{{ $User->email }}</td>
                  <td>{{"password"}}</td>
                  <td>{{ $User->role }}</td>
                  <td>{{ $User->created_at }}</td>
                  <td>{{ $User->updated_at }}</td>
                  <td>
                  <form action="/users/update/{{ $User->id }}" method="POST" >
                    {{ csrf_field() }}
                    <button type="submit" class="btn upd-btn">
                      <i class="fa fa-btn fa-pencil-alt"></i>Update
                    </button>
                  </form>
                  <form action="/user/{{ $User->id }}" method="POST" onSubmit="return confirm('Are you sure you want to delete?')">
                  {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                <button type="submit" class="btn del-btn">
                  <i class="fa fa-btn fa-trash"></i>Delete
                </button>
              </form>
                </td>
              </tr>
            @endforeach
            </tbody>
        </table>
      </div>
    </div>
  @endif
</div>
<!-- TODO: Current Users -->
@endsection

</div>
  </div>
</div>
