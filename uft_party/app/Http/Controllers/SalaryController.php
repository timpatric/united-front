<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Salary;

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
        $search = Input::get('search');

        if ($search != ""){
            $salary = Salary::where('role','like','%'.$search.'%')->get();
            if(count($salary)>0)
                return view ('salary_mgt.index')->withSalaries($salary)->withQuery($search);
            else
                return view('salary_mgt.index')->withMessage('No matching records found!!');
        }
    }
}
