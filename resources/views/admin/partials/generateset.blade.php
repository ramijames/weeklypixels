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
        <a href="{{ url('/') }}/admin/sets" class="btn btn-default">Cancel</a>
      </div>
    </div>
  </div>


  <div class="col-md-12" role="main">
    <form action="{{ url('/') }}/admin/sets/store" method="POST" accept-charset="utf-8">

    {{ csrf_field() }}

    <table class="table table-condensed">

        @foreach($links as $link)

          <tr>
            <td>
              <input type="checkbox" id="inlineCheckbox{{ $link->id }}" name="links[]" value="{{ $link->id }}">
            </td>
            <td>
              {{ $link->title }}
            </td>
            <td>
              <a class="btn btn-default" href="{{ $link->address }}">View External</a>
            </td>
          </tr>

        @endforeach


    </table>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Add New Set</button>
    </div>

    </form>
  </div>

</div>

@endsection