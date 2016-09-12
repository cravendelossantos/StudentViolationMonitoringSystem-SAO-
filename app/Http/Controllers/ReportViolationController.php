<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use DB;
use App\User;
use App\LostAndFound;
use App\Student;
use App\Violation;
use App\ViolationReport;
use Yajra\Datatables\Facades\Datatables;
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
    	//$violation_reports = ViolationReport::all()
   /*     $violation_reports = DB::table('violation_reports')->leftJoin('students_temp', 'violation_reports.student_id', '=', 'students_temp.student_id')->orderBy('created_at','desc')->get();*/
		$courses = DB::table('courses')->get();
		$violations = Violation::all();
       
        return view('report_violation', ['violations' => $violations])->with(['courses' => $courses]);
        //course will be autofilled if we already have the student records.
    }
	
    public function getViolationReportsTable()
    {
        return Datatables::eloquent(ViolationReport::query()->leftJoin('students', 'violation_reports.student_id', '=', 'students.student_no')
            ->join('violations', 'violation_reports.id', '=', 'violations.id')
                )->make(true);
    }   



    public function newStudentRecord(Request $request)
    {
         $messages = [
            'new_student_no.required.taken' => 'Please check the student information',
            'violation.required' => 'Please check violation details',
        ];

        $validator = Validator::make($request->all(),[
            'studentNo' => 'required|alpha_dash|max:255|unique:students,student_no',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'yearLevel' => 'required',
            'course' => 'required',
            'contactNo' => 'required|numeric',
        ]);
     
        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
        else {
           
          $new_student_record = new Student();
          $new_student_record->student_no = $request['studentNo'];
          $new_student_record->first_name = ucwords($request['firstName']);
          $new_student_record->last_name = ucwords($request['lastName']);
          $new_student_record->year_level = $request['yearLevel'];
          $new_student_record->course = $request['course'];
          $new_student_record->contact_no = $request['contactNo'];
          $new_student_record->date_created = Carbon::now();
          $new_student_record-> save();
            
            return response()->json(array(['success' => true, 'response' => $new_student_record]));
                //napasok kahit random na student number
        }
    }

    public function searchStudent(Request $request)
    {

          

        $term = $request->term;
    
        $data = Student::where('student_no', $term)->take(5)->get();
        $result=array();
        
        foreach ($data as $key => $value)
        {
            $result[]=[ 'value' => $value->student_no, 
                        'l_name' => $value->last_name, 
                        'f_name' => $value->first_name,
                        'course' => $value->course,
                        'year_level' =>$value->year_level
                      ];

        }
       // return response()->json($data);
        return response()->json($result);

    }
   public function showOffenseNo(Request $request)
   {
    $student_number = $request['student_number'];
    $violation_id = $request['violation_id'];
    $data = DB::table('violation_reports')->where('student_id', $student_number)->where('violation_id', $violation_id)->max('offense_no');


    return response(['response' => $data]);
   }

    public function searchViolation(Request $request)
    
    {
    
   
        $search_violation = DB::table('violations')->where('name', $request['violation'])->first();
        //make a violation model (relationship to violation_reports)
        return response()->json(['response' => $search_violation]);

    }
 	
	public function postReportViolation(Request $request)
	{
	   $messages = [
            'student_number.required' => 'Please check the student information',
            'violation.required' => 'Please check violation details',
        ];

		$validator = Validator::make($request->all(),[
        	'student_number' => 'required|alpha_dash|max:255',
            'violation' => 'required|string|max:255',
	    ],$messages);
     
        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
		else {
	       
            $student_violation = new ViolationReport();
            $student_violation->student_id = $request['student_number'];
            $student_violation->violation_id = $request['violation_id'];
            // $student_violation->violation_name = $request['violation'];
            $student_violation->offense_no = $request['offense_number'];
            $student_violation->date_reported = Carbon::now();
            $student_violation->save();
            
            return response()->json(array(['success' => true, 'response' => $student_violation]));
		      	//napasok kahit random na student number
		}
	}

    public function showStatistics()
    {
        return view('violation_statistics');
    }
	
}
