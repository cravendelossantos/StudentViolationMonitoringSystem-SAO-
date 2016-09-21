<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcademicCalendar;
use App\Http\Requests;

class AcademicCalendarController extends Controller
{
    public function showCalendar()
    {
    	return view('academic_calendar');
    }

    public function postEvents()
    {
    	$data  = AcademicCalendar::all();

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
}
