<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/	


/*
Route::get('/', function () {
    return view('login');
});

*/
/*Route::get('/index', [
	'uses' => 'sysController@showIndex',
	'middleware' => 'roles',
	'roles' => ['Secretary']
]);
*/
Route::group(['middleware' => 'roles', 'roles' => ['Admin','Secretary']],function(){


Route::get('/index', 'HomeController@index');



// Report violation
Route::get('/report-violation', 'ReportViolationController@showReportViolation');

/*
Route::get('/report-violation/{id}' , function($id){



	$students = App\Course::find($id);
	echo "course id: " .$students->id. "course name galing sa course_tbl:" .$students->description. '<br/>';
	$course = $students->students;
echo $course->first_name. $course->last_name. "course id nang student" .$course->course_id.'<br/>';
	
});*/
//Search
Route::get('/report-violation/search/student', [
	'as'=> 'autocompleteStudentNo',
	'uses' => 'ReportViolationController@searchStudent',
	]);

Route::get('/report-violation/search/violation', 'ReportViolationController@searchViolation');
//Post
Route::post('/report-violation/report', 'ReportViolationController@postReportViolation');
Route::post('/report-violation/offense-no', 'ReportViolationController@showOffenseNo');

// Community Service
//Route::get('/communityService', 'sysController@showCommunityService');

Route::get('/campus', 'CampusVenueReservationController@showCampusVenueReservation');
Route::get('/reservationReports', 'CampusVenueReservationController@showCampusVenueReservationReports');
Route::post('/campus/add', 'CampusVenueReservationController@postCampusVenueReservationAdd');

Route::post('/campus/update', 'CampusVenueReservationController@postCampusVenueReservationUpdate');



// organizations renewal
Route::get('/organizationsRenewal', 'OrganizationsRenewalController@showOrganizationsRenewal');
Route::get('/OrganizationsRenewalList', 'OrganizationsRenewalController@showOrganizationsRenewalList');

// monitoring of proposal activities
Route::get('/activities', 'ProposalActivitiesMonitoringController@showProposalActivities');
Route::get('/addActivity', 'ProposalActivitiesMonitoringController@showAddActivity');
Route::get('/ActivityDetails', 'ProposalActivitiesMonitoringController@getActivityDetails');
Route::post('/postAddActivity', 'ProposalActivitiesMonitoringController@postProposalActivitiesAdd');
Route::post('/postUpdateActivity', 'ProposalActivitiesMonitoringController@postProposalActivitiesUpdate');
Route::get('/activitiesReports', 'ProposalActivitiesMonitoringController@showProposalActivitiesReports');




// violations
Route::get('/violation', [
	'uses' => 'sysController@showViolation',
	'middleware' => 'roles',
]);

Route::post('/violation', 'sysController@postViolation');

// Sanction Monitoring
Route::get('/sanctions', 'sysController@showSanctions');

// Lost and Found 
Route::get('/lost-and-found', [
	'uses' => 'LostAndFoundController@showLostAndFound'
]);
Route::get('/lost-and-found/table/load','LostAndFoundController@getLostAndFoundTable');
Route::get('/lost-and-found/search','LostAndFoundController@searchLostAndFound');
Route::post('/lost-and-found/report-item',[
	'uses' => 'LostAndFoundController@postLostAndFoundAdd',
	'as' => 'report.item'
]);
Route::post('/lostandfound/update', 'LostAndFoundController@postLostAndFoundUpdate');

//Courses
Route::get('/courses' , 'sysController@showCourses');
Route::post('/addCourse' , 'sysController@postCourse');

//Violation Statistics
Route::get('/violation-statistics' , 'ReportViolationController@showStatistics');


//Sanctions Monitoring
Route::get('/sanctions', 'SanctionController@showSanctions');

//SMS
Route::get('/text-messaging', 'sysController@showSMS');
Route::post('/text-messaging/send', 'sysController@sendSMS');

});




Route::group(['middleware' => 'web'],function(){

	Route::auth();
	



});
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@logout');
Route::get('/login', 'Auth\AuthController@getLogin');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');	

// Authentication routes...


Route::get('/error401/permission-denied', function(){
	return view('errors.401');
});
