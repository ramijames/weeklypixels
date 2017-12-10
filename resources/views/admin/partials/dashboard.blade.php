@extends('admin.admin')

@section('adminnav')

<div class="row">
  <ul class="nav nav-tabs">
    <li class="active"><a href="{{ url('/') }}/admin">Dashboard</a></li>
    <li><a href="{{ url('/') }}/admin/users">Users</a></li>
    <li><a href="{{ url('/') }}/admin/sets">Sets</a></li>
    <li><a href="{{ url('/') }}/admin/sites">Sites</a></li>
  </ul>
</div>

@endsection

@section('admincontent')

<div class="row admin-panel">
  <div class="col-md-12" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3>This Week</h3>
      </div>
      <div class="panel-body">
        <p>Here we will show site statistics</p>
      </div>
    </div>
  </div>
</div>

@endsection