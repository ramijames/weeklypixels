@extends('admin.admin')

@section('modal')

<!-- Add Feed -->
<div class="modal fade" id="addSite" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Add a Site</h3>
        <small>You'll have to be specific in your selector</small>
      </div>
      <div class="modal-body">
        <form action="{{ url('/') }}/admin/sites/store" method="POST" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="addon-title"><i class="fa fa-font"></i></span>
                    <input class="form-control" type="text" name="sitetitle" placeholder="Site Title" aria-describedby="addon-title" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="addon-shortname"><i class="fa fa-font"></i></span>
                    <input class="form-control" type="text" name="siteshortname" placeholder="Two Letter Shortname" aria-describedby="addon-shortname" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="addon-link"><i class="fa fa-link"></i></span>
                    <input class="form-control" type="text" name="sitelink" placeholder="Site Link" aria-describedby="addon-link" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" id="addon-selector"><i class="fa fa-link"></i></span>
                    <input class="form-control" type="text" name="siteselector" placeholder="Site Selector" aria-describedby="addon-selector" required>
                </div>
            </div>
            <div class="">
                <div class="input-group">
                    <span class="input-group-addon" id="addon-weight"><i class="fa fa-link"></i></span>
                    <input class="form-control" type="text" name="siteweight" placeholder="1" default="1" aria-describedby="addon-weight" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add New Site</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection

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
        <div class="btn btn-primary" data-toggle="modal" data-target="#addSite">Add a Site</div>
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