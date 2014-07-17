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


// Get Routes
Route::get('/', function()
{
	return View::make('home');
});

Route::get('signup', function()
{
	return View::make('signup');
});

Route::get('forum', 'ForumController@getForum');
Route::get('newTopic', 'ForumController@getNewTopic');


// Post Routes
Route::post('signup', 'UserController@createUser');
Route::post('login', 'UserController@loginUser');
Route::post('newTopic', 'ForumController@createTopic');