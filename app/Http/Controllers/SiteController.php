<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;

class SiteController extends Controller
{
    // You have to make sure the request object is passed through
    public function store(Request $request){

      // Validate
      $this->validate(request(),[
        'sitetitle' => 'required',
        'siteshortname' => 'required|max:2',
        'sitelink' => 'required|url',
        'siteselector' => 'required',
        'siteweight' => 'required'
      ]);

      // Build.
      Site::create([
        'title' => request('sitetitle'),
        'shortname' => request('siteshortname'),
        'link' => request('sitelink'),
        'selector' => request('siteselector'),
        'weight' => request('siteweight')
      ]);

      // Return to list
      return redirect('/admin/sites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $site = Site::findOrFail($id);
      $site->delete();

      // Return to list
      return redirect('/admin/sites')->with([
        'flash_message' => 'Deleted',
        'flash_message_important' => false
      ]);
    }
}
