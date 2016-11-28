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

//Route::group(['prefix' => 'api/v1'], function(){
	//Route::resource('users', 'UserController');
	//Route::post('/sigin', 'UserController@checkvalid');
	//Route::resource('authenticate', 'TokenAuthController', ['only' => ['index']]);
	//Route::post('authenticate', 'TokenAuthController@authenticate');
	//Route::get('authenticate/user', 'TokenAuthController@getAuthenticatedUser');
//});

//Route::get('/MRS', 'MedicalRecordsController@getMRS');

Route::post('/signup', 'UserController@checkvalid');
//Route::resource('/users','UserController');

Route::get('/getCurPK', 'MedicalRecordsController@getCurPK');
Route::get('/logout', 'UserController@logout');

//Route::post('/getProfile', 'UserController@getProfile');

Route::get('/getProfile/{id}', 'UserController@getProfile');

Route::group(['middleware' =>'jwt.auth'],function(){
Route::get('/loginUser', 'UserController@loginUser');

Route::get('/patients', 'PatientController@index');

Route::get('/patient/{id}', 'PatientController@details');

Route::get('/summary/{id}', 'SummaryController@details');

Route::get('/patientData/{userId}', 'UserController@getPatient');

Route::get('/summaryData/{userId}', 'UserController@summaryData');


Route::get('/labResultData/{userId}', 'UserController@labResultData');

Route::get('/resultData/{userId}', 'UserController@resultData');

Route::get('/fileResultData/{userId}', 'UserController@fileResultData');

Route::get('/result', 'ResultController@index');

Route::get('/result/{id}', 'ResultController@details');

Route::post('/changePassword', 'UserController@changePassword');

Route::post('/changeLogin', 'UserController@changeLoginID');

Route::get('/home', function () {

//Session::put('cur_user', 10);
//return Session::get('cur_user');
    $test = 'test';
    return $test;
});
});



Route::post('/login','UserController@login');