<?php use App\Helpers; ?>

<div class="row">
  <ul class="nav nav-tabs admin-nav">
    <li {{ Helpers::setActive('admin') }}><a href="{{ url('/') }}/admin">Stats</a></li>
    <li {{ Helpers::setActive('admin/users') }}><a href="{{ url('/') }}/admin/users">Users</a></li>
    <li {{ Helpers::setActive('admin/sets') }}><a href="{{ url('/') }}/admin/sets">Sets</a></li>
    <li {{ Helpers::setActive('admin/links') }}><a href="{{ url('/') }}/admin/links">Links</a></li>
    <li {{ Helpers::setActive('admin/sites') }}><a href="{{ url('/') }}/admin/sites">Sites</a></li>
  </ul>
</div>