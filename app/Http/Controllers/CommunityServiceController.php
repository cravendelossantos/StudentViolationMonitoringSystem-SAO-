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
use DB;
use DateInterval;
use DateTime;
use DateTimeZone;
use App\TimeLog;


class CommunityServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('roles');
    }

	public function showCommunityService()
	{

		return view('community_service');
	}	

    public function searchStudent(Request $request)
    {

               
        $cs_student = DB::table('community_services');
        

        return Datatables::of($cs_student)
            ->filter(function ($query) use ($request) {
                if ($request->has('cs_student_no')) {
                    $query->where('student_id', 'like', "%{$request->get('cs_student_no')}%");
                }
            })
            ->make(true);
    

    }

    public function getStudentLog(Request $request)
    {
    	  $tomorrow = Carbon::tomorrow()->format('y-m-d');
          $today = Carbon::now()->format('y-m-d');

       $messages = [
            'time_in.date_format()' => 'The student number and information is required.',
            'violation.required' => 'Please check violation details.',
            'date_committed.before' => 'Date must be not greater than today.',
        ];

       try {

        	$in= Carbon::parse($request['log_date']." ".$request['time_in'])->format('y-m-d h:i:sa');
        	$out = Carbon::parse($request['log_date']." ".$request['time_out'])->format('y-m-d h:i:sa');    

 
            $t_out = strtotime($out);
            $t_in = strtotime($in);

            $in = new DateTime($in);
            $out = new DateTime($out);

            $total = $out->diff($in);
                // $diff = (abs($t_in - $t_out));
                // $total = Carbon::parse($diff)->format('h:i:s');

           
        }
        catch (\Exception $e) {
        	$message[] = 'Invalid date/s.';
	   	return Response::json(['success'=> false, 'errors' => $message],400); 
    }
       
        $messages = [
            '_time_log_cs_id.required' => 'Please select the community service record on the table',
            ];

        $validator = Validator::make($request->all(),[
            '_time_log_cs_id' => 'required',
            'log_date' => 'required|date',
            'time_in' => 'required|date_format:h:iA',
            'time_out' => 'required|date_format:h:iA',
            
        ],$messages);
        
     


        if ($validator->fails()) {
            return Response::json(['success'=> false, 'time'=> $request['time_in'],'errors' =>$validator->getMessageBag()->toArray()],400); 
          
        }
         else if ($in > $out){
                $message[] = 'The time in must not be grater than the time out';
                return Response::json(['success'=> false, 'errors' => $message],400); 
            }
  
        return Response::json(['success'=>true , 't_in'=> $t_in ,'in' => $in, 't_out' => $t_out, 'diff' => $total]);
        
    }

    public function postStudentLog(Request $request)
    {   


            $required_hours = CommunityService::select('required_hours')->where('id', $request['_time_log_cs_id'])->value('required_hours');
    
               try {

            $in= Carbon::parse($request['log_date']." ".$request['time_in'])->format('y-m-d h:i:sa');
            $out = Carbon::parse($request['log_date']." ".$request['time_out'])->format('y-m-d h:i:sa');    

 
            $t_out = strtotime($out);
            $t_in = strtotime($in);

            $in = new DateTime($in);
            $out = new DateTime($out);

            $total = $out->diff($in);
                // $diff = (abs($t_in - $t_out));
                // $total = Carbon::parse($diff)->format('h:i:s');


        }
        catch (\Exception $e) {
            $message[] = 'Invalid date/s.';
        }
        $required_hours = (string) $required_hours;
        $required_hours = $required_hours .':00:00';

        $required_hours = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $required_hours);

        sscanf($required_hours, "%d:%d:%d", $hours, $minutes, $seconds);

        $required_seconds = $hours * 3600 + $minutes * 60 + $seconds;
     


       $rendered = (''.$total->h .":". $total->i.':00');

         $rendered = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $rendered);

        sscanf($rendered, "%d:%d:%d", $r_hours, $r_minutes, $r_seconds);

        $rendered_seconds = $r_hours * 3600 + $r_minutes * 60 + $r_seconds;


        $total = abs($required_seconds - $rendered_seconds);

        $total = $total/3600;

        
        $new_log = new TimeLog();
        $new_log->time_in = $in;
        $new_log->time_out = $out;
        $new_log->student_id = $request['_time_log_student_no'];
        $new_log->cs_id = $request['_time_log_cs_id'];
        $new_log->save();

               
       $hours_update = CommunityService::where('id' , $request['_time_log_cs_id'])
                            ->update(['required_hours' => $total]);





                 return Response::json(['success'=>true , 'rendered'=>$rendered_seconds, 'required'=> $required_seconds, 'total' => $total]);

            


    }
        public function getCommunityServiceDetails(Request $request)
    {

        $cs_details = CommunityService::where('id', $request['id'])->join('students' , 'community_services.student_id', '=' , 'students.student_no')->first();
        return response()->json(array('response' => $cs_details));

    }

}
