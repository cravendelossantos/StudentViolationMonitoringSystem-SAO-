<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use DB;
use App\User;
use App\Activity;
use Carbon\Carbon;
use DateTime;


class ProposalActivitiesMonitoringController extends Controller
{
    public function __construct()
    {
    	$this->middleware('roles');
    }


    public function showProposalActivities()
    {
        $Activities_table = DB::table('Activities')->orderBy('created_at','desc')->get();
       
        return view('proposal_activities_monitoring',['activitiesTable'=> $Activities_table]);
    }

        public function showAddActivity()
    {

       
        return view('proposal_activities_monitoring_add');
    }

       public function getActivityDetails(Request $request)
    {
       $activity = Activity::where('id', $request['id'])->first();
       return response()->json(array('response' => $activity));
    }

        public function postProposalActivitiesAdd(Request $request)
    {
            
            
            $validator = Validator::make($request->all(),[
            'organizationName' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'date' => 'required|string'
           
        ]);

        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
        else {
    

          $activity = new Activity();
          $activity->organization =  $request['organizationName'];
          $activity->activity = $request['title'];
          $activity->date = $request['date'];
          $activity->status = '0';
          $activity->save();
        return response()->json(array(
            'success' => true,
            'response' => $activity
        ));
        }
    }

        public function postProposalActivitiesUpdate(Request $request)
    {
            
            
            $validator = Validator::make($request->all(),[
            'organizationName' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'date' => 'required|string'
           
        ]);

        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
        else {
    
          $activity->organization =  $request['organizationName'];
          $activity->activity = $request['title'];
          $activity->date = $request['date'];
          $activity->status = '0';
          $activity->save();
        return response()->json(array(
            'success' => true,
            'response' => $activity
        ));
        }
    }
    
 
         public function showProposalActivitiesReports()
    {

       
        return view('proposal_activities_monitoring_reports');
    }






}

