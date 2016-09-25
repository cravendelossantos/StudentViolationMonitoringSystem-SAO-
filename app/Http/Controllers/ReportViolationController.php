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
use Response;

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
		
       
        // return view('report_violation', ['violations' => $violations])->with(['courses' => $courses]);
        return view('report_violation', ['courses' => $courses]);

        //course will be autofilled if we already have the student records.
    }
	
    public function getViolations(Request $request)
    {
        $violations = Violation::where('offense_level', $request['offense_level'])->get();
        return response(array('violations' => $violations));
    }   

    public function getViolationReportsTable()
    {
        return Datatables::eloquent(ViolationReport::query()->leftJoin('students', 'violation_reports.student_id', '=', 'students.student_no')
            ->join('violations', 'violation_reports.violation_id', '=', 'violations.id')
                )->make(true);
    }   



    public function newStudentRecord(Request $request)
    {
         $messages = [
            'new_student_no.required.taken' => 'Please check the student information',
            'violation.required' => 'Please check violation details',
        ];

        $validator = Validator::make($request->all(),[

            'studentNo' => array('required', 'regex:/^[0-9\s-]+$/', 'unique:students,student_no'),
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

    //Same ID/ Violation
    $same_violation = DB::table('violation_reports')->where('student_id', $student_number)->where('violation_id', $violation_id)->where('violation_id', $violation_id)->max('offense_no');



    //Count diff violations with same offense level
      ///GET the diff types
     $different_violations = DB::table('violation_reports')
                ->where('student_id', $student_number)
                ->where('offense_level', $request['offense_level'])->count(DB::raw('DISTINCT violation_id'));

     //Count only valid offenses

    if ($same_violation == null)
    {
       $offense_number = $same_violation +=1;
       $sanction = DB::table('violations')->select('first_offense_sanction as sanction')->where('id', $violation_id)->first(); 
    }
     else if ($same_violation == 1)
    {
      $offense_number = $same_violation +=1;
       $sanction = DB::table('violations')->select('second_offense_sanction as sanction')->where('id', $violation_id)->first(); 
    }
    else if ($same_violation == 2)
    {
       $offense_number = $same_violation +=1;
       $sanction = DB::table('violations')->select('third_offense_sanction as sanction')->where('id', $violation_id)->first(); 
    }
 
    else if ($same_violation == 3)
    {
         $offense_number = $same_violation +=1;// pang 4th na
          $sanction = DB::table('violations')->select('third_offense_sanction as sanction')->where('id', $violation_id)->first(); 
    }
  if ($different_violations == 1)
    {
        $different_violations = $different_violations;
       // 2 + 1 = 3rd diff type
    }
 /*   else if ($same_violation == 4)
    {
             $sanction = DB::table('violations')->select('third_offense_sanction as sanction')->where('id', $violation_id)->first(); 
    }*/


     return response(array('offense_no' => $same_violation , 'sanction' => $sanction, 'diff_type_offense' => $different_violations));
    
   }

    public function searchViolation(Request $request)
    
    {
    
   
        $search_violation = DB::table('violations')->where('name', $request['violation'])->first();
        //make a violation model (relationship to violation_reports)
        return response()->json(['response' => $search_violation]);

    }
 	public function getReportViolation(Request $request)
    {
        $tomorrow = Carbon::tomorrow()->format('y-m-d');
       $messages = [
            'student_number.required' => 'The student number and information is required.',
            'violation.required' => 'Please check violation details.',
            'date_committed.before' => 'Date must be not greater than today.',
        ];

        $validator = Validator::make($request->all(),[
            'student_number' => 'required|alpha_dash|max:255',
            'violation' => 'required|string|max:255',
            'date_committed' => 'required|date|before:' .$tomorrow,
            'complainant' => 'required',
        ],$messages);
     
        if ($validator->fails()) {
            return Response::json(['success'=> false, 'errors' =>$validator->getMessageBag()->toArray()],400); 
          
        }
    }


	public function postReportViolation(Request $request)
	{
       
	       
            $data_committed = Carbon::parse($request['date_committed']);

            $student_violation = new ViolationReport();
            $student_violation->student_id = $request['student_number'];
            $student_violation->violation_id = $request['violation_id'];
            // $student_violation->violation_name = $request['violation'];
            $student_violation->complainant = $request['complainant'];
            $student_violation->sanction = $request['sanction'];
            $student_violation->offense_level = $request['offense_level'];
            $student_violation->offense_no = $request['offense_number'];
            $student_violation->date_reported = $data_committed;
            $student_violation->save();
            

            return Response::json(['success' => true, 'response' => $student_violation], 200);
            //return response()->json(array(['success' => true, 'response' => $student_violation]));
		      

	}

    public function elevateToSerious(Request $request)
    {
        $violation = DB::table('violations')->where('name', 'LIKE', "%" .$request['name']. "%")->first();
        return Response::json(['violation' => $violation]);
    }

    public function showStatistics()
    {
        return view('violation_statistics');
    }
	
}
