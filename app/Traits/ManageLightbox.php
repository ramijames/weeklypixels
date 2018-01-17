<?php

namespace App\Traits;

use duzun\hQuery;
use App\Set;
use App\Site;
use App\Link;
use App\LightboxLink;

trait ManageLightbox {

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clearLightbox()
    {
        $lightboxlinks = LightboxLink::get();

        foreach($lightboxlinks as $lightboxlink) {
            $lightboxlink->delete();
        }

        // Return to list
        return redirect('/admin/links')->with('status', 'Lightbox Cleared.');
    }

}

?>