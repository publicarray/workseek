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
Route::get('user/login', array('as' => 'user.login', 'uses' => 'UserController@login'));
Route::get('user/logout', array('as' => 'user.logout', 'uses' => 'UserController@logout'));

Route::resource('user', 'UserController');

Route::resource('employer', 'EmployerController');

Route::get('job/listjobs', ['middleware' => 'auth:employer', 'uses' => 'JobController@listjobs']);
Route::resource('job', 'JobController');

Route::resource('seeker', 'SeekerController');

Route::get('application/store', ['middleware' => 'auth:seeker', 'uses' => 'ApplicationController@store']);
Route::resource('application', 'ApplicationController');
Route::get('application/create/{id}', ['middleware' => 'auth:seeker', 'uses' => 'ApplicationController@create']);

Route::get('docs', function() {
    return View::make('docs');
});
