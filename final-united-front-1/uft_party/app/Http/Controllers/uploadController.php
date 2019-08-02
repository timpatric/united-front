<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class uploadController extends Controller
{

    public function import()   // will handle importing of the files
    {
    	//setup an empty array
    	$records = [];

    	//path where the txt files are stored
        // $path = base_path('sockets/members.txt');
        $path = base_path('sockets/');

        //loop over each file
        foreach (glob($path.'/*.txt') as $file) {

        	//open the file and add the total number of lines to the records array
            $file = new \SplFileObject($file, 'r');
            $file->seek(PHP_INT_MAX);
            $records[] = $file->key();
        }

        //now sum all the array keys together to get the total
        $toImport = array_sum($records);

        return view('import', compact('toImport'));
    }


	public function parseImport()    // will handle uploading to db
	{
	    request()->validate([
	        'file' => 'required|mimes:csv,txt'
	    ]);

	    //get file from upload
	    $path = request()->file('file')->getRealPath();

	    //turn into array
	    $file = file($path);

	    // //remove first line
	    // $data = array_slice($file, 1);

	    //loop through file and split every 5 lines
	    $parts = (array_chunk($data, 5));
	    $i = 1;
	    foreach($parts as $line) {
	        $filename = base_path('resources/pendingUploadsv/'.date('y-m-d-H-i-s').$i.'.txt');
	        file_put_contents($filename, $line);
	        $i++;
	    }

	    session()->flash('status', 'queued for importing');

	    return redirect("import");
	}

}