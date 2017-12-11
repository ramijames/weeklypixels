<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;

class SiteController extends Controller
{
    public function store(Request $request){

      // dd(request());

      $this->validate(request(),[
        'sitetitle' => 'required',
        'siteshortname' => 'required|max:2',
        'sitelink' => 'required',
        'siteselector' => 'required',
        'siteweight' => 'required'
      ]);

      Site::create([
        'title' => request('sitetitle'),
        'shortname' => request('siteshortname'),
        'link' => request('sitelink'),
        'selector' => request('siteselector'),
        'weight' => request('siteweight')
      ]); // saves to db automatically, Post Model uses $fillable

      return redirect('/admin/sites');
    }
}
