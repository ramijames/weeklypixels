<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LinksController as LinksController;
use App\Traits\ManageLinks;
use duzun\hQuery;
use App\Set;
use App\Site;
use App\Link;
use DB;

class SiteController extends Controller
{

    use ManageLinks;

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
      return redirect('/admin/sites')->with('status', 'Site Deleted.');
    }

    /**
     * Get links for this site.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getlinks($siteid)
    {
      $site = Site::find($siteid);

      $links = $this->getNewLinks($siteid);
      $validatedlinks[$siteid] = $this->validateLinks($links);

      foreach($validatedlinks[$siteid] as $link){
        $this->saveLinksToDb($link,$siteid);
      }

      $message = "Pulled new links from" . $site->title;

      // Return to list
      return redirect('/admin/sites')->with('status', $message);
    }


}
