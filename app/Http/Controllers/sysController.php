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
use Yajra\Datatables\Facades\Datatables;
use Image;
use Hash;
class sysController extends Controller {
	
	public function __construct()
    {
        $this->middleware('roles');
    }

    public function changePassword(Request $request)
    {

        $validator= Validator::make($request->all(),[
            'old_password' => 'required',
            'password'=>'required|alpha_num|min:6|confirmed',
            'password_confirmation' =>'required',

        ]);
    
        if($validator->fails()){
        
                 return Response::json(['success'=> false, 'errors' =>$validator->getMessageBag()->toArray()],400); 
        }
        else {
            $old_pass = Auth::user()->password;

            if ( Hash::check($request['old_password'], $old_pass)){
                $user = Auth::user();
                $user->password = Hash::make($request['password']); 
                $user->save();

                return Response::json(['success' => true, 'response' => 'Password Successfully Changed!'], 200);
            }   
            else{
                $messages = ['message' => 'Old password is wrong!'];
                return Response::json(['success' => false, 'errors' => $messages], 400);
            }
        }
    }

    public function updateAvatar(Request $request)
    {
        if ($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' .$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/img/avatars/' .$filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return back()->with('success' , 'Profile image successfully changed!');
    }

    public function showEditAccount()
    {
        return view('edit_account');
    }

    public function getEditAccount(Request $request)
    {   


        $messages = [
            'contact_number.regex' => 'Contact number must start with (+63)',
            'contact_number.digits' => 'Contact number must be 13 digits',
        ];
         $validator= Validator::make($request->all(),[
            'first_name'  => 'required|min:2|string',  
            'last_name'  => 'required|min:2|string',
            'birthdate' => 'required|date',
            'contact_number' => array ('required', 'numeric', 'regex:/^(\+639)\d{9}$/', 'digits:13'),
            'address' => 'required|string', 
            'email' => 'email|required|unique:users,email,'.Auth::user()->id, 
            

        ],$messages);
    
        if($validator->fails()){
        
                 return Response::json(['success'=> false, 'errors' =>$validator->getMessageBag()->toArray()],400); 
        }
    }

    public function postEditAccount(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

        $user->first_name = ucwords($request['first_name']);
        $user->last_name = ucwords($request['last_name']);
        $user->birthdate = $request['birthdate'];
        $user->contact_no = $request['contact_number'];
        $user->address = ucwords($request['address']);
        $user->email = $request['email'];
        $user->save();

       return Response::json(['success' => true, 'data' => $user], 200);

    }   

    public function showDateSettings()
    {   
        $semesters = DB::table('school_years')->get();
        return view('date_settings', ['semesters' => $semesters]);
    }

    public function getDateSettings(Request $request)
    {
        $validator= Validator::make($request->all(),[
            
            'first_semester_start_date'  => 'required|date',  
            'first_semester_end_date'  => 'required|date',
            'second_semester_start_date' => 'required|date',
            'second_semester_end_date'=> 'required|date',
            'summer_start_date' => 'required|date',
            'summer_end_date' => 'required|date',
            'school_year' =>'required|unique:school_years,term_name', 


        ]);
        
        if($validator->fails()){
        
                 return Response::json(['success'=> false, 'errors' =>$validator->getMessageBag()->toArray()],400); 
        }
          



        
    }

    public function postDateSettings(Request $request)
    {




     /*   $ranges = array($request['first_semester_start_date'],
                       $request['first_semester_end_date'],
                       $request['second_semester_start_date'],
                       $request['second_semester_end_date'],
                       
                );

    

             $sems = (count($ranges)/2);


             $ranges = implode(",", $ranges);
             

             DB::table('school_years')->insert([
                'name' => $request['description'],
                'no_of_terms' => $sems,    
                'range' => $ranges,


                ]);

            for ($i=0; $i <= $sems; $i++)
            {   
            DB::table('semesters')->insert([
                'range' => $ranges,
                
                ]); 
            }*/
$data = array(
    array('school_year' => $request['school_year']  ,
          'term_name' => 'First Semester',
          'start'=> Carbon::parse($request['first_semester_start_date'])->format('Y-m-d'),
          'end'=> Carbon::parse($request['first_semester_end_date'])->format('Y-m-d')),
    
    array('school_year' => $request['school_year'],
          'term_name' => 'Second Semester',
          'start'=> Carbon::parse($request['second_semester_start_date'])->format('Y-m-d'),
          'end'=> Carbon::parse($request['second_semester_end_date'])->format('Y-m-d')),

    array('school_year' => $request['school_year'], 
          'term_name' => 'Summer',
          'start'=> Carbon::parse($request['summer_start_date'])->format('Y-m-d'), 
          'end'=> Carbon::parse($request['summer_end_date'])->format('Y-m-d')),

    array('school_year' => $request['school_year'], 
          'term_name' => 'School Year',
          'start'=> Carbon::parse($request['first_semester_start_date'])->format('Y-m-d'), 
          'end'=> Carbon::parse($request['summer_end_date'])->format('Y-m-d')),
            
    
    //...
);



        $sy = DB::table('school_years')->insert($data);
/*
        $a = DB::table('school_years')->insert([
                'name' => $request['description'],
                'no_of_terms' => 2,
            ]);*/


        
         /*return Response::json(['success' => true, 'sems' => $sems , 'shool_year' => $request['description'], 'date_ranges' => $ranges, ], 200);*/
         return Response::json(['success' => true, 'data' => $data], 200);
  
       
    }

    public function showSchoolYears()
    {

            $sy = DB::table('school_years')->where('term_name', 'School Year')->get();             
/*
             foreach ($sy as $key => $value) {
                    $data[] = ['ranges' => [$value->range],
                            'school_year' => $value->school_year,
                            'semesters' => $value->semesters,

                    ];

                }  */


             


            return response()->json(['data' => $sy]);
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
        $roles = Role::all();
        return view('user_management_admin',['roles' => $roles]);
    }

    public function getRegisterAdmin(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'first_name'  => 'required|min:2|string',  
            'last_name'  => 'required|min:2|string',
            'birthdate' => 'required|date',
            'contact_number' => 'required|numeric|digits:10',
            'address' => 'required|string', 
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
        $user->birthdate = $request['birthdate'];
        $user->contact_no = "+63".$request['contact_number'];
        $user->address = ucwords($request['address']);
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

    public function postAdminRevoke(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
       /* $user->delete();*/

         return back()->with('success' , 'User access successfully revoked.');
       
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
