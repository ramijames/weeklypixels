<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LinksController as LinksController;
use duzun\hQuery;
use App\Set;
use App\Site;
use App\Link;
use DB;

class SetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate()
    {
        $sites = Site::all();

        // first get links
        foreach($sites as $site){
          // Get title and href for each site in the db
          // note on PHP syntax: calling another function in the same class, the other method should be static and we call it using $this
          $links = $this->getNewLinks($site->id);
          $validatedlinks[$site->id] = $this->validateLinks($links);

          foreach($validatedlinks[$site->id] as $link){
            // dd($link);
            $this->saveLinksToDb($link,$site->id);
          }

        }

        // dd($validatedlinks);

        // then validate links
        // foreach($sites as $site){

        // }

        // then save to db


        // Now that we've added links to the database we can
        // go ahead and push the new set to the view
        $links = Link::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.partials.generateset', compact('links'));
    }

    /**
     * Get new links from a Site
     *
     * @param  array $site
     * @return array of new links
     *    // 1. get newlinks -> pass $site->id, get back array of links
          // 2. validate links -> pass array of links ->
            // a. check if link is in db already
            // b. check if it has http in the beginning (strips out internal discussion links)
            // c. pick the top link (for now, will be first, but can do more complex algorithm in the future)
     */
    public static function getNewLinks($siteid){

      $site = Site::find($siteid);

      $doc = hQuery::fromUrl($site->link, ['Accept' => 'text/html,application/xhtml+xml;q=0.9,*/*;q=0.8']);
      $stories = $doc->find($site->selector);

      $links  = array();

      if($stories){
        // pull in names
        $counter = 0;
        foreach($stories as $href => $a) {
          $links[$counter]['address'] = $a->attr('href');
          $links[$counter]['title'] = $a->text();
          $links[$counter]['valid'] = 1;
          $counter++;
        }
      }

      return $links;

    }

    /**
     * Save these links to the db
     *
     * @param  single $link array with title and href value
     * @return true or false if success
     */
    public static function saveLinksToDb($link,$siteid){
      try {
        // this was for an array
        // if(empty($link)){
        //   return true;
        // } else {
        //   foreach($links as $link){
        //     $newlink = new Link;
        //     $newlink->title = $link['title'];
        //     $newlink->address = $link['address'];
        //     $newlink->site_id = $siteid;
        //     $newlink->rating = 1;
        //     $newlink->save();
        //   }

        //   return true;
        // }

        // but we really are going to do these one by one
        if(empty($link)){
          return true;
        } else {
          $newlink = new Link;
          $newlink->title = $link['title'];
          $newlink->address = $link['address'];
          $newlink->site_id = $siteid;
          $newlink->rating = 1;
          $newlink->save();

          return true;
        }

      } catch (Exception $e) {
        return $e->getMessage();
      }

    }

    /**
     * Validate links
     *
     * @param  array $links array with title and href value
     * @return $validatedlinks array with good links
     */
    public static function validateLinks($links){

        $count = 0;

        $validatedlinks[$count] = array();

        foreach($links as $link){

          if (Link::where('address', '=', $link['address'])->count() > 0) {
            $count = $count;
          } else {
            $validatedlinks[$count] = [
                                        'address' => $link['address'],
                                        'title' => $link['title'],
                                        'valid' => 1,
                                      ];
            $count++;
          }


        }

        // dd($validatedlinks);

        // good job, let's return the massaged and validated links
        return $validatedlinks;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // pull the request
        // get sets
        // count sets
        //
        // dd($request['links']);

        // check that $request isn't empty
        if($request['links']){

          // First initialize a new Set
          // TODO Associate with user who is logged in and has privileges
          $set = Set::create([
            'user_id' => 1
          ]);

          // I'm finding the latest set to push links into
          // $setid = count(Set::all());
          $setid = $set->id;

          // Then pushing in links one by one using the above ID.
          foreach($request['links'] as $link){
            $set = Set::find($setid);
            $set->links()->attach($link);
          }

          return redirect('/admin/sets')->with('status', 'New Set Generated.');

        } else {
          // Return to list of sets
          return redirect('/admin/sets')->with('status', 'Nothing added.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $set = Set::findOrFail($id);
      $set->delete();

      // Return to list
      return redirect('/admin/sets')->with('status', 'Set Deleted.');
    }
}
