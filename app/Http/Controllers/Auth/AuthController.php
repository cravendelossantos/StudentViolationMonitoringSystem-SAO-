<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

use Illuminate\Support\Facades\Lang;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
        
	protected $guard ='admin';
    protected $redirectPath = '/index';
	protected $redirectTo = '/index';
    protected $loginPath = '/login';
	protected $redirectAfterLogout = '/login';
	protected $loginView ="/login";

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => ucfirst($data['firstName']),
            'last_name' => ucfirst($data['lastName']),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
	
	
	public function showLoginForm(){
		if(Auth::guard('admin')->check()){
		return redirect('/index');
	}
	
	else{
			return view('login');
		}
	}
	
    public function showRegistrationForm()
    {
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
		}
		elseif (Auth::guard('admin')->check()) {
			return redirect('/index');
		}
        

        return view('register');
    }
	
	 
    public function register(Request $request)
    {
     	$validator= Validator::make($request->all(),[
			'firstName'  => 'required|min:2|string',  
			'lastName'  => 'required|min:2|string',     
        	'email' => 'email|required|unique:users,email', 
            'password'=>'required|alpha_num|min:6|confirmed',
   			'password_confirmation' =>'', 

		]);
	
		if($validator->fails()){
				return response()->json(array('success'=> false,'errors' => $validator->getMessageBag()->toArray()));
		}
		else{
		
		$this->create($request->all());

		}
	}
	
	public function showRegisterTyPage()
    {
        return view('registerTyPage');
    }

    
	public function logout()
    {
    
       If(Auth::guard('admin')->logout());
       
		return redirect('/index');

    }


			
}
