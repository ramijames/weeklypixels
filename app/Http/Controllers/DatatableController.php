<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use DataTables;
use App\User;
use App\Link;
use App\Site;
use App\Set;

class DataTableController extends Controller
{

    public function getUsers()
    {
        return \DataTables::of(User::query())->make(true);
    }

    public function getSites()
    {
        return \DataTables::of(Site::query())->make(true);
    }

    public function getSets()
    {
        return \DataTables::of(Set::query())->make(true);
    }

    public function getLinks()
    {
        return \DataTables::of(Link::query())->make(true);
    }
}
