<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Link;
use App\Set;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::all();
        $sets = Set::all();
        $links = Link::orderBy('created_at', 'DESC')->paginate(10);

        /* You are looking in the wrong place, my friend. */

        return view('home', compact('links','sites', 'sets'));
    }
}
