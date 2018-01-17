<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Set;
use App\Link;
use App\LightboxLink;
use App\Site;
use Datatables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        $users_stats_dataset = array();

        // [
        //     [
        //         "label" => "My First dataset",
        //         'backgroundColor' => "rgba(38, 185, 154, 0.31)",
        //         'borderColor' => "rgba(38, 185, 154, 0.7)",
        //         "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
        //         "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
        //         "pointHoverBackgroundColor" => "#fff",
        //         "pointHoverBorderColor" => "rgba(220,220,220,1)",
        //         'data' => [65, 59, 80, 81, 56, 55, 40],
        //     ],
        //     [
        //         "label" => "My Second dataset",
        //         'backgroundColor' => "rgba(38, 185, 154, 0.31)",
        //         'borderColor' => "rgba(38, 185, 154, 0.7)",
        //         "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
        //         "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
        //         "pointHoverBackgroundColor" => "#fff",
        //         "pointHoverBorderColor" => "rgba(220,220,220,1)",
        //         'data' => [12, 33, 44, 44, 55, 23, 40],
        //     ]
        // ]

        $num = 0;

        foreach($users as $user){
            $users_stats_dataset[$num]['label'] = $user->name;
            // $users_stats_dataset[$num]['backgroundColor'] = "rgba(38, 185, 154, 0.31)";
            // $users_stats_dataset[$num]['pointBorderColor'] = "rgba(38, 185, 154, 0.7)";
            // $users_stats_dataset[$num]['pointBackgroundColor'] = "rgba(38, 185, 154, 0.31)";
            // $users_stats_dataset[$num]['borderColor'] = "rgba(38, 185, 154, 0.7)";
            // $users_stats_dataset[$num]['pointHoverBackgroundColor'] = "rgba(38, 185, 154, 0.31)";
            // $users_stats_dataset[$num]['pointHoverBorderColor'] = "rgba(38, 185, 154, 0.7)";
            $users_stats_dataset[$num]['data'] = [1];
            $num++;
        }

        for($m=1; $m<=12; ++$m){
            $months_array[] = date('F', mktime(0, 0, 0, $m, 1));
        }

        $months = "['" . implode("', '", array_values($months_array)) . "']";

        // dd($months);

        $users_stats = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'])
        ->datasets($users_stats_dataset)
        ->options([]);

        $lightboxlinks = LightboxLink::all();

        return view('admin.partials.dashboard', compact('users_stats','lightboxlinks'));
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewusers()
    {
        $users = User::orderBy('created_at', 'ASC')->paginate(20);
        $lightboxlinks = LightboxLink::all();

        return view('admin.partials.users', compact('users','lightboxlinks'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewroles()
    {
        $roles = Role::orderBy('created_at', 'ASC')->paginate(20);
        $lightboxlinks = LightboxLink::all();

        return view('admin.partials.roles', compact('roles','lightboxlinks'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewsites()
    {
        $sites = Site::orderBy('created_at', 'DESC')->paginate(5);
        $lightboxlinks = LightboxLink::all();

        return view('admin.partials.sites', compact('sites','lightboxlinks'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewsets()
    {
        $sets = Set::orderBy('created_at', 'DESC')->paginate(5);
        $lightboxlinks = LightboxLink::all();

        return view('admin.partials.sets', compact('sets','lightboxlinks'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewlinks()
    {
        $links = Link::orderBy('id', 'ASC')->paginate(50);
        $lightboxlinks = LightboxLink::all();

        return view('admin.partials.links', compact('links','lightboxlinks'));
    }

}
