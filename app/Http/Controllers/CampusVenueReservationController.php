<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use DB;
use App\User;
use App\LostAndFound;
use Carbon\Carbon;
use DateTime;


class CampusVenueReservationController extends Controller
{
    public function __construct()
    {
    	$this->middleware('roles');
    }
    
 	public function showCampusVenueReservation()
    {

 $current_time = Carbon::now()->format('Y-m-d');


      $schoolyear = DB::table('school_years')->select('school_year')->where('term_name' , 'School Year')->whereDate('start', '<' ,$current_time)->whereDate('end' , '>', $current_time)->get();

      
       $selected_year = DB::table('school_years')->select('school_year')->where('term_name' , 'School Year')->whereDate('start', '<' ,$current_time)->whereDate('end' , '>', $current_time)->pluck('school_year');


       $organizations = DB::table('requirements')->where('school_year',$selected_year)->get();


    	// $campus_venue_reservation = DB::table('campus_venue_reservation')->get();
        $events = DB::table('events')->get();
       
        return view('campus_venue_reservation', ['CampusVenueReservationTable' => $events,'organizations' => $organizations, 'schoolyears' => $schoolyear]);
    }

          public function showCampusVenueReservationReports()
    {
      // $campus_venue_reservation = DB::table('campus_venue_reservation')->get();
        $events = DB::table('events')->get();
       
        return view('campus_venue_reservation_reports', ['CampusVenueReservationTable' => $events ]);
    }



    public function getEvents()
    {
      $data  = DB::table('events')->get();

      foreach ($data as $key)
      {
        $events[] = array(
          'id' => $key->id,
          'title' => $key->title,
          'venue' => $key->venue,
          'organization' => $key->organization,
          'status' => $key->status,
          'start' => $key->start,
          'end' => $key->end,
          'remark_status' => $key->remark_status,
          'cvf_no' => $key->cvf_no,
          ); 
      }

      return response()->json($events);  

    }
      public function getCampusVenueReservation()
    
    {
      // $campus_venue_reservation = DB::table('campus_venue_reservation')->get();
        $events = DB::table('events')->get();



        return Response::json($events);
    }
	
 	
    public function postCampusVenueReservationAdd(Request $request)
    {

          $event = DB::table('events')->insert([  
          // 'activity' = $request['activity'];
          // 'venue' = $request['venue'];
          // 'status' = '2';
          // 'remark_status' = 'null';

            'title' => $request['title'],
            'venue' => $request['venue'],
            'organization' => $request['organization'],
            'status' => $request['status'],
            'start' => $request['start'],
            'end'   => $request['end'],
            // 'remark_status' => $request['remark_status'],
            'cvf_no' => $request['cvf_no']

            ]);

    //$req = $bdd->prepare($sql);
    //$req->execute();
       
         return response()->json(array(
         'success' => true,
         'response' => $event,




        ));
    }

     public function postCampusVenueReservationUpdate(Request $request)
    {


        $validator = Validator::make($request->all(),[
            // 'title' => 'required',
          'id' => 'required',

        ]);
     
        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
        else {
           


          $event = DB::table('events')->where('id', $request['id'])->update([ 
            //'title' => $request['title'],
            'status' => $request['status'],
            'start' => $request['start'],
            'end' => $request['end'],



            ]);


       
        return response()->json(array(
            'success' => true,
            'response' => $event
        ));
    }

}



}



