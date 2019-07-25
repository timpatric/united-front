<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        //
           $agent = new Agent([
              'agent_name'          =>   $request->get('agent_name'),
              'gender'  =>   $request->get('gender'),
              'district_name'    =>  $request->get('district_name'),
              'contact'      =>  $request->get('contact'),
              'email'      =>  $request->get('email'),
              'agent_sign'      =>  $request->get('agent_sign'),
              'role'      =>  $request->get('role'),
              'reg_date'      =>  $request->get('reg_date')
        ]);
            $agent->save();

        return redirect()->route('agent-management.index')->with('success','New agent added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agents = DB::select('select * from agents where agent_id = ?',[$id]);
return view('agent_mgt/edit',['agents'=>$agents]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$agent_id)
    {
        $agent_name = $request->input('agent_name');
        $gender = $request->input('gender');
        $district_name = $request->input('district_name');
        $contact = $request->input('contact');
        $email = $request->input('email');
        $agent_sign = $request->input('agent_sign');
        $role = $request->input('role');
        $reg_date = $request->input('reg_date');
        //$data=array('first_name'=>$first_name,"last_name"=>$last_name,"city_name"=>$city_name,"email"=>$email);
        //DB::table('student')->update($data);
        // DB::table('student')->whereIn('id', $id)->update($request->all());
        DB::update('update agents set agent_name = ?,gender=?,district_name=?,contact = ?,email=?,agent_sign=?,role=?,reg_date=? where agent_id = ?',[$agent_name,$gender,$district_name,$contact,$email,$agent_sign,$role,$reg_date,$agent_id]);
        // echo "Record updated successfully.
        // ";
        // echo '<a href="/agent_management">Click Here</a> to go back.';
        // 
        return redirect()->route('agent-management.index')->with('success','Agent details updated successfully');
        }

 
    public function destroy($agent_id)
    {
        //
            DB::delete('delete from agents where agent_id = ?',[$agent_id]);
         return redirect()->route('agent-management.index')->with('success','Agent removed successfully');
     }
}
