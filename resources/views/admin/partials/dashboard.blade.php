@extends('admin.admin')

@section('admincontent')

<div class="container-fluid">
  <h3>This Week</h3>
  <p>Here we will show site statistics</p>
  {!! $users_stats->render() !!}
</div>

@endsection