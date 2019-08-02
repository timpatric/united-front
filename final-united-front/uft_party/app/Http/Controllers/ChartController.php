<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Charts;

use App\Agent;

use DB;

class ChartController extends Controller

{

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $agents = Agent::where(DB::raw("(DATE_FORMAT(reg_date,'%Y'))"),date('Y'))

                    ->get();

        $chart = Charts::database($agents, 'line', 'highcharts')

                  ->title("Agents registered per month")

                  ->elementLabel("Total Agents")

                  ->dimensions(700, 500)

                  ->responsive(false)

                  ->groupByMonth(date('Y'), true);

        return view('charts/index',compact('chart'));

    }

}