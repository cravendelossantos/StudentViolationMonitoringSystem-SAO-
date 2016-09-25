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
    
        $data = Student::where('student_no', $term)->take(5)->get();
        $result=array();
        
        foreach ($data as $key => $value)
        {
            $result[]=[ 'value' => $value->student_no, 
                        'l_name' => $value->last_name, 
                        'f_name' => $value->first_name,
                        'course' => $value->course,
                        'year_level' =>$value->year_level
                      ];

        }
       // return response()->json($data);
        return response()->json($result);

    }

    public function showStudentViolations(Request $request)
    {

     return Datatables::eloquent(ViolationReport::query()->leftJoin('students', 'violation_reports.student_id', '=', 'students.student_no')
            ->join('violations', 'violation_reports.violation_id', '=', 'violations.id')
                )->make(true);		
    }
}
