@extends('layouts.app')

@section('content')

<div class="infinite-scroll" data-infinite-scroll='{ "path": ".pagination a", "append": ".single-link", "history": false }'>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @foreach($links as $link)

      <div class="panel panel-default single-link">
          <div class="panel-heading">
            <span class="pull-left">{{ $link->rating }}</span>
            <span class="pull-right">{{ $link->sites->title }} <img src="https://www.google.com/s2/favicons?domain={{ $link->sites->link }}" /></span>
          </div>
          <div class="panel-body"><a href="{{ $link->address }}">{{ $link->title }}</a></div>
          <div class="panel-footer">
            <a class="btn btn-default btn-sm" href="#"><i class="fa fa-comment" aria-hidden="true"></i></a>
            <a class="btn btn-default btn-sm" href="#"><i class="fa fa-bookmark" aria-hidden="true"></i></a>
          </div>
      </div>

    @endforeach

    {!! $links->render() !!}

</div>

<div class="so-sad">
    You've reached the end <i class="fa fa-heart" aria-hidden="true"></i> It's been a long journey, but we made it together
</div>

@endsection
