<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\User;
use App\LostAndFound;
use Carbon\Carbon;
use DateTime;
use Validator;
use Auth;
use Yajra\Datatables\Facades\Datatables;
use Response;	

class LostAndFoundController extends Controller
{
	public function __construct()
	{
		$this->middleware('roles');
	}

	public function showLostAndFound()
	{       
		return view('lost_and_found');
	}
	
	public function getLostAndFoundTable()
	{	
		$today = Carbon::now();
		LostAndFound::where('disposal_date','<', $today)->update(['status' => 3]);
		
		return Datatables::eloquent(LostAndFound::query())->make(true);
	}

	public function TableFilterClaimed(Request $request)
	{
		return Datatables::eloquent(LostAndFound::query()->where('status', 'claimed'))->make(true);	
	}

	public function TableFilterUnclaimed(Request $request)
	{
		return Datatables::eloquent(LostAndFound::query()->where('status', 'unclaimed'))->make(true);	
	}

	public function TableFilterDonated(Request $request)
	{
		return Datatables::eloquent(LostAndFound::query()->where('status', 'donated'))->make(true);	
	}

	public function searchLostAndFound(Request $request)
	{
		$item = $request->input('searchBox');
		$lostandfound_table = DB::table('lost_and_founds')->where('item_description', 'like', '%' .$item. '%')->get();
		return view('tables.lost_and_founds_table', ['lostandfoundTable' => $lostandfound_table ]);
	}

	public function getItemDetails(Request $request)
	{
		$item = LostAndFound::where('id', $request['id'])->first();
		return response()->json(array('response' => $item));
	}
	

	public function getLostAndFoundAdd(Request $request)
	{

		$tomorrow = Carbon::tomorrow()->format('y-m-d');

		$messages = [
        
            'date_reported.before' => 'Date must be not greater than today.',
            'time_reported.date_format' => 'Invalid time format',
        ];

		$validator = Validator::make($request->all(),[

			'date_reported' => 'required|date|before:' .$tomorrow,
			'time_reported' => 'required|date_format:h:ia',
			'itemName' => 'required|string|max:255',
			'endorserName' => 'required|string|max:255',
			'foundAt' => 'required|string',
			
			],$messages);

		if ($validator->fails()) {
			return Response::json(['success'=> false, 'errors' =>$validator->getMessageBag()->toArray()],400); 
			
		}
	}


	public function postLostAndFoundAdd(Request $request)
	{
		$now = Carbon::now();
		

		

		$report = new LostAndFound();
		$report->time_reported = $request['time_reported'];
		$report->date_reported = $request['date_reported'];
		$report->item_description =  ucwords($request['itemName']);
		$report->endorser_name = ucwords($request['endorserName']);
		$report->found_at = ucwords($request['foundAt']);
		$report->owner_name = ucwords($request['ownerName']);
		$report->status = '1';
		$report->reporter_id = Auth::user()->id;
		$report->disposal_date = $now->addDays(60);
		$report->save();

		return response()->json(array(
			'success' => true,
			'response' => $report
			));
		
		

	}
	
	public function getLostAndFoundUpdate(Request $request)
	{

		$validator = Validator::make($request->all(),[
			'claimer_name' => 'required|string|max:255',                   
			]);



		if ($validator->fails()) {
			
			return Response::json(['success'=> false, 'errors' =>$validator->getMessageBag()->toArray()],400); 
		}



	}


	public function postLostAndFoundUpdate(Request $request)
	{	


		
		$lost_and_found = DB::table('lost_and_founds')->where('id', $request['claim_id'])->update([			
			'claimer_name' => ucwords($request['claimer_name']),
			'status' => 'Claimed',
			'date_claimed' => Carbon::now(),
			'claimed_reporter_id' => Auth::user()->id,
			]);

		return Response::json(['success' => true, 'response' => $lost_and_found], 200);
		
		
		
	}


	public function showLostAndFoundStatistics()
	{
		return view('lost_and_found_statistics');
	}	

	public function showLostAndFoundReports()
	{
		return view('lost_and_found_reports');
	}

	public function postLostAndFoundReportsTable(Request $request)
	{

		$requested_date = $request['month'];
		$date_start = Carbon::parse($requested_date)->startOfMonth();
		$date_end = Carbon::parse($requested_date)->endOfMonth();  

		$claimed = LostAndFound::where('status', 'claimed')
		->whereBetween('created_at', [$date_start, $date_end])
		->count();

		$unclaimed = LostAndFound::where('status', 'unclaimed')
		->whereBetween('created_at', [$date_start, $date_end])
		->count();

		$donated = LostAndFound::where('status', 'donated')
		->whereBetween('created_at', [$date_start, $date_end])
		->count();


		$total = LostAndFound::whereBetween('created_at', [$date_start, $date_end])
		->count();
		

		

			//into objects..
		$data = [
		[	'claimed' => $claimed, 
		'unclaimed' => $unclaimed,
		'donated' => $donated,  
		'total' => $total, 
		'from'=>$date_start, 
		'to'=>$date_end
		]
		];
		

		return response()->json(['data' => $data]);


	}

	public function postLostAndFoundStatistics(Request $request)
	{

			/*$claimed = LostAndFound::where('status', 'claimed')
					->whereBetween('created_at', [$date_start, $date_end])
					->count();

			$unclaimed = LostAndFound::where('status', 'unclaimed')
					->whereBetween('created_at', [$date_start, $date_end])
					->count();

			$total = LostAndFound::whereBetween('created_at', [$date_start, $date_end])
			->count();*/

			$requested_date = $request['month'];
			$date_start = Carbon::parse($requested_date)->startOfMonth();
			$date_end = Carbon::parse($requested_date)->endOfMonth();  



			$claimed = LostAndFound::where('status', 'claimed')
			->whereBetween('created_at', [$date_start, $date_end])
			->count();

			$unclaimed = LostAndFound::where('status', 'unclaimed')
			->whereBetween('created_at', [$date_start, $date_end])
			->count();

			$donated = LostAndFound::where('status', 'donated')
			->whereBetween('created_at', [$date_start, $date_end])
			->count();

			$data= [
			'claimed' => $claimed, 
			'unclaimed' => $unclaimed, 
			'donated' => $donated, 
			
			];
			

			return response()->json($data); 

		}
		
		
	}
