@extends('admin.admin')

@section('adminnav')

<div class="row">
  <ul class="nav nav-tabs">
    <li><a href="{{ url('/') }}/admin">Dashboard</a></li>
    <li><a href="{{ url('/') }}/admin/users">Users</a></li>
    <li><a href="{{ url('/') }}/admin/sets">Sets</a></li>
    <li class="active"><a href="{{ url('/') }}/admin/sites">Sites</a></li>
  </ul>
</div>

@endsection

@section('admincontent')

<div class="row admin-panel">

  <div class="admin-toolbar">
    <div class="admin-sub-nav" role="complementary">
      <ul class="nav nav-pills">

      </ul>
    </div>
    <div class="admin-tools">
      <div class="btn-group">
        <div class="btn btn-primary">Add a Site</div>
      </div>
    </div>
  </div>


  <div class="col-md-12" role="main">
    <table class="table table-condensed tabl-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Site Name</th>
          <th>Link</th>
          <th>Selector</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sites as $site)
          <tr>
            <td>{{ $site->id }}</td>
            <td>{{ $site->title }}</td>
            <td>{{ $site->link }}</td>
            <td>{{ $site->selector }}</td>
            <td></td>
          </tr>
        @endforeach

      </tbody>
    </table>

    {!! $sites->render() !!}

  </div>

</div>

@endsection