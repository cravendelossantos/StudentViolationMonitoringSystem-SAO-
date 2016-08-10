<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use Carbon\Carbon;

class sysController extends Controller {

  	public function __construct()
    {
        $this->middleware('admin');
    }
	
    public function showIndex()
    {
        return view('index');
    }
	
	public function showLogin2()
    {
        return view('loginv2');
    }
 	
 	public function showReportViolation()
    {
        return view('report_violation');
    }
	
	public function postReportViolation(Request $request)
	{
		$validator = Validator::make($request->all(),[
        	'studentNo' => 'required|alpha_dash|max:255',
            'violationSelection' => 'required|alpha|max:255',
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',            
      		'yearLevel' => 'required|max:255',
      		'course'=> 'required|max:255',
      		
	    ]);

        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
		else {
	
			$student_violation = DB::table('students_violation')->insert([			
            'student_no' => $request['studentNo'],
            'violation' => $request['violationSelection'],
            'first_name' => $request['firstName'],
            'last_name' => $request['lastName'],
            'year_level' => $request['yearLevel'],
 	        'course' => $request['course'],
 	        'date_created' => Carbon::now(),
        ]);
			
		}
		
	}
	
	public function showCommunityService()
    {
        return view('community_service');
    }
	
	public function showViolation()
    {
    	$violation_table = DB::table('violations')->get();
        return view('violation', ['violationTable' => $violation_table ]);
    }
	public function postViolation(Request $request)
	{
		$validator = Validator::make($request->all(),[
        	'violationNo' => 'required|numeric|max:255|unique:violations,violation_id',
            'violationOffenseLevel' => 'required|alpha|max:255',
            'violationName' => 'required|max:255',
            'violationDescription' => 'required|max:255',            
      		'violationSanction' => 'required|max:255',
	    ]);

        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
		else {
	
			$violation = DB::table('violations')->insert([			
            'violation_id' => $request['violationNo'],
            'offense_level' => $request['violationOffenseLevel'],
            'name' => $request['violationName'],
            'description' => $request['violationDescription'],
            'sanction' => $request['violationSanction'],
 	        'date_created' => Carbon::now(),
        ]);
			
		}
		
	}
	public function showSanctions()
    {
        return view('sanction_monitoring');
    }
	
	
	public function showLostAndFound()
	{
   		$lostandfound_table = DB::table('lost_and_found')->get();
        return view('lostandfound', ['lostandfoundTable' => $lostandfound_table ]);
	}
	
	public function postLostAndFoundAdd(Request $request)
	{
		$validator = Validator::make($request->all(),[
        	'itemName' => 'required|alpha|max:255',
            'endorserName' => 'required|alpha|max:255',
            'dateEndorsed' => 'required|max:255',
           
	    ]);

        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
		else {
	
			$lost_and_found = DB::table('lost_and_found')->insert([			
            'item' => $request['itemName'],
            'endorser_name' => $request['endorserName'],
 	        'date_endorsed' => Carbon::now(),
        ]);
			
		}
		
	}
	
	public function postLostAndFoundUpdate(Request $request)
	{
		$validator = Validator::make($request->all(),[
        	'claimerName' => 'required|alpha|max:255',
            'dateClaimed' => 'required|alpha|max:255',                    
	    ]);

        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
		else {
	
			$lost_and_found = DB::table('lost_and_found')->insert([			
            'claimer_name' => $request['claimerName'],
 	        'date_claimed' => Carbon::now(),
        ]);
			
		}
		
	}
	
	
	
	
	
	
	
}