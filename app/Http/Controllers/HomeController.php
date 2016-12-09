<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $time = date("H");

      $timezone = date("Asia\Manila");

      if ($time < "12") {
        $day =  "Good Morning";
    } else

    if ($time >= "12" && $time < "17") {
        $day =  "Good Afternoon";
    } else

    if ($time >= "17" && $time < "19") {
        $day = "Good Evening";
    } else

    if ($time >= "19") {
        $day = "Good Night";
    }
        return view('index',['greeting' => $day]);
    }
}
