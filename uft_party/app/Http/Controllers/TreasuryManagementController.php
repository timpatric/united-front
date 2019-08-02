<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Treasury;

class TreasuryManagementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index()
    {
       $total_fund = DB::table('treasuries')->sum('amount'); 
       
        $funds = DB::select('select * from treasuries');

         return view('treasury_mgt/index',['funds'=>$funds],['total_fund'=>$total_fund]);
    }


    public function create()
    {
        return view('treasury_mgt/create');

    }


    public function store(Request $request)
    {
        //
            $fund = new Treasury([
              'fund_source' => $request->get('fund_source'),
              'amount' => $request->get('amount'),
              'reg_date' => $request->get('reg_date'),
        ]);
            $fund->save();

        return redirect()->route('treasury-management.index')->with('success','Record added successfully');
    }

}
