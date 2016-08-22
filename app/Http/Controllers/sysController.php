<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use App\User;
use App\LostAndFound;
use Carbon\Carbon;
use DateTime;

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
    	$students_violation_table = DB::table('students_violation')->get();
		$courses = DB::table('courses')->get();
		$violations = DB::table('violations')->get();
        return view('report_violation', ['studentsViolationTable' => $students_violation_table ], ['violations' => $violations])->with(['courses'=>$courses]);
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
            'first_name' => ucwords($request['firstName']),
            'last_name' => ucwords($request['lastName']),
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
	
		
	public function showCourses()
    {
    	$courses = DB::table('courses')->get();
        return view('courses',["courses"=>$courses]);
    }

	public function postCourse(Request $request)
	{
		$course = $request->input('courseDesc');
		DB::table('courses')->insert(['course' => $course]);	
		return response()->json(['success' => true, "course"=>$course]);
	}
	
	public function showLostAndFound()
	{
   		$lostandfound_table = DB::table('lost_and_founds')->orderBy('created_at')->get();
        return view('lost_and_found', ['lostandfoundTable' => $lostandfound_table ]);
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
	
	
		  
			$report = LostAndFound::create([
				'item_description' => $request['itemName'],
            	'endorser_name' => $request['endorserName'],
            	'founded_at' => $request['foundedAt'],
            	'owner_name' => $request['ownerName'],
            	'status' => 1,
            //	'disposal_date' =>
            	'reporter_id' => Auth::guard('admin')->user()->id,
			]);
	
       
		return response()->json(array(
			'success' => true,
			'response' => $report
		));
		//enum and reported by.
		//check sorting.
	
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
