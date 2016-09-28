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
use Response;
use App\Role;


class sysController extends Controller {
	
	public function __construct()
    {
        $this->middleware('roles');
    }

    public function showDateSettings()
    {
        return view('date_settings');
    }

    public function getDateSettings(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'first_semester_start_date'  => 'required|date|unique:first_semester,start',  
            'first_semester_end_date'  => 'required|date|unique:first_semester,end',     
            'second_semester_start_date' => 'required|date|unique:second_semester,start', 
            'second_semester_end_date'=> 'required|date|unique:second_semester,end',
            'description' =>'required|unique:school_years,description', 

        ]);
    
        if($validator->fails()){
        
                 return Response::json(['success'=> false, 'errors' =>$validator->getMessageBag()->toArray()],400); 
        }
    }

    public function postDateSettings(Request $request)
    {
        $school_year = DB::table('school_years')->insert([
            'description' => $request['description']
            ]);

        $first_sem = DB::table('first_semester')->insert([
            'start' => $request['f_from'],
            'end' => $request['f_to'],
            ]);

        $second_sem = DB::table('second_semester')->insert([
            'start' => $request['s_from'],
            'end' => $request['s_to'],
            ]);

        return Response::json(['success' => true, 'school_year' => $school_year , 'first_semester' => $first_sem , 'second_semester' => $second_sem], 200);
    }

    //Super user admin account registration
	  public function showRegisterSuperUser()
    {
        return view('user_management_super_user');
    }

    public function getRegisterSuperUser(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'first_name'  => 'required|min:2|string|alpha',  
            'last_name'  => 'required|min:2|string|alpha',     
            'email' => 'email|required|unique:users,email', 
            'password'=>'required|alpha_num|min:6|confirmed',
            'password_confirmation' =>'', 

        ]);
    
        if($validator->fails()){
        
                 return Response::json(['success'=> false, 'errors' =>$validator->getMessageBag()->toArray()],400); 
        }
    }

    public function postRegisterSuperUser(Request $request)
    {
        $role_admin = Role::where('name', 'Admin')->first();    

        $user = new User();
        $user->first_name = ucwords($request['first_name']);
        $user->last_name = ucwords($request['last_name']);
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        $user->roles()->attach($role_admin);
        //Auth::logout($user);

        return Response::json(['success' => true, 'response' => $user], 200);
    }





    //Admin secretary/admin account registration

      public function showRegisterAdmin()
    {
        return view('user_management_admin');
    }

    public function getRegisterAdmin(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'first_name'  => 'required|min:2|string|alpha',  
            'last_name'  => 'required|min:2|string|alpha',     
            'email' => 'email|required|unique:users,email', 
            'password'=>'required|alpha_num|min:6|confirmed',
            'password_confirmation' =>'',
            'user_type' => 'required|exists:roles,name', 

        ]);
    
        if($validator->fails()){
        
                 return Response::json(['success'=> false, 'errors' =>$validator->getMessageBag()->toArray()],400); 
        }
    }

    public function postRegisterAdmin(Request $request)
    {

        if ($request['user_type'] == 'Admin')
        {
            $role = Role::where('name', 'Admin')->first();   
          
        }
        else if ($request['user_type'] == 'Secretary') 
        {
            $role = Role::where('name' , 'Secretary')->first();
            
        } 
        

        $user = new User();
        $user->first_name = ucwords($request['first_name']);
        $user->last_name = ucwords($request['last_name']);
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        $user->roles()->attach($role);
        //Auth::logout($user);

        return Response::json(['success' => true, 'response' => $user], 200);
    }

    public function showRoles()
    {   
        $users = User::all();
        return view('roles_management', ['users' => $users]);
    }

    public function postAdminAssignRoles(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
   

        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }


        if ($request['role_secretary']) {
            $user->roles()->attach(Role::where('name', 'Secretary')->first());
        }

        return back()->with('success' , 'Role(s) successfully assigned.');
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
	/*public function postViolation(Request $request)
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
		
	}*/
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
