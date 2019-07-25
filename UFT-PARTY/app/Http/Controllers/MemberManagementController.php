<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Member;

class MemberManagementController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = DB::select('select * from members');
       return view('member_mgt/index',['members'=>$members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('member_mgt/create');
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

            $member = new Member([
              'member_id'           =>   $request->get('member_id'),
              'member_name'  =>   $request->get('member_name'),
              'district_name'      =>  $request->get('district_name'),
              'agent_name'      =>  $request->get('agent_name'),
              'gender'      =>  $request->get('gender'),
              'agent_sign'      =>  $request->get('agent_sign'),
              'rec_name'      =>  $request->get('rec_name'),
              'reg_date'      =>  $request->get('reg_date')
        ]);
            $member->save();

        return redirect()->route('member-management.index')->with('success','Record added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $members = DB::select('select * from members where id = ?',[$id]);
        return view('member_mgt/edit',['members'=>$members]);
    }

    public function destroy($id)
    {
        //
            DB::delete('delete from members where id = ?',[$id]);
         return redirect()->route('member-management.index')->with('success','Record deleted successfully');
    }


        public function upgrades(){
        

        $memberqualify=DB::select(DB::raw('SELECT * from members where status=0 AND fname IN (SELECT DISTINCT recommender
        FROM members WHERE recommender IN
          (SELECT recommender FROM members GROUP BY recommender HAVING COUNT(*) >=40))'));
          
          $districtAvailable=DB::select(DB::raw('SELECT * from districts where id NOT IN (SELECT district_Id from agents)
          OR id=( SELECT  district_Id  FROM agents GROUP by district_Id order by COUNT(1) ASC LIMIT 1) ORDER BY RAND() LIMIT 5'));
          return view('upgrade',compact('memberqualify','districtAvailable'));
    }


       // randomly distribute  members who qualify to be agents
   public function becomeAgent(){

       
    $memberqualified=DB::select(DB::raw('SELECT * from members where status=0 AND fname IN (SELECT DISTINCT recommender
    FROM members WHERE recommender IN
    (SELECT recommender FROM members GROUP BY recommender HAVING COUNT(*) >=40))'));
     $Agent;
        $Agent=new agent;
      foreach($memberqualified as $member){
       if($member->fname!==NULL){
      $Agent->firstName=$member->fname;
      $Agent->lastName=$member->fname;
      $Agent->userName=substr($member->fname,0,5);
      $Agent->signature=chr(rand(65,90));
    DB::statement('UPDATE members Set status=1 where member_Id='.$member->member_Id);
      $district_id=DB::select('SELECT id from districts where id NOT IN (SELECT district_Id from agents)
      OR id=( SELECT  district_Id  FROM agents GROUP by district_Id order by COUNT(1) ASC LIMIT 1) ORDER BY RAND() LIMIT 5');
   
     foreach($district_id as $dist){
                 global $distt;
               $distt=$dist->id;
            
       }
        $Agent->district_Id=$distt ;
  
        $distNoAgenthead=DB::select(DB::raw('SELECT id as nums from districts where id NOT IN (SELECT district_Id from agents)'));
      
         foreach ($distNoAgenthead as $head){
                 global $headno;
                 $headno=$head->nums;
        }
     if($headno==$Agent->district_Id){
        $Agent->role="Agent head";
       }  $district_id=DB::select('SELECT id from districts where id NOT IN (SELECT district_Id from agents)
       OR id=( SELECT  district_Id  FROM agents GROUP by district_Id order by COUNT(1) ASC LIMIT 1) ORDER BY RAND() LIMIT 5');
      
      foreach($district_id as $dist){
                    global $distt;
                  $distt=$dist->id;
               
       }
       $Agent->district_Id=$distt ;
     
       $distNoAgenthead=DB::select(DB::raw('SELECT id as nums from districts where id NOT IN (SELECT district_Id from agents)'));
         
       foreach ($distNoAgenthead as $head){
                    global $headno;
                    $headno=$head->nums;
                    // return $headno;
       }
       if($headno==$Agent->district_Id && $headno!=NULL){
           $Agent->role="Agent head";
           $Agent->save();
           return redirect()->back()->withSuccess('New member has been upgraded  successfully');;
       }
       else {
           $Agent->role="Agent";
           $Agent->save();
           return redirect()->back()->withSuccess('New member has been upgraded  successfully');;
       }
       
    }

    
      
    }
    return redirect()->back()->withSuccess('No member has the required criteria');         
    }

}
