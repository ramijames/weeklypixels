@extends('admin.admin')

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