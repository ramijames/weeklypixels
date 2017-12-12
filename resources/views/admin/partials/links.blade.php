@extends('admin.admin')

@section('admincontent')

@include('admin.partials.nav')

<div class="row admin-panel">

  <div class="admin-toolbar">
    <div class="admin-sub-nav" role="complementary">
      <ul class="nav nav-pills">

      </ul>
    </div>
    <div class="admin-tools">
      <div class="btn-group">
        <a href="{{ url('/') }}/admin/links/generate" class="btn btn-primary">Add a Link</a>
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
        @foreach($links as $link)
          <tr>
            <td>{{ $link->id }}</td>
            <td><a href="{{ $link->address }}">{{ $link->title }}</a></td>
            <td>{{ $link->created_at }}</td>
            <td></td>
          </tr>
        @endforeach

      </tbody>
    </table>

    {!! $links->render() !!}

  </div>

</div>

@endsection