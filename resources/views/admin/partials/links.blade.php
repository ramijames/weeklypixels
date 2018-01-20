@extends('admin.admin')

@section('admincontent')

<div class="row admin-panel">

  <div class="admin-toolbar">
    <div class="admin-sub-nav" role="complementary">

    </div>
    <div class="admin-tools">
      <div class="btn-group">
        <a href="{{ url('/') }}/admin/sets/generate" class="btn btn-primary">Add a Link</a>
      </div>
    </div>
  </div>


  <div class="admin-content-section" role="main">
    <table class="table table-condensed table-hover datatable links">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Generated</th>
          <th>Published</th>
          <th>Actions</th>
        </tr>
      </thead>
    </table>

  </div>

</div>

@push('scripts')
  <script>
    $(document).ready(function(){
      $('.datatable').DataTable({
            processing: true,
            "pageLength": 50,
            "bAutoWidth": false,
            // scrollY:        '72vh',
            // scrollCollapse: true,
            // paging:         false,
            serverSide: false,
            ajax: '{{ route('datatables/getlinks') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'created_at', name: 'generated'},
                {data: 'published', name: 'published'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
  </script>
@endpush

@endsection