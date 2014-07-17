<?php

class forumController extends BaseController {

public function getForum() 
	{
		$topics = Topic::all();


		if (Auth::check()) {
			$username = Auth::user()->username;
		    return View::make('forum') ->with('t', $topics);
		}
		else return Redirect::to('signup');
	}	

public function getNewTopic() 
	{
		if (Auth::check()) {
			$username = Auth::user()->username;
		    return View::make('newTopic') ->withUsername($username);
		}
		else return 'You must be logged in to create a post.';
	}	

public function createTopic() 
	{
		if (Auth::check()) {

			$data = Input::all();
		
			$rules = array(
				'Title' => array('required', 'max:10'),
				'Content' => array('required', 'max:500'),
		    );	

			$validator = Validator::make($data, $rules);

			if ($validator->fails()) {
			    return Redirect::to('newTopic') -> withErrors($validator);
			}
			else {
				$newTitle = Input::get('Title');
				$newContent = Input::get('Content');

				$user_id = Auth::user() ->id;

				$topic = new Topic;
			    $topic -> title = $newTitle;
				$topic -> content = $newContent;
				$topic -> user_id = $user_id;
				$topic -> save();
				return Redirect::to('forum');
			}
		}
		else return 'You must be logged in. Log in and try again.';
	}		

}	