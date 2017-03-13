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
Route::get('/viewcompany/{companyId}', [
	'uses' => 'JobsController@viewCompany',
	'as' => 'job.viewcompany'
]);
Route::post('/job/{jobId}/apply', [
	'uses' => 'JobsController@applyJob',
	'as' => 'job.apply'
]);


/* Companies Zone */
Route::group(['prefix' => 'company', 'namespace' => 'Company'], function () {

	Route::get('register', [
		'uses' => 'RegisterController@getRegister',
		'as' => 'company.register'
	]);

	Route::post('register', [
		'uses' => 'RegisterController@postRegister',
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
		Route::get('jobs', [
			'uses' => 'JobsController@index',
			'as' => 'company.jobs.list'
		]);
		Route::get('jobs/add', [
			'uses' => 'JobsController@getAddJob',
			'as' => 'company.jobs.add'
		]);
		Route::post('jobs/add', [
			'uses' => 'JobsController@postAddJob',
			'as' => 'company.jobs.add'
		]);
		Route::get('jobs/edit/{id}', [
			'uses' => 'JobsController@getEditJob',
			'as' => 'company.jobs.edit'
		]);
		Route::post('jobs/edit/{id}', [
			'uses' => 'JobsController@postEditJob',
			'as' => 'company.jobs.edit'
		]);
		Route::delete('jobs/delete/{id}', [
			'uses' => 'JobsController@deleteJob',
			'as' => 'company.jobs.delete'
		]);
		Route::get('jobs/{jobId}/candidates', [
			'uses' => 'CandidatesController@index',
			'as' => 'company.candidates'
		]);
		Route::get('profile', [
			'uses' => 'ProfileController@getEditProfile',
			'as' => 'company.profile'
		]);
		Route::post('profile/removeFile', [
			'uses' => 'ProfileController@deleteFile',
			'as' => 'company.profile.deleteFile'
		]);
		Route::post('profile', [
			'uses' => 'ProfileController@postEditProfile',
			'as' => 'company.profile'
		]);
	});
});