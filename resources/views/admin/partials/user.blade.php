@extends('admin.admin')

@section('admincontent')

<?php use App\Helpers; ?>

<div class="row admin-panel">

  <div class="container" role="main">
    <h3>Update User</h3>
    <h4>User Id is {{ $user->id }}</h4>
    <hr>
    <form action="{{ url('/') }}/admin/user/update/{{ $user->id }}" method="POST" accept-charset="utf-8">
        {{ csrf_field() }}
        <div class="form-group">
              <label for="username">Name</label>
              <input class="form-control" type="text" name="username" placeholder="{{ $user->name }}">
        </div>
        <div class="form-group">
              <label>Email</label>
              <input class="form-control" type="text" name="email" placeholder="{{ $user->email }}">
        </div>
        <div class="form-group">
              <label>Role</label>
              <!-- <input type="checkbox" id="inlineCheckbox{{ $user->id }}" name="links[]" value="{{ $user->id }}"> -->
              <select name="role">
                @foreach($roles as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
              </select>
        </div>

        <div class="form-group">
          <a href="{{ url('/') }}/admin/users" class="btn btn-primary pull-left">Cancel</a>
          <button type="submit" class="btn btn-primary pull-right">Update User</button>
        </div>
      </form>

    <!-- <table class="table table-hover datatable" id="users-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td>{{ $user->id }}</td>
            <td><strong>{{ $user->name }}</strong></td>
            <td>{{ $user->email }}</td>
            <td>
                @foreach($user->roles as $role)
                  {{ $role->name }}
                @endforeach</td>
            <td>
              <a class="btn btn-default" href="{{ url('/') }}/admin/users/destroy/{{ $user->id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
              <a class="btn btn-default" href="{{ url('/') }}/admin/users/destroy/{{ $user->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            </td>
          </tr>
      </tbody>
    </table> -->

  </div>

</div>

@endsection