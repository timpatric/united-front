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

        //total amount of money in the treasury after a month
        // $total_fund = DB::table('funds')->count(); 
        $amount= DB::table('treasuries')->sum('amount');


        // $district =DB::select(DB::raw('SELECT count(id) as nums from districts where id NOT IN (SELECT district_Id from agents)'));
         
        //members qualified to be upgraded to agents
        $member =DB::select(DB::raw('SELECT  DISTINCT rec_name
        FROM members WHERE rec_name IN
          (SELECT rec_name FROM members GROUP BY rec_name HAVING COUNT(*) >=40)'));
          $member_upgrade=count($member);
          ;
        //send data to the views
        return view('dashboard',['memberno'=>$memberno,'agentno'=>$agentno,'amount'=>$amount,'member_upgrade'=>$member_upgrade]);

    }
}