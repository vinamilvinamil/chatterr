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

Route::controller('auth', 'AuthController');
Route::resource('user', 'UserController');
Route::resource('topic', 'TopicController');
Route::resource('post', 'PostController');

Route::get('login', 'AuthController@showLogin');

// Post Routes
Route::post('post-control', 'TopicController@postControl');
