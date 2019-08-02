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

        $member_rec =DB::select(DB::raw('SELECT  DISTINCT rec_name
        FROM members WHERE rec_name IN
          (SELECT rec_name FROM members GROUP BY rec_name HAVING COUNT(*) >=40)'));
          $member_upgrade=count($member_rec);
          
          $members = DB::select('select * from members');
       return view('member_mgt/index',['members'=>$members,'member_upgrade'=>$member_upgrade]);
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
              'gender'      =>  $request->get('gender'),
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
     public function search(Request $request)
     {
        $search = $request->get('search');
        $members = DB::table('members')->where('member_name','like','%'.$search.'%');
        return view('member_mgt/index',['members'=>$members]);
     }

    public function destroy($member_id)
    {
        //
            DB::delete('delete from members where member_id = ?',[$member_id]);
         return redirect()->route('member-management.index')->with('success','Record deleted successfully');
    }

}
