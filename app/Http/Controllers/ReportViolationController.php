<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use DB;
use App\User;
use App\LostAndFound;
use Carbon\Carbon;
use DateTime;


class ReportViolationController extends Controller
{
    public function __construct()
    {
    	$this->middleware('roles');
    }
    
 	public function showReportViolation()
    {
    	$students_violation_table = DB::table('students_violation')->get();
		$courses = DB::table('courses')->get();
		$violations = DB::table('violations')->get();
       
        return view('report_violation', ['studentsViolationTable' => $students_violation_table ], ['violations' => $violations])->with(['courses'=>$courses]);
    }
	

    public function searchViolation(Request $request)
    
    {
        $search = DB::table('violations')->where('name', $request['violation'])->first();
        
        return response(['reponse' => $search]);
        return response()->json(array(['success' => true, 'response' => $search])); 
    }
 	
	public function postReportViolation(Request $request)
	{
	
		$validator = Validator::make($request->all(),[
        	'studentNo' => 'required|alpha_dash|max:255',
            'violationSelection' => 'required|string|max:255',
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
	
}
