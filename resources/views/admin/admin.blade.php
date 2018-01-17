@extends('layouts.app')

@section('admin')

@yield('modal')

@if(Auth::user()->hasRole('admin'))

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>

<div class="admin-wrapper">
  <div class="admin-nav-wrapper">
    @include('admin.partials.nav')
  </div>

  <div class="admin-content-wrapper">

    @if (session('status'))
     <div class="alert alert-warning alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-close" aria-hidden="true"></i></a>
        <p>{{ session('status') }}</p>
     </div>
    @endif

    @yield('admincontent')
  </div>

  <div class="admin-content-lightbox">
    <div class="admin-content-lightbox-header">
      <span class="lightbox-title">Set Lightbox</span>
      <div class="admin-tools">
        <div class="btn-group">
          <a href="http://localhost/laravel/weeklypixels/public/admin/sets/generate" class="btn btn-default">Clear</a>
        </div>
      </div>
    </div>
    <div class="admin-content-lightbox-content">
      <ol>

      @foreach($lightboxlinks as $lightboxlink)

        <li class="lightboxlink-single">
          <a href="" class="lightboxlink-single-content">
            <span class="link-label">Link {{ $lightboxlink->links->id }}</span>
            <br>
            {{ $lightboxlink->links->title }}
          </a>
          <div class="lightboxlink-single-footer">
            <a href="{{ url('/') }}/admin/lightboxlinks/destroy/" class=""><i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>
        </li>

      @endforeach

    </ol>
    </div>
  </div>
</div>

@else

  @include('admin.partials.unauthorized')

@endif

@endsection