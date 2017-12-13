@extends('layouts.app')

@section('admin')

@yield('modal')

<div class="admin-wrapper">
  <div class="admin-nav-wrapper">
    @include('admin.partials.nav')
  </div>

  <div class="admin-content-wrapper">

    @if (session('status'))
     <div class="alert alert-warning">
        <p>{{ session('status') }}</p>
     </div>
    @endif

    @yield('admincontent')
  </div>
</div>

@endsection