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

Route::get('/template', function () {
	return view('tpl');
});

/* Jobs */
Route::get('/', [
	'uses' => 'JobsController@index',
	'as' => 'home'
]);
Route::get('/job/{jobId}', [
	'uses' => 'JobsController@view',
	'as' => 'job.view'
]);

/* Companies */
Route::group(['prefix' => 'company', 'namespace' => 'Company'], function () {

	Route::get('register', [
		'uses' => 'ProfileController@getRegister',
		'as' => 'company.register'
	]);

	Route::post('register', [
		'uses' => 'ProfileController@postRegister',
		'as' => 'company.register'
	]);

	Route::get('login', [
		'uses' => 'LoginController@getLogin',
		'as' => 'company.login'
	]);

	Route::post('login', [
		'uses' => 'LoginController@postLogin',
		'as' => 'company.login'
	]);

	Route::get('logout', [
		'uses' => 'LoginController@logout',
		'as' => 'company.logout'
	]);

	Route::group(['middleware' => ['auth:companies']],  function () {
		Route::get('dashboard', [
			'uses' => 'LoginController@dashboard',
			'as' => 'company.dashboard'
		]);

		// jobs crud
		// applications crud
	});
});

