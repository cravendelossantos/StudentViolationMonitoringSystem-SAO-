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

 



}



