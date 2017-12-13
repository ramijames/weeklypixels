@extends('layouts.app')

@section('content')

<div class="infinite-scroll container" data-infinite-scroll='{ "path": ".pagination a", "append": ".daily-set", "history": false }'>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @foreach($sets as $set)

        <div class="row daily-set">

            <div class="col-md-3 set-date">

              <span class="the-date">{{ $set->created_at->format('d.m') }}</span>
              <span class="the-day">{{ $set->created_at->formatLocalized('%A') }}</span>
            </div>

            <div class="col-md-8">

              @foreach($set->links as $link)

                <div class="panel panel-default single-link">
                  <div class="panel-body"><a href="{{ $link->address }}">
                    <div class="link-rating">
                      {{ $link->rating }}
                    </div>
                    {{ $link->title }}</a>
                  </div>
                  <div class="panel-footer">
                    <div class="pull-left">
                      <div class="btn-group">

                        <a class="btn btn-default" href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                        <a class="btn btn-default" href="#"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
                      </div>
                      <div class="btn-group">
                        <a class="btn btn-default" href="#"><i class="fa fa-comment" aria-hidden="true"></i></a>
                        <a class="btn btn-default" href="#"><i class="fa fa-bookmark" aria-hidden="true"></i></a>
                      </div>
                    </div>
                    <div class="pull-right">
                      <div class="link-source">
                        <a href="{{ $link->sites->link }}">{{ $link->sites->title }}</a>
                      </div>
                    </div>

                  </div>
              </div>

            @endforeach

            </div>

        </div>

    @endforeach

    {!! $sets->render() !!}



</div>

<div class="so-sad">
    You've reached the end <i class="fa fa-heart" aria-hidden="true"></i> It's been a long journey, but we made it together
</div>

@endsection
