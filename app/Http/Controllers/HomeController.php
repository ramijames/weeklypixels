<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Link;

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
        $links = Link::orderBy('created_at', 'DESC')->paginate(10);

        return view('home', compact('links','sites'));
    }
}
