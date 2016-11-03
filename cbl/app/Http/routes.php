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

Route::get('/patients', 'PatientController@index');

Route::get('/', function () {
    
//Session::put('cur_user', 10);
//return Session::get('cur_user');
    return view('welcome');
});