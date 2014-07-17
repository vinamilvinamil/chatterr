<?php

class UserController extends BaseController {


	public function createUser()
	{
		$data = Input::all();
		
		$rules = array(
			'Email' => array('required', 'email'),
			'Name' => array('required', 'max:15', 'alpha_num'),
	        'Username' => array('required', 'max:7', 'alpha_num', 'unique:users,username'),
	        'Password' => array('required', 'min:8')
	    );	

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
		    return Redirect::to('signup') -> withErrors($validator) -> withInput(Input::except('password'));
		}
		else {
			$newEmail = Input::get('Email');
			$newName = Input::get('Name');
			$newUsername = Input::get('Username');
			$newPassword = Input::get('Password');

			$user = new User;
		    $user -> email = $newEmail;
			$user -> name = $newName;
			$user -> username = $newUsername;
			$user -> password = Hash::make($newPassword);
			$user -> save();
			return 'Data was saved!';
		}
	}

	public function loginUser()
	{
		$data = Input::all();

		$rules = array(
	        'Username' => array('required'),
	        'Password' => array('required')
	    );	

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
		    return Redirect::to('/') -> withErrors($validator) -> withInput(Input::except('password'));
		}
		else {
			$username = Input::get('Username');
			$password = Input::get('Password');

			if (Auth::attempt(array('username' => $username, 'password' => $password)))
			{
			    return Redirect::intended('forum');
			}
			else return 'Something went wrong';
		}    
	}

	public function getForum() 
	{
		if (Auth::check()) {
			$username = Auth::user()->username;
		    return View::make('forum') ->withUsername($username);
		}
		else return Redirect::to('signup');
	}
 
 }
