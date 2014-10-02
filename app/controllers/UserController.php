<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('signup');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		
		$rules = array(
			'Email' => array('required', 'email'),
			'Name' => array('required', 'max:15', 'alpha_spaces'),
	        'Username' => array('required', 'max:10', 'alpha_num', 'unique:users,username'),
	        'Password' => array('required', 'min:8')
	    );	

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
		    return Redirect::to('signup') -> withErrors($validator) -> withInput(Input::except('password'));
		}
		else {
			$newEmail = strtolower(trim(Input::get('Email')));
			$newName = Input::get('Name');
			$newUsername = Input::get('Username');
			$newPassword = Input::get('Password');

			$avatar = new Avatar;
			$avatar -> gravatar = 'http://gravatar.com/avatar/'.md5($newEmail);

			$user = new User;
		    $user -> email = $newEmail;
			$user -> name = $newName;
			$user -> username = $newUsername;
			$user -> password = Hash::make($newPassword);
			$user -> save();
			$user -> avatars() -> save($avatar);

			if (Auth::attempt(array('username' => $newUsername, 'password' => $newPassword)))
			{
				return Redirect::to('forum') -> withMessage('Account created successfully');
			}
			return Redirect::to('login') -> withMessage('Account created. Please login.');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
