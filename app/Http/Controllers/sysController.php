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
        $this->middleware('roles');
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
	

	
	
}
