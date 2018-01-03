<?php use App\Helpers; ?>

<ul class="nav nav-pills nav-stacked admin-nav">
  <li {{ Helpers::setActive('admin') }}><a href="{{ url('/') }}/admin"><i class="fa fa-bar-chart" aria-hidden="true"></i> Stats</a></li>
  <li {{ Helpers::setActive('admin/users') }}><a href="{{ url('/') }}/admin/users"><i class="fa fa-users" aria-hidden="true"></i> Users</a></li>
  <li {{ Helpers::setActive('admin/sets') }}><a href="{{ url('/') }}/admin/sets"><i class="fa fa-clone" aria-hidden="true"></i> Sets</a></li>
  <li {{ Helpers::setActive('admin/links') }}><a href="{{ url('/') }}/admin/links"><i class="fa fa-link" aria-hidden="true"></i> Links</a></li>
  <li {{ Helpers::setActive('admin/sites') }}><a href="{{ url('/') }}/admin/sites"><i class="fa fa-star" aria-hidden="true"></i> Sites</a></li>
</ul>