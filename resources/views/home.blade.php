@extends('layouts.app')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">inifinite scroll</div>

                <div class="panel-body infinite-scroll" data-infinite-scroll='{ "path": ".pagination a", "append": ".single-link", "history": false }'>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>

                    @foreach($links as $link)

                      <li class="single-link">{{ $link->rating }} - <a href="{{ $link->address }}">{{ $link->title }}</a> - {{ $link->sites->title }}</li>

                    @endforeach

                    {!! $links->render() !!}

                    </ul>
                </div>
            </div>
@endsection
