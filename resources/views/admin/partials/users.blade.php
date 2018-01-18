@extends('admin.admin')

@section('admincontent')

<?php use App\Helpers; ?>

<div class="row admin-panel">

  <div class="admin-toolbar">
    <div class="admin-sub-nav" role="complementary">
      <ul class="nav nav-pills">
        <li {{ Helpers::setActive('admin/users') }}>
          <a href="{{ url('/') }}/admin/users" >Manage Users</a>
        </li>
        <li {{ Helpers::setActive('admin/roles') }}>
          <a href="{{ url('/') }}/admin/roles" >Manage Roles</a>
        </li>
      </ul>
    </div>
    <div class="admin-tools">
      <div class="btn-group">
        <div class="btn btn-primary">Add a User</div>
      </div>
    </div>
  </div>


  <div class="admin-content-section" role="main">
    <table class="table table-hover datatable" id="users-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

        @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td><strong>{{ $user->name }}</strong></td>
            <td>{{ $user->email }}</td>
            <td>
                @foreach($user->roles as $role)
                  {{ $role->name }}
                @endforeach</td>
            <td>
              <a class="btn btn-default" href="{{ url('/') }}/admin/users/destroy/{{ $user->id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
              <a class="btn btn-default" href="{{ url('/') }}/admin/user/{{ $user->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>

  </div>

</div>

@endsection

@push('scripts')
  <!-- script>
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
              {data: 'action', name:'action', orderable: false, searchable: false}
          ]
      });
  });
  </script-->
@endpush