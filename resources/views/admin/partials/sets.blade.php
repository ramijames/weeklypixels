@extends('admin.admin')

@section('adminnav')

<div class="row">
  <ul class="nav nav-tabs">
    <li><a href="{{ url('/') }}/admin">Dashboard</a></li>
    <li><a href="{{ url('/') }}/admin/users">Users</a></li>
    <li class="active"><a href="{{ url('/') }}/admin/sets">Sets</a></li>
    <li><a href="{{ url('/') }}/admin/sites">Sites</a></li>
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
        <div class="btn btn-primary">Generate a Set</div>
      </div>
    </div>
  </div>


  <div class="col-md-12" role="main">
    <table class="table table-condensed tabl-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Generated</th>
          <th>Link</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sets as $set)
          <tr>
            <td>{{ $set->id }}</td>
            <td>{{ $set->created_at }}</td>
            <td>
              <ul>
                @foreach($set->links as $link)
                  <li><a href="{{ $link->address }}">{{ $link->title }}</a></li>
                @endforeach
              </ul>
            </td>
            <td></td>
          </tr>
        @endforeach

      </tbody>
    </table>

    {!! $sets->render() !!}

  </div>

</div>

@endsection