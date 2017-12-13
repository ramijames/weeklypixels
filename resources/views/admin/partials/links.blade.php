@extends('admin.admin')

@section('admincontent')

<div class="row admin-panel">

  <div class="admin-toolbar">
    <div class="admin-sub-nav" role="complementary">
      <ul class="nav nav-pills">

      </ul>
    </div>
    <div class="admin-tools">
      <div class="btn-group">
        <a href="{{ url('/') }}/admin/sets/generate" class="btn btn-primary">Add a Link</a>
      </div>
    </div>
  </div>


  <div class="col-md-12" role="main">
    <table class="table table-condensed table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Site</th>
          <th>Title/Link</th>
          <th>Generated</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($links as $link)
          <tr>
            <td>{{ $link->id }}</td>
            <td><span class="tag label label-info">{{ $link->sites->title }}</span></td>
            <td><strong><a href="{{ $link->address }}">{{ $link->title }}</a></strong></td>
            <td>{{ $link->created_at }}</td>
            <td>
              <a class="btn btn-default" href="{{ url('/') }}/admin/links/destroy/{{ $link->id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>

    <div class="floating-action">
      {!! $links->render() !!}
    </div>

  </div>

</div>

@endsection