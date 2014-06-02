<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as'=>'home', 'uses'=> 'JobController@index'));

Route::post('user/login', array('as' => 'user.login', 'uses' => 'UserController@login'));
Route::get('user/logout', array('as' => 'user.logout', 'uses' => 'UserController@logout'));

Route::resource('user', 'UserController');

Route::resource('employer', 'EmployerController');

Route::get('job/listjobs', array('before' => 'login:employer', 'as' => 'job.listjobs', 'uses' => 'JobController@listjobs'));
Route::resource('job', 'JobController');

Route::resource('seeker', 'SeekerController');

Route::get('application/store', array('before' => 'login:seeker', 'as' => 'application.store', 'uses' => 'ApplicationController@store'));
Route::resource('application', 'ApplicationController');
Route::get('application/create/{id}', array('before' => 'login:seeker', 'as' => 'application.create', 'uses' => 'ApplicationController@create'));

Route::get('doc', function() {
    return View::make('docs');
});
