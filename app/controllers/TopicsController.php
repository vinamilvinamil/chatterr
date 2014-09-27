<?php

class TopicController extends BaseController {

	// Post Controllers

	public function postControl()
	{
		if (Auth::check()) {
			if (Request::ajax())
			{
				$id = Input::get('id');
				$post = Post::find($id);
				$post -> increment('likes');
				return 'Ajax post successful';
			}
		}
		else return Redirect::back() -> with('message', 'Please login to use Chatter');
	}

}






