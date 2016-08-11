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

Route::get('/index', ['middleware' => 'admin','uses' =>'sysController@showIndex']);


// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

// Report violation
Route::get('/reportViolation', 'sysController@showReportViolation');
Route::post('/reportViolation', 'sysController@postReportViolation');


// Community Service
Route::get('/communityService', 'sysController@showCommunityService');

// violations
Route::get('/violation', 'sysController@showViolation');
Route::post('/violation', 'sysController@postViolation');

// Sanction Monitoring
Route::get('/sanctions', 'sysController@showSanctions');


//Courses
Route::get('/courses' , 'sysController@showCourses');
Route::post('/addCourse' , 'sysController@postCourse');

// Lost and Found 
Route::get('/lostandfound','sysController@showLostAndFound');
Route::post('/lostandfound','sysController@postLostAndFoundAdd');
Route::post('/lostandfound','sysController@postLostAndFoundUpdate');




