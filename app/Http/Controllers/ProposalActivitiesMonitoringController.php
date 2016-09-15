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
use Auth;
use Yajra\Datatables\Facades\Datatables;

class ProposalActivitiesMonitoringController extends Controller
{
    public function __construct()
    {
    	$this->middleware('roles');
    }


    public function showProposalActivities()
    {
        //$Activities_table = DB::table('Activities')->orderBy('created_at','desc')->get();
       
        return view('proposal_activities_monitoring');
    }

    public function getActivitiesTable()
    {
        return Datatables::eloquent(Activity::query())->make(true);

    }    
     public function showAddActivity()
    { 
      return view('proposal_activities_monitoring_add');
    }

       public function getActivityDetails(Request $request)
    {
       $activities = Activity::where('id', $request['id'])->first();
       return response()->json(array('response' => $activities));
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
          'organizationName' => 'required|alpha|max:255',                   
      ]);

        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
    else {
  
      $activities = DB::table('activities')->where('id', $request['update_id'])->update([     
            'organization' => $request['organizationName'],
            'activity' => $request['title'],
            'date' => $request['date'],
            'status' => $request['status'],          
        ]);
      
      }

    }
    
 
         public function showProposalActivitiesReports()
    {

       
        return view('proposal_activities_monitoring_reports');
    }






}

