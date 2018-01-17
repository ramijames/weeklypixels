<?php

namespace App\Traits;

use duzun\hQuery;
use App\Set;
use App\Site;
use App\Link;

trait ManageLinks {

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

    public function getNewLinks($siteid){

      $site = Site::find($siteid);

      $doc = hQuery::fromUrl($site->link, ['Accept' => 'text/html,application/xhtml+xml;q=0.9,*/*;q=0.8']);

      // not sure yet why, but some sites return false here. I assume hQuery isn't finding what it wants and returns null.
      if($doc !== false){
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
      } else {
        $links = array();
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

}

?>