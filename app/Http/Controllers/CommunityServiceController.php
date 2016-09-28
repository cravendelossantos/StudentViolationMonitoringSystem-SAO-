<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ViolationReport;
use App\CommunityService;
use Response;
use Yajra\Datatables\Facades\Datatables;
use Carbon\Carbon;
use Validator;

class CommunityServiceController extends Controller
{

	public function showCommunityService()
	{

		return view('community_service');
	}	

    public function searchStudent(Request $request)
    {

        $users = CommunityService::select('*')->leftJoin('students', 'community_services.student_id' , '=' , 'students.student_no');

        return Datatables::of($users)
            ->filter(function ($query) use ($request) {
                if ($request->has('student_id')) {
                    $query->where('student_id', 'like', "%{$request->get('student_id')}%");
                }

             /*   if ($request->has('email')) {
                    $query->where('email', 'like', "%{$request->get('email')}%");
                }*/
            })
            ->make(true);
    }

    public function getStudentLog(Request $request)
    {
    	  $tomorrow = Carbon::tomorrow()->format('y-m-d');


  /*     $messages = [
            'time_in.date_format()' => 'The student number and information is required.',
            'violation.required' => 'Please check violation details.',
            'date_committed.before' => 'Date must be not greater than today.',
        ];
*/
        try {
        	$request['time_in'] = Carbon::parse($request['time_in'])->format('h:iA');
        	$request['time_out'] = Carbon::parse($request['time_out'])->format('h:iA');
        }
        catch (\Exception $e) {
        	$message[] = 'Invalid date/s.';
	   	return Response::json(['success'=> false, 'errors' => $message],400); 
    }
       
        
        $validator = Validator::make($request->all(),[
            'time_in' => 'required|date_format:h:iA',
            'time_out' => 'required|date_format:h:iA',
      
        ]);
     
        if ($validator->fails()) {
            return Response::json(['success'=> false, 'time'=> $request['time_in'],'errors' =>$validator->getMessageBag()->toArray()],400); 
          
        }
        else{
        	$in = strtotime($request['time_in']);
        	$out = strtotime($request['time_out']);

        	if ($in > $out){
        		$message[] = 'The time in must not be grater than the time out';
        	 	return Response::json(['success'=> false, 'errors' => $message],400); 
        	}
        	else{
        		$diff = $out - $in;
        		$total = date('h:i', $diff);
        		 	return Response::json(['success'=>true ,  'total_hours' => $total]);
        	}

        	//dapat pati date kasama sa formula.. antok nako 
        	
     /*   	$y = Carbon::parse($request['time_out']);
        	$a = $x - $y;
        	$a = date_format(Carbon::parse($a), 'h:iA');*/
       
        }
    }
}
