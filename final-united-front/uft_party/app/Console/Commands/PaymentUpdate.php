<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

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
            $allDistricts = DB::table('agents')->distinct('district_name')->pluck('district_name');
            $numDistrict = $allDistricts->count('district_name');
            $numAgent  = DB::table('agents')->/*where('role','Agent')->*/count();

            //district(s) with the highest number of enrollments
            $maxEnrol = DB::table('districts')->max('member_total');
            $highDistrict = DB::table('districts')->where([['member_total',$maxEnrol],['agent_total','>',0]])
                                                  ->pluck('district_name');

            $highnumDistrict = $highDistrict->count('district_name');

            //districts with low enrollment
            $lowDistrict = DB::table('districts')->where([['member_total','not',$maxEnrol],['agent_total','>',0]])
            ->pluck('district_name');

            $highnum = 0;
            foreach($highDistrict as $district){
                $highAgent = DB::table('agents')->where([['district_name',$district],['role','Agent']])->count('agent_name');
                //$highAgent = DB::table('agents')->where('district_name',$district)->count('agent_name');
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
                //inserts into the payment table... hell yeah!!!!

                DB::table('salaries')->updateOrInsert(['role'=>'Administrator'],['amount'=>$adminPay,'Number'=>1,'total'=>$adminPay]);
                DB::table('salaries')->updateOrInsert(['role'=>'High-Agent-Head'],['amount'=>$highAgentH, 'Number'=>$highnumDistrict,'total'=>$highnumDistrict*$highAgentH]);
                DB::table('salaries')->updateOrInsert(['role'=>'Agent-Head'],['amount'=>$stdAgentH,'Number'=>($numDistrict-$highnumDistrict),'total'=>($numDistrict-$highnumDistrict)*$stdAgentH]);
                DB::table('salaries')->updateOrInsert(['role'=>'High-Agent'],['amount'=>$highAgent,'Number'=>$highnum,'total'=>$highAgent*$highnum]);
                DB::table('salaries')->updateOrInsert(['role'=>'Agent'],['amount'=>$stdAgentSalary,'Number'=>($numAgent-$highnum),'total'=>$stdAgentSalary*($numAgent-$highnum)]);

                //populating the agent table with the salaries
                /*$roles = DB::table('agents')->distinct('role')->pluck('role');
                foreach($roles as $role){
                    if(Str::is('Agent Head',$role)){
                        foreach($highDistrict as $districts){
                            DB::table('agents')->where([['role',$role],['district_name',$districts]])->update(['salary'=>$highAgentH]);

                        }
                        foreach($lowDistrict as $districts){
                            DB::table('agents')->where([['role',$role],['district_name',$districts]])->update(['salary'=>$stdAgentH]);
                        }
                    }
                    else{
                        foreach($highDistrict as $districts){
                            DB::table('agents')->where([['role',$role],['district_name',$districts]])->update(['salary'=>$highAgent]);

                        }
                        foreach($lowDistrict as $districts){
                            DB::table('agents')->where([['role',$role],['district_name',$districts]])->update(['salary'=>$stdAgentSalary]);
                        }

                    }


                }*/
            }

            else{
                $stdAgentSalary = $sumPayable/(1/2+(7/4*$numDistrict)+$numAgent);
                $adminPay = 1/2*$stdAgentSalary;
                $stdAgentH = 7/4*$stdAgentSalary;

                 //remove previous records
                 DB::table('salaries')->truncate();

                //insert into payment tables
                DB::table('salaries')->updateOrInsert(['role'=>'Administrator'],['amount'=>$adminPay,'Number'=>1,'Total'=>$adminPay]);
                DB::table('salaries')->updateOrInsert(['role'=>'Agent-Head'],['amount'=>$stdAgentH,'Number'=>$numDistrict,'Total'=>$numDistrict*$stdAgentH]);
                DB::table('salaries')->updateOrInsert(['role'=>'Agent'],['amount'=>$stdAgentSalary,'Number'=>$numAgent,'Total'=>$stdAgentSalary*$numAgent]);

                //insert salaries into the agents table
                /*$roles = DB::table('agents')->distinct('role')->pluck('role');
                foreach($lowDistrict as $districts){
                    foreach($roles as $role){
                        if(Str::is('Agent-Head',$role)){

                                DB::table('agents')->where([['role',$role],['district_name',$districts]])->update(['salary'=>$stdAgentH]);

                        }
                        else{
                                DB::table('agents')->where([['role',$role],['district_name',$districts]])->update(['salary'=>$stdAgentSalary]);
                            }

                        }


                }*/


            }


        }
        else{
            DB::table('salaries')->truncate();
            /*DB::table('salaries')->truncate();
            DB::table('agents')->update(['salary'=>0]);*/
        }

        //dumping payments to text fill for C server to read

        /*$districts = DB::table('districts')->pluck('district_name');
        $pay = DB::table('agents')->pluck('salary','agent_name');

        $count = $pay->count();

        $pay = Arr::divide($pay->toArray());

        foreach($districts as $district){
            $names = DB::table('agents')->where('district_name',$district)->pluck('agent_name');
            foreach($names as $name){
                $i = 0;
                while($i != $count){
                    if(Str::is($name,$pay[0][$i])){
                        Storage::append('salaries/'.$district.'.txt',$pay[0][$i]."    ".$pay[1][$i]);

                    }
                    $i +=1;
                }
            }

        }*/
        echo("\nDone!!\n");

    }
}
