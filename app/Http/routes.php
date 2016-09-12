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


Route::group(['middleware' => 'roles', 'roles' => ['Admin','Secretary']],function(){

Route::post('/get-events' , 'CampusVenueReservationController@getEvents');

Route::get('/index', 'HomeController@index');



// Report violation
Route::get('/report-violation', 'ReportViolationController@showReportViolation');


//New student

Route::post('/report-violation/add-student', 'ReportViolationController@newStudentRecord');

//Search
Route::get('/report-violation/search/student', [
	'as'=> 'autocompleteStudentNo',
	'uses' => 'ReportViolationController@searchStudent',
	]);


Route::post('/report-violation/reports','ReportViolationController@getViolationReportsTable');
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
// Route::get('/getActivityDetails', 'ProposalActivitiesMonitoringController@getActivityDetails');
Route::post('/postAddActivity', 'ProposalActivitiesMonitoringController@postProposalActivitiesAdd');
Route::post('/postUpdateActivity', 'ProposalActivitiesMonitoringController@postProposalActivitiesUpdate');
Route::get('/activitiesReports', 'ProposalActivitiesMonitoringController@showProposalActivitiesReports');
Route::post('/activities/list' , 'ProposalActivitiesMonitoringController@getActivitiesTable');
Route::get('/activities/activity_details' , 'ProposalActivitiesMonitoringController@getActivityDetails');


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

//Lost and Found Tables
Route::post('/lost-and-founds/items/all', 'LostAndFoundController@getLostAndFoundTable');
Route::post('/lost-and-founds/items/sort_by=claimed' , 'LostAndFoundController@TableFilterClaimed');
Route::post('/lost-and-founds/items/sort_by=unclaimed' , 'LostAndFoundController@TableFilterUnclaimed');
Route::post('/lost-and-founds/items/sort_by=donated' , 'LostAndFoundController@TableFilterDonated');

//Reports
Route::get('/lost-and-found/statistics', 'LostAndFoundController@showLostAndFoundStatistics');
Route::get('/lost-and-found/reports', 'LostAndFoundController@showLostAndFoundReports');


Route::get('/lost-and-found/search','LostAndFoundController@searchLostAndFound');
Route::post('/lost-and-found/report-item',[
	'uses' => 'LostAndFoundController@postLostAndFoundAdd',
	'as' => 'report.item'
]);

Route::get('/lost-and-found/item_details', 'LostAndFoundController@getItemDetails');

Route::post('/lostandfound/update', 'LostAndFoundController@postLostAndFoundUpdate');

//Courses
Route::get('/courses' , 'sysController@showCourses');
Route::post('/add-course' , 'sysController@postCourse');

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
