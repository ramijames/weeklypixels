@extends('admin.admin')

@section('adminnav')

<div class="row">
  <ul class="nav nav-tabs">
    <li><a href="{{ url('/') }}/admin">Dashboard</a></li>
    <li class="active"><a href="{{ url('/') }}/admin/users">Users</a></li>
    <li><a href="{{ url('/') }}/admin/sets">Sets</a></li>
    <li><a href="{{ url('/') }}/admin/sites">Sites</a></li>
  </ul>
</div>

@endsection

@section('admincontent')

<div class="row admin-panel">

  <div class="admin-toolbar">
    <div class="admin-sub-nav" role="complementary">
      <ul class="nav nav-pills">
        <li class="active">
          <a href="" class="active">Manage Users</a>
        </li>
        <li>
          <a href="">Manage Roles</a>
        </li>
      </ul>
    </div>
    <div class="admin-tools">
      <div class="btn-group">
        <div class="btn btn-primary">Add a User</div>
      </div>
    </div>
  </div>


  <div class="col-md-12" role="main">
    <table class="table table-condensed tabl-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td></td>
          </tr>
        @endforeach

      </tbody>
    </table>

    {!! $users->render() !!}

  </div>

</div>

@endsection