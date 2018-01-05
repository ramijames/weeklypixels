@extends('layouts.app')

@section('admin')

@yield('modal')

@if(Auth::user()->hasRole('admin'))

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

@else

  @include('admin.partials.unauthorized')

@endif

@endsection