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

    public function datatable()
    {
        return view('datatable');
    }

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

        return \DataTables::of(Link::query())
            ->addColumn('action', function ($link) { return view('admin.partials.linkbuttons', compact('link'))->render();})
            ->make(true);
    }
}
