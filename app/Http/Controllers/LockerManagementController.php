<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Locker;
use Validator;
use DB;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;


class LockerManagementController extends Controller
{
   /* public function __construct()
    {
    	$this->middleware('roles');
    }*/

    public function showLockers()
    {
    	
        $locations = DB::table('locker_locations')->get();
    	return view('locker_management',['locations' => $locations]);
    }

    public function showLockersTable()
    {
        return Datatables::eloquent(Locker::query())->make(true);

    }

    public function getLockerDetails(Request $request)
    {
        $locker = Locker::where('id', $request['id'])->first();
        return response()->json(array('response' => $locker));
    }

    public function addLockers(Request $request)
    {
    	$validator = Validator::make($request->all(),[
        	'no_of_lockers' => 'required|numeric',
        	'location' => 'required',
           
	    ]);

        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
		else {
            $new_location = $request['new_location'];
            $location = $request['location'];    

            


            if ($location == 'new') {
            DB::table('locker_locations')->insert(['location' => $new_location, 'date_added' => Carbon::now()]);
                $loc =  $new_location;
			} else {
                $loc =  $location;
            }
			$floor = $request['floor_no'];

            $start_no = $request['from'];



			
	
			
			$no_of_lockers = $request['no_of_lockers'];
			for ($i = 0; $no_of_lockers > $i; $i++)
			{
			$new_locker = new Locker();
            $new_locker->id = $start_no;
			$new_locker->location = $loc;
			$new_locker->status = 1;
			$new_locker->save();

            $start_no++;
			}
		      
             return response()->json(array('new'=>$new_location, 'old' =>$location)); 


		}
    }

    public function updateLocker(Request $request)
    {
     
        $update = Locker::where('id' , $request['m_locker_no'])->update(['status' => $request['m_update_status']]);

        return $request['m_update_status'];
    }

 

}
