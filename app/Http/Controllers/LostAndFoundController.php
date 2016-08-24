<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\User;
use App\LostAndFound;
use Carbon\Carbon;
use DateTime;
use Validator;

class LostAndFoundController extends Controller
{
	public function __construct()
    {
        $this->middleware('admin');
    }
	
	
	public function showLostAndFound()
	{
   		$lostandfound_table = DB::table('lost_and_founds')->orderBy('created_at','desc')->get();
        return view('lost_and_found', ['lostandfoundTable' => $lostandfound_table ]);
	}
	
	public function getLostAndFoundTable()
	{
		$lostandfound_table = DB::table('lost_and_founds')->orderBy('created_at','desc')->get();
		return view('tables.lost_and_founds_table', ['lostandfoundTable' => $lostandfound_table ]);
	
	}
	
	public function searchLostAndFound(Request $request)
	{
		$item = $request->input('searchBox');
		$lostandfound_table = DB::table('lost_and_founds')->where('item_description', 'like', '%' .$item. '%')->get();
		return view('tables.lost_and_founds_table', ['lostandfoundTable' => $lostandfound_table ]);
	}

	public function postLostAndFoundAdd(Request $request)
	{
			$now = new DateTime();
			
			$validator = Validator::make($request->all(),[
        	'itemName' => 'required|string|max:255',
            'endorserName' => 'required|string|max:255',
    		'foundedAt' => 'required|string'
           
	    ]);

        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
		else {
	

		  $report = new LostAndFound();
		  $report->item_description =  $request['itemName'];
		  $report->endorser_name = $request['endorserName'];
		  $report->founded_at = $request['foundedAt'];
		  $report->owner_name = $request['ownerName'];
		  $report->status = '1';
		  $report->reporter_id = LostAndFound::user($this);
		  $report->save();
		  //gets the request of current user logged in and save report
		  
		  
		/*
			$report = LostAndFound::create([
						'item_description' => $request['itemName'],
						'endorser_name' => $request['endorserName'],
						'founded_at' => $request['foundedAt'],
						'owner_name' => $request['ownerName'],
						'status' => 1,
					//	'disposal_date' =>
						'reporter_id' =>
					]);*/
		
	
       
		return response()->json(array(
			'success' => true,
			'response' => $report
		));
		//enum and reported by.
		//search
		//modal report
		//logic for donated items.
		//etc etc
	
		}

	}
	
	public function postLostAndFoundUpdate(Request $request)
	{
		$validator = Validator::make($request->all(),[
        	'claimerName' => 'required|alpha|max:255',
            'dateClaimed' => 'required|max:255',                    
	    ]);

        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
		else {
	
			$lost_and_found = DB::table('lost_and_found')->update([			
            'claimer_name' => $request['claimerName'],
 	        'date_claimed' => Carbon::now(),
        ]);
			
		}
		
		return redirect('/lostandfound');
	}
	
	
}
