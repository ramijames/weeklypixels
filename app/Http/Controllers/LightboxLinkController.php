<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\LightboxLink;

class LightboxLinkController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($linkid)
    {
        $lightboxlink = new LightboxLink;
        $lightboxlink->link_id = $linkid;
        $lightboxlink->save();

        // dd($lightboxlink);

        // Return to list
        return redirect('/admin/links')->with('status', 'Lightbox Link Added.');
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
        $lightboxlink = LightboxLink::findOrFail($id);
        $lightboxlink->delete();

        // Return to list
        return redirect('/admin/links')->with('status', 'Lightbox Link Deleted.');
    }
}
