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
	
	
}