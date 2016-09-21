<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Locker;
use Validator;

class LockerManagementController extends Controller
{
   /* public function __construct()
    {
    	$this->middleware('roles');
    }*/

    public function showLockers()
    {
    	$lockers = Locker::all();
    	return view('locker_management',['lockers' => $lockers]);
    }

    public function addLockers(Request $request)
    {
    	$validator = Validator::make($request->all(),[
        	'no_of_lockers' => 'required|numeric',
        	'floor_no' => 'required',
        	'location' => 'required',
           
	    ]);

        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
		else {
			$location =$request['location']; 
			$floor = $request['floor_no'];




			$loc =  "$floor $location";
	
			
			$no_of_lockers = $request['no_of_lockers'];
			for ($i = 0; $no_of_lockers > $i; $i++)
			{
			$new_locker = new Locker();
			$new_locker->location = $loc;
			$new_locker->status = 1;
			$new_locker->save();
			}
		


		}
    }
}
