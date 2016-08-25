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
//Search
Route::get('/report-violation/violation/search', 'ReportViolationController@searchViolation');
//Post
Route::post('/report-violation/report', 'ReportViolationController@postReportViolation');


// Community Service
Route::get('/communityService', 'sysController@showCommunityService');

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
