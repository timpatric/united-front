<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\District;
use App\Member;

class DistrictManagementController extends Controller
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
    public function index()
    {

        $districts = DB::select('select * from districts');
        return view('district_mgt/index',['districts'=>$districts]);

        return view('district_mgt/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('district_mgt/create');
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

            $district = new District([
            'district_name' => $request->get('district_name'),
            'district_code' =>$request->get('district_code')
            
        ]);
            //dd($district);

            $district->save();

        return redirect()->route('district-management.index')->with('success','District added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $district = DB::select('select * from districts');
        return view('district-management.index',['districts'=>$districts]); 

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function search(Request $request)
     {
        $search = Input::get('search');

        if ($search != ""){
            $district = District::where('district_name','like','%'.$search.'%')->orWhere('district_code','like','%'.$search.'%')->get();
            if(count($district)>0)
                return view ('district_mgt/index')->withDistricts($district)->withQuery($search);
            else
                return view('district_mgt/index')->withMessage('No matching records found!!');
         
     }
}

}