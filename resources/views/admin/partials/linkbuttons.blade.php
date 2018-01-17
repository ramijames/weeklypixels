<span class="btn-group">
  <a href="{{ $link->address }}" class="btn btn-sm btn-default" target="_blank"><i class="fa fa-external-link-square" aria-hidden="true"></i></a>
  <a href="{{ url('/') }}/admin/links/destroy/{{ $link->id }}" class="btn btn-sm btn-default"><i class="fa fa-trash" aria-hidden="true"></i></a>
  <a href="{{ url('/') }}/admin/lightboxlinks/add/{{ $link->id }}" class="btn btn-sm btn-default"><i class="fa fa-plus" aria-hidden="true"></i></a>
</span>