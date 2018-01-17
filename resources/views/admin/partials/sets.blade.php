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
        <a href="{{ url('/') }}/admin/sets/generate" class="btn btn-primary">Set from Lightbox</a>
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
            <td>
              <a class="btn btn-default" href="{{ url('/') }}/admin/sets/destroy/{{ $set->id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>

    {!! $sets->render() !!}

  </div>

</div>

@endsection