<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\District;
use App\Agent;
use DB;

class DashboardController extends Controller
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

        // counts All party members
         $memberno = DB::table('members')->count();

        // counts All party agents in the all country
        $agentno = DB::table('agents')->count(); 

        //districts the party operates
        $districtno = DB::table('districts')->count();
         
        return view('dashboard',['memberno'=>$memberno,'agentno'=>$agentno,'districtno'=>$districtno]);
        
    }
}
