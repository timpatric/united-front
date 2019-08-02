<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Agent;

class AgentManagementController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = DB::select('select * from agents');
        return view('agent_mgt/index',['agents'=>$agents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('agent_mgt/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $min = DB::table('districts')->min('agent_total');

           if($min ==0){
               $role = 'Agent head';
            }
            else{
                $role = 'Agent';
            }
            $district = DB::table('districts')->where('agent_total',$min)->pluck('district_name')->first();

           $agent = new Agent([
              'agent_name' => $request->get('agent_name'),
              'gender' => $request->get('gender'),
              'district_name' =>  $district,
              'agent_sign' => $request->get('agent_sign'),
              'role' => $role,
              'reg_date' => $request->get('reg_date')
        ]);
            $agent->save();

        return redirect()->route('agent-management.index')->with('success','New agent added successfully');
    }


 

     public function search(Request $request)
     {
        $search = Input::get('search');

        if ($search != ""){
            $agent = Agent::where('agent_name','like','%'.$search.'%')->orWhere('district_name','like','%'.$search.'%')->get();
            if(count($agent)>0)
                return view ('agent_mgt/index')->withAgents($agent)->withQuery($search);
            else
                return view('agent_mgt/index')->withMessage('No matching records found!!');
        }
    }

}
