<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Http\Requests;
use App\Student;
use DB;
use Input;
use Yajra\Datatables\Facades\Datatables;
use Validator;


class StudentRecordsController extends Controller
{
	public function importExport()
	{
		return view('student_records');
	}
	public function downloadExcel($type)
	{
		$data = Student::get()->toArray();
		return Excel::create('student_records', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	public function importExcel(Request $request)
	{ 

		 $messages = [
		 	'import_file.required' => 'Please choose a file to proceed',
            'import_file.mimes' => 'Invalid file format!',
        ];

        $validator = Validator::make($request->all(),[
        	'import_file'   => 'required|mimes:csv,xls,xlsx',
        ], $messages);


        if ($validator->fails()) {
            return response()->json(array('success'=> false, 'errors' =>$validator->getMessageBag()->toArray())); 
          
        }
        else {
		try {
		


		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();

			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['student_no' => $value->student_no, 
									'first_name' => $value->first_name,
									'last_name' =>$value->last_name,
									'course' => $value->course,
									'year_level' =>$value->year_level,
									'contact_no' =>$value->contact_no,
									'date_created' =>$value->date_created
									];
				}
				if(!empty($insert)){
					DB::table('students')->insert($insert);
					dd('Import Successful!');
				}

			}
		}
		return back();
		 } 


		 catch (\Illuminate\Database\QueryException $e){
                dd("Please Check your file");

               return redirect()->back();
                }


          catch (PDOException $e) {
                return redirect()->back();
                dd("Please Check your file");
            }    
            }        
	}

	public function getStudentRecordsTable()
	{
		return Datatables::eloquent(Student::query())->make(true);
	}

}
