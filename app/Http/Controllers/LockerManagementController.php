<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Locker;
use Validator;
use DB;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;
use App\SchoolYear;
use Response;
use App\LockerLocation;


class LockerManagementController extends Controller
{
   /* public function __construct()
    {
    	$this->middleware('roles');
    }*/

    public function showLockers()
    {
    	$contract_dates = SchoolYear::all();
         $locations = LockerLocation::all();


        $locations = DB::table('locker_locations')->get();


    	return view('locker_management',[ 'contract_dates' => $contract_dates, 'locations' => $locations]);
    }

    public function showLockersTable()
    {
        $lockers = DB::table('lockers')->join('locker_locations' , 'lockers.location_id', '=', 'locker_locations.id');
       return Datatables::of($lockers)->make(true);

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
            DB::table('locker_locations')->insert(['location_id' => $new_location, 'date_added' => Carbon::now()]);
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
			$new_locker->location_id = $loc;
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

 
    public function showLockerLocations()
    {   
        $locations = LockerLocation::all();
        return view('locker_locations',['locations' => $locations]);
    }

    public function getLockerLocations(Request $request)
    {

           $validator = Validator::make($request->all(),[
          'new_building' => 'required|string',
          'floor_selection' => 'required',

        ]);
     
        if ($validator->fails()) {
            return Response::json(['success'=> false, 'errors' =>$validator->getMessageBag()->toArray()],400); 
          
        }
    }

    public function postLockerLocations(Request $request)
    {

        $new_locker_location = new LockerLocation();
        $new_locker_location->building = $request['new_building'];
        $new_locker_location->floor = $request['floor_selection'];
        $new_locker_location->date_added = Carbon::now();
        $new_locker_location->save();

         return Response::json(['success'=> true, 'new_locker_location' => $new_locker_location],200); 
    }
}
