<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Http\Requests;
use Yajra\Datatables\Facades\Datatables;
use App\ViolationReport;

class SanctionController extends Controller
{
    public function showSanctions()
    {
    	return view('sanction_monitoring');
    }

  
    public function searchStudent(Request $request)
    {

          

        $term = $request->term;
    
        $result = ViolationReport::where('student_id', $term)->take(5)->get();
        $data=array();
        
        foreach ($result as $key => $value)
        {
            $data[]=[ 'value' => $value->student_no, 
                        'sanction' => $value->sanction, 
                        'offense_level' => $value->offense_levels,
                        'status' => $value->status,

                      ];

        }


       // return response()->json($data);
        return response()->json(['data' => $data]);

    }

    public function showStudentViolations(Request $request)
    {

     return Datatables::eloquent(ViolationReport::query()->leftJoin('students', 'violation_reports.student_id', '=', 'students.student_no')
            ->join('violations', 'violation_reports.violation_id', '=', 'violations.id')
                )->make(true);		
    }
}
