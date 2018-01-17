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
     <div class="alert alert-warning">
        <p>{{ session('status') }}</p>
     </div>
    @endif

    @yield('admincontent')
  </div>

  <div class="admin-content-lightbox">
    <div class="admin-content-lightbox-header">
      <span>Lightbox</span>
    </div>
    <div class="admin-content-lightbox-content">
      <ol>
        <li class="lightboxlink-single">
          <a href="" class="lightboxlink-single-content">
            <span class="link-label">Link 1</span>
            <br>
            Example Link that has some really long text
          </a>
          <div class="lightboxlink-single-footer">
            <a href="{{ url('/') }}/admin/lightboxlinks/destroy/" class=""><i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>
        </li>
        <li class="lightboxlink-single">
          <a href="" class="lightboxlink-single-content">
            <span class="link-label">Link 1</span>
            <br>
            Example Link that has some really long text
          </a>
          <div class="lightboxlink-single-footer">
            <a href="{{ url('/') }}/admin/lightboxlinks/destroy/" class=""><i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>
        </li>
        <li class="lightboxlink-single">
          <a href="" class="lightboxlink-single-content">
            <span class="link-label">Link 1</span>
            <br>
            Example Link that has some really long text
          </a>
          <div class="lightboxlink-single-footer">
            <a href="{{ url('/') }}/admin/lightboxlinks/destroy/" class=""><i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>
        </li>
        <li class="lightboxlink-single">
          <a href="" class="lightboxlink-single-content">
            <span class="link-label">Link 1</span>
            <br>
            Example Link that has some really long text
          </a>
          <div class="lightboxlink-single-footer">
            <a href="{{ url('/') }}/admin/lightboxlinks/destroy/" class=""><i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>
        </li>
        <li class="lightboxlink-single">
          <a href="" class="lightboxlink-single-content">
            <span class="link-label">Link 1</span>
            <br>
            Example Link that has some really long text
          </a>
          <div class="lightboxlink-single-footer">
            <a href="{{ url('/') }}/admin/lightboxlinks/destroy/" class=""><i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>
        </li>
      </ol>
    </div>
  </div>
</div>

@else

  @include('admin.partials.unauthorized')

@endif

@endsection