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
use App\Course;


class sysController extends Controller {
	
	public function __construct()
    {
        $this->middleware('roles');
    }
	
    public function showSMS()
    {
        return view('text_messaging');
    }

    public function sendSMS(Request $request)
    {
        $number = $request['number'];
        $message = $request['message'];
               
//exec("C:\.....\ gammu.exe" -sendsms etc etc);
        $a = shell_exec('"C:\Program Files\Gammu\bin\gammu.exe" --sendsms TEXT '.$number.' -text "hello world"');
        //$response = shell_exec('gammu sendsms TEXT  '.$number.' -text'  "enews");
        return $a;

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
        	
            'offense_level' => 'required|max:255',
            'violationName' => 'required|max:255',
            'violationDescription' => 'required|max:255',            
      		'first_offense_sanction' => 'required|max:255',
            'second_offense_sanction' => 'required|max:255',
            'third_offense_sanction' => 'required|max:255',
	    ]);

        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
		else {
	
			$violation = DB::table('violations')->insert([			
            
            'offense_level' => $request['offense_level'],
            'name' => $request['violationName'],
            'description' => $request['violationDescription'],
            'first_offense_sanction' => $request['first_offense_sanction'],
            'second_offense_sanction' => $request['second_offense_sanction'],
 	        'third_offense_sanction' => $request['third_offense_sanction'],
            'created_at' => Carbon::now(),
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
	   $course = new Course();
       $course->description = $request['course_description'];
       $course->save();
	}
	

	
	
}
