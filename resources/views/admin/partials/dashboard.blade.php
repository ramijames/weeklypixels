@extends('admin.admin')

@section('admincontent')

@include('admin.partials.nav')

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