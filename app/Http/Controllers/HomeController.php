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
        // This is a duplicate of LinksController@index, and only shows for logged in users.

        // Return the last 3 days by default. The user will get more with infinitescroll.
        $sets = Set::orderBy('created_at', 'DESC')->paginate(3);

        return view('home', compact('sets'));
    }
}
