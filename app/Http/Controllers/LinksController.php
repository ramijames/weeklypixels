<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use duzun\hQuery;
use App\Site;
use App\Link;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::all();
        $links = Link::orderBy('created_at', 'DESC')->paginate(10);

        return view('home', compact('links','sites'));

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

    public function generateLinks(){

        $sites = Site::all();

        foreach($sites as $site){

          // Get title and href for each site in the db
          // note on PHP syntax: calling another function in the same class, the other method should be static and we call it using $this
          $links = $this->getNewLinks($site->id);

          // run validation on links
          $validatedlinks = $this->validateLinks($links);

          // $this->removeInvalidLinks($validatedlinks);

          // dd($validatedlinks);

          // now we need to save to db;
          $this->saveLinksToDb($validatedlinks,$site->id);

        }
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
        foreach($stories as $href => $a) {
          $links[$href]['address'] = $a->attr('href');
          $links[$href]['title'] = $a->text();
          $links[$href]['valid'] = 1;
        }
      }

      return $links;

    }

    /**
     * Save these links to the db
     *
     * @param  array $links array with title and href value
     * @return true or false if success
     */
    public static function saveLinksToDb($links,$siteid){

      try {
        foreach($links as $link){
          $newlink = new Link;
          $newlink->title = $link['title'];
          $newlink->address = $link['address'];
          $newlink->site_id = $siteid;
          $newlink->rating = 1;
          $newlink->save();
        }

        return true;

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

        // are these links already in the db?
        // are they valid http links?
        // do they have extra stuff in the title we should strip?
        foreach($links as $link){

          // manipulate an array of mapped validated links
          $validatedlinks[$count] = [
                      'address' => $link['address'],
                      'title' => $link['title'],
                      'valid' => 1,
                     ];

          // remove secondary parentheses from titles
          $hasnoparentheses = $validatedlinks[$count]['title'];
          $validatedlinks[$count]['title'] = preg_replace("/\([^)]+\)/","",$hasnoparentheses);

          // remove brackets
          $hasnoparentheses = $validatedlinks[$count]['title'];
          $validatedlinks[$count]['title'] = preg_replace("/[[^)]+]/","",$hasnoparentheses);

          // check if it already exists in the database
          $exists = Link::where('address', $link['address'])->exists();
          if($exists){
            unset($validatedlinks[$count]);
          }

          // check if it is a valid link
          $invalid = strpos($link['address'], 'http') !== 0;
          if($invalid) {
            unset($validatedlinks[$count]);
          }

          // sometimes we get here and links have only spaces
          // if(preg_match('/^\s+$/', $link['title'])) == 1){
          //     unset($validatedlinks[$count]);
          // }

          $count = $count + 1;

        }

        // good job, let's return the massaged and validated links
        return $validatedlinks;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
