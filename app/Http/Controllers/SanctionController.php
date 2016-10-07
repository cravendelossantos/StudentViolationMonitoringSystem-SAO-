<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Http\Requests;
use Yajra\Datatables\Facades\Datatables;
use App\ViolationReport;
use Response;
use Validator;
use App\CommunityService;
use Carbon\Carbon;
use App\Suspension;
use App\exclusion;
use DB;

class SanctionController extends Controller
{


    public function __construct()
    {
        $this->middleware('roles');
    }
    public function showSanctions()
    {
    	return view('sanction_monitoring');
    }

  
    public function searchStudent(Request $request)
    {

          

       
        $sanctions_student = ViolationReport::select('*')
        ->join('students', 'violation_reports.student_id' , '=' , 'students.student_no')->where('current_status' , 'Active');
                                             ;  

        return Datatables::of($sanctions_student)
            ->filter(function ($query) use ($request) {
                if ($request->has('sanction_student_no')) {
                    $query->where('student_no', 'like', "%{$request->get('sanction_student_no')}%");
                }
            })
            ->make(true);
    }

    public function showStudentViolations(Request $request)
    {
/*
     return Datatables::eloquent(ViolationReport::query()->leftJoin('students', 'violation_reports.student_id', '=', 'students.student_no')
            ->join('violations', 'violation_reports.violation_id', '=', 'violations.id')
                )->make(true);	*/	
    }

    public function getViolationDetails(Request $request)
    {

        $violation_details = ViolationReport::where('id', $request['id'])->first();
        return response()->json(array('response' => $violation_details));

    }

    public function getUpdateStatus(Request $request)
    {
            $validator = Validator::make($request->all(),[
            'sanction_status' => 'required',                   
        ]);

        if ($validator->fails()) {
            return Response::json(['success'=> false, 'errors' =>$validator->getMessageBag()->toArray()],400); 
          
        }


    }

    public function postUpdateStatus(Request $request)
    {
        $status = ViolationReport::where('id' , $request['sanction_violation_id'])
                                    ->update(['status' => $request['sanction_status'],
                                              'updated_by' => $request['m_updated_by'],
                                            ]);

        return Response::json(['success' => true, 'response' => $status], 200);
    }


    public function getAddToCS(Request $request)
    {

        $messages = [
            'cs_days.required.numeric' => 'The days of community work is required and must be a number',
             'cs_modal_student_id.unique' => 'This student is already excluded',
            'cs_violation_id.unique' => 'The violation already added in Community Serivce',
        ];

        $validator = Validator::make($request->all(),[
            'cs_days' => 'required|numeric|min:3',
            'cs_violation_id' => 'required|unique:community_services,violation_id',
            'cs_modal_student_id' => 'unique:exclusions,student_id',

        ],$messages);

        if ($validator->fails()) {
            return Response::json(['success'=> false, 'errors' =>$validator->getMessageBag()->toArray()],400); 
          
        }

    }

    public function postAddToCS(Request $request)
    {   
        
        $new_cs = new CommunityService();
        $new_cs->violation_id = $request['cs_violation_id'];
        $new_cs->date = Carbon::now();
        $new_cs->no_of_days = $request['cs_days'];
        $new_cs->required_hours = $request['cs_hours'];
        $new_cs->student_id = $request['cs_modal_student_id'];
        $new_cs->save();
        
        return Response::json(['success' => true, 'response' => $new_cs], 200);
    }

    public function getSuspension(Request $request)
    {

        if ($request['suspension_exclusion'] == 'Suspend')
        {
         $messages = [
            'suspension_days.required' => 'The no of suspension days is required',
              '_suspension_student_no.unique' => 'This student is already excluded',
            'suspension_violation_id.unique' => 'The violation already added in Suspensions',

        ];

        $validator = Validator::make($request->all(),[
            'suspension_days' => 'required|numeric|min:5',
            'suspension_violation_id' => 'required|unique:suspensions,violation_id',
            '_suspension_student_no' => 'unique:exclusions,student_id',


        ],$messages);
 if ($validator->fails()) {
            return Response::json(['success'=> false, 'errors' =>$validator->getMessageBag()->toArray()],400); 
          
        }
        }


        else if ($request['suspension_exclusion'] == 'Exclude'){
        $messages = [
          
            'suspension_violation_id.unique' => 'The violation already added in Suspensions',
            '_suspension_student_no.unique' => 'This student is already excluded',
        ];

        $validator = Validator::make($request->all(),[
       
            'suspension_violation_id' => 'required|unique:suspensions,violation_id',
            '_suspension_student_no' => 'unique:exclusions,student_id',

        ],$messages);
 if ($validator->fails()) {
            return Response::json(['success'=> false, 'errors' =>$validator->getMessageBag()->toArray()],400); 
          
        }
        }

        else{


                $message[] = 'Please select the sanction (suspension or exclusion)';
        return Response::json(['success'=> false, 'errors' => $message],400);
        }


       
    }

    public function postSuspension(Request $request)
    {
        if ($request['suspension_exclusion'] == 'Suspend')
        {
            $suspend = new Suspension(); 
            $suspend->violation_id = $request['suspension_violation_id'];
            $suspend->suspension_days = $request['suspension_days'];
            $suspend->status = 1;
            $suspend->student_id = $request['_suspension_student_no'];
            $suspend->save();

            return Response::json(['success' => true, 'response' => $suspend], 200);
        }
        else if ($request['suspension_exclusion'] == 'Exclude'){
            $exclusion = new Exclusion();
            $exclusion->student_id = $request['_suspension_student_no'];
            $exclusion->save();

            $up_student_status = DB::table('students')->where('student_no', $request['_suspension_student_no'])->update(['current_status' => 'Excluded']);

            return Response::json(['success' => true, 'response' => $exclusion], 200);
        }


        
    }

    public function suspensionTable(Request $request)
    {
        $suspended = Suspension::join('students', 'suspensions.student_id' , '=', 'students.student_no')->where('status', 'On going');
        
        return Datatables::of($suspended)
            ->filter(function ($query) use ($request) {
                if ($request->has('suspensions_student_no')) {
                    $query->where('student_no', 'like', "%{$request->get('suspensions_student_no')}%");
                }
            })
            ->make(true);;
    }


    public function exclusionTable(Request $request)
    {
        $suspended = Exclusion::join('students', 'exclusions.student_id' , '=', 'students.student_no');
        
        return Datatables::of($suspended)
            ->filter(function ($query) use ($request) {
                if ($request->has('suspensions_student_no')) {
                    $query->where('student_no', 'like', "%{$request->get('suspensions_student_no')}%");
                }
            })
            ->make(true);;
    }


    public function getSuspensionDetails(Request $request)
    {
           $suspension_details = Suspension::where('id', $request['id'])->join('students' , 'suspensions.student_id' , '=' ,'students.student_no')->first();
        return response()->json(array('response' => $suspension_details));
    }



  public function getSuspensionUpdate(Request $request)
  {

       $validator = Validator::make($request->all(),[
            'suspension_status' => 'required',                   
        ]);

        if ($validator->fails()) {
            return Response::json(['success'=> false, 'errors' =>$validator->getMessageBag()->toArray()],400); 
          
        }
  }

  public function postSuspensionUpdate(Request $request)
  {

    $status = Suspension::where('id' , $request['suspension_id'])
                                    ->update(['status' => $request['suspension_status'],
                                            ]);

        return Response::json(['success' => true, 'response' => $status], 200);
  }
}
