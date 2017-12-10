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
    <table class="table table-hover datatable" id="users-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
    </table>

  </div>

</div>

@endsection

@push('scripts')
  <script>
  $(document).ready(function() {
      $.noConflict();
      $('#users-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route('datatable/users') }}',
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
          ]
      });
  });
  </script>
@endpush