<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use storage;


class addrecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:addrecords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adding records from text file';

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
        //
        echo "hi";

        //

    }
}
