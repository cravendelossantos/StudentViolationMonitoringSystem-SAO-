<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use DB;
use App\User;
use App\LostAndFound;
use App\Requirements;
use Carbon\Carbon;
use DateTime;
use Auth;
use Yajra\Datatables\Facades\Datatables;
use Response;


class OrganizationsRenewalController extends Controller
{
    public function __construct()
    {
    	$this->middleware('roles');
    }
    
 	public function showOrganizationsRenewal()
    {

       
        return view('organizations_renewal');
    }

  public function showOrganizationsRenewalList()
    {

       
        return view('organizations_renewal_list');
    }


        public function getRequirementsTable()
    {


        return Datatables::eloquent(Requirements::query())->make(true);

    }




        public function getRequirementsByName(Request $request)
    {
       // $requirements = Requirements::where('organization', $request['organizationName'])->first();
       // return response()->json(array('response' => $requirements));

       //  $requirements = DB::table('requirements')->where('organization', $request['organizationName'])->get();

       // return Datatables::of($requirements)->make(true);



        return Datatables::eloquent(Requirements::query()->where('organization',$request['organizationName']))->first()->make(true); 




    }

    public function searchRequirements(Request $request)
    {


   $term = $request->organization;
          
    $data = Requirements::where('organization', $request['organization'])->first();

     return response()->json($data);

    }


        public function postRequirementsRenewalAdd(Request $request)
    {
            
            
            $validator = Validator::make($request->all(),[
            'organizationName' => 'required|string|max:255',
           
        ]);

        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
        else {
    

          $requirement = new Requirements();
          $requirement->organization =  $request['organizationName'];
          $requirement->requirement1 = $request['requirement1'];
          $requirement->requirement2 = $request['requirement2'];
          $requirement->requirement3 = $request['requirement3'];
          $requirement->requirement4 = $request['requirement4'];
          $requirement->requirement5 = $request['requirement5'];
          $requirement->requirement6 = $request['requirement6'];
          $requirement->requirement7 = $request['requirement7'];
          $requirement->requirement8 = $request['requirement8'];
          $requirement->requirement9 = $request['requirement9'];
          $requirement->requirement10 = $request['requirement10'];
          $requirement->requirement11 = $request['requirement11'];
          $requirement->save();
        return response()->json(array(
            'success' => true,
            'response' => $requirement
        ));
        }
    }


        public function postRequirementsRenewalUpdate(Request $request)
  {
    $validator = Validator::make($request->all(),[
                         
      ]);

        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
    else {
  
      $requirements = DB::table('requirements')->where('id', $request['update_id'])->update([     
            
            'requirement1' => $request['requirement1'],
            'requirement2' => $request['requirement2'],
            'requirement3' => $request['requirement3'],
            'requirement4' => $request['requirement4'],
            'requirement5' => $request['requirement5'],
            'requirement6' => $request['requirement6'],
            'requirement7' => $request['requirement7'],
            'requirement8' => $request['requirement8'],
            'requirement9' => $request['requirement9'],
            'requirement10' => $request['requirement10'],
            'requirement11' => $request['requirement11'],
         
        ]);
      
      }

    }
    

 



}



