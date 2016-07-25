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
Route::get('/ReportViolation', 'sysController@showReportViolation');

// Community Service
Route::get('/CommunityService', 'sysController@showCommunityService');

// violations
Route::get('/violation', 'sysController@showViolation');

// Sanction Monitoring
Route::get('/sanctions', 'sysController@showSanctions');










