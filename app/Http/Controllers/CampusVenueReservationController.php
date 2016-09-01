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
    	// $campus_venue_reservation = DB::table('campus_venue_reservation')->get();
        $events = DB::table('events')->get();
       
        return view('campus_venue_reservation', ['CampusVenueReservationTable' => $events ]);
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
            'start' => $request['start'],
            'end'   => $request['end'],
            'color' => $request['color'],

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

          $event = DB::table('events')->update([ 
            'id'    => $request['id'], 
            'title' => $request['title'],
            'start' => $request['start'],
            'end'   => $request['end'],
            'color' => $request['color'],
            ])->where('id', '=', 'id');


       
        return response()->json(array(
            'success' => true,
            'response' => $event
        ));
    }





}



