<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
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
           $salaries = DB::select('select * from salaries');
        return view('salary_mgt/index',['salaries'=>$salaries]);
    }

    public function search(Request $request)
     {
        
        $search = $request->get('search');
        $salaries = DB::table('salaries')->where('agent_name','like','%'.$search.'%');
        return view('salary_mgt/index',['salaries'=>$salaries]);
     }
}
