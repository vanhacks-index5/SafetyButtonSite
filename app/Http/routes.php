<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'IndexController@index');
Route::get('/index2', 'IndexController@index2');
Route::get('/profile', 'IndexController@profile');
Route::get('/profile/{id}/{lat?}/{lng?}', 'IndexController@show');
Route::get('/log', 'IndexController@log');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['prefix' => 'api'], function () {
	Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
	Route::post('authenticate', 'AuthenticateController@authenticate');

	Route::resource('user', 'UserController');
	Route::post('/user/{id}/clear', 'UserController@clear');
	Route::resource('userinfos', 'UserInfosController');
	
	Route::get('/emergencyusers', 'UserController@getEmergencyUsers');
	Route::post('sms', 'SmsController@index');
});

Route::group(['middleware' => ['web']], function () {
	//
});
