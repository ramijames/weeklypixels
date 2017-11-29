@extends('layout')

@section('content')

<ul>

@foreach($links as $link)

  <li>{{ $link->rating }} - <a href="{{ $link->address }}">{{ $link->title }}</a> - {{ $link->sites->title }}</li>

@endforeach

</ul>

@endsection