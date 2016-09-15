<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Locker;

class LockerManagementController extends Controller
{
   /* public function __construct()
    {
    	$this->middleware('roles');
    }*/

    public function showLockers()
    {
    	$lockers = Locker::all();
    	return view('locker_management',['lockers' => $lockers]);
    }
}
