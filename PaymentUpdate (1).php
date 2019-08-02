<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PaymentUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pay:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sumOfTreasury = DB::table('treasuries')->sum('amount');
        $sumPayable = $sumOfTreasury - 2000000;
        if($sumPayable > 0){
            //total number of districts with  agents in the system
            $numDistrict = DB::table('agents')->distinct('district_name')->count('district_name');
            $numAgent  = DB::table('agents')->count();

            //district(s) with the highest number of enrollments
            $maxEnrol = DB::table('districts')->max('member_total');
            $highDistrict = DB::table('districts')->where('member_total',$maxEnrol)
                                                  ->pluck('district_name');

            $highnumDistrict = $highDistrict->count('district_name');
            $highnum = 0;
            foreach($highDistrict as $district){
                $highAgent = DB::table('agents')->where('district_name',$district)->count('agent_name');

                //compute the sum of agents with high enrollment
                $highnum += $highAgent;
            }

            //check if all districts have equal enrollments
            if($numDistrict != $highnumDistrict){
            //standard agent salary per month
            $stdAgentSalary = $sumPayable/(1/2+(7/4*$numDistrict)+(1.75*$highnumDistrict)+$numAgent+$highnum);

            //payment description

            $adminPay = 1/2*$stdAgentSalary;
            $stdAgentH = 7/4*$stdAgentSalary;
            $highAgentH = 2*$stdAgentH;
            $highAgent = 2*$stdAgentSalary;
            //inserts into the payment table... hell yeah

            DB::table('salaries')->updateOrInsert(['role'=>'Administrator'],['amount'=>$adminPay,'total'=>$adminPay]);
            DB::table('salaries')->updateOrInsert(['role'=>'High-Agent-Head'],['amount'=>$highAgentH, 'total'=>$highnumDistrict*$highAgentH]);
            DB::table('salaries')->updateOrInsert(['role'=>'Agent-Head'],['amount'=>$stdAgentH,'total'=>($numDistrict-$highnumDistrict)*$stdAgentH]);
            DB::table('salaries')->updateOrInsert(['role'=>'High-Agent'],['amount'=>$highAgent,'total'=>$highAgent*$highnum]);
            DB::table('salaries')->updateOrInsert(['role'=>'Agent'],['amount'=>$stdAgentSalary,'total'=>$stdAgentSalary*($numAgent-$highnum)]);

            }
            else{
                $stdAgentSalary = $sumPayable/(1/2+(7/4*$numDistrict)+$numAgent);
                $adminPay = 1/2*$stdAgentSalary;
                $stdAgentH = 7/4*$stdAgentSalary;

                 //remove previous records
                 DB::table('salaries')->truncate();

                //insert into payment tables
                DB::table('salaries')->updateOrInsert(['role'=>'Administrator'],['Salary'=>$adminPay,'total'=>$adminPay]);
                DB::table('salaries')->updateOrInsert(['role'=>'Agent-Head'],['Salary'=>$stdAgentH,'total'=>$numDistrict*$stdAgentH]);
                DB::table('salaries')->updateOrInsert(['role'=>'Agent'],['Salary'=>$stdAgentSalary,'total'=>$stdAgentSalary*$numAgent]);





            }



        }
        else{
            DB::table('salaries')->truncate();
        }
    }
}
