<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


// use App\uploadDetailsModel;

use App\Member;


class memberUpload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:details';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '<<<<This program will upload details stored in the .txt file from the c socket>>>>';

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
        //set the path for the txt files
        $path = base_path("storage/app/member-enrollment.txt");   


        //run 2 loops at a time 
        foreach (array_slice(glob($path),0, 4) as $file) {

            
            //read the data into an array
            $data = array_map('str_getcsv', file($file));

            //loop over the data
            foreach($data as $row) {

               DB::table('members')->updateOrInsert(
                   ['member_name'=>$row[0],'gender'=>$row[1],'rec_name'=>$row[2],'reg_date'=>$row[3]
                   ] ); 
               
                echo ("\nSuccess!!\n\n");

            }

            // //delete the file
            // unlink($file);
        }
    }

}
