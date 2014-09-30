<?php

class AuthController extends \BaseController {
 
    /**
     * Show the application login form.
     *
     */
    public function getLogin()
    {
        if (Auth::check())
            return Redirect::action('TopicController@index') -> withMessage('Login successful');
        else 
            return View::make('login');
    }
 
    /**
     * Login user to application
     *
     */
    public function postLogin()
    {
        $data = Input::all();

        $rules = array(
            'Username' => array('required'),
            'Password' => array('required')
        );  

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return Redirect::back() -> withErrors($validator) -> withInput(Input::except('password'));
        }
        else {
            $username = Input::get('Username');
            $password = Input::get('Password');

            if (Auth::attempt(array('username' => $username, 'password' => $password)))
            {
                return Redirect::back() -> withMessage('Login successful');
            }
            return Redirect::action('AuthController@getLogin') -> withErrors('Your username or password is incorrect.') -> withInput(Input::except('password'));
        }    
    }
    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function getLogout()
    {
        Auth::logout();
        return Redirect::action('TopicController@index') -> withMessage('Logout successful');
    }


}
