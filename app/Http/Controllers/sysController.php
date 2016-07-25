<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class sysController extends Controller {

  	public function __construct()
    {
        $this->middleware('admin');
    }
	
    public function showIndex()
    {
        return view('index');
    }
	
	public function showLogin2()
    {
        return view('loginv2');
    }
 	
 	public function showReportViolation()
    {
        return view('report_violation');
    }
	
	public function showCommunityService()
    {
        return view('community_service');
    }
	
	public function showViolation()
    {
        return view('violation');
    }
	
		public function showSanctions()
    {
        return view('sanction_monitoring');
    }
	
	
	
	
	
	
}