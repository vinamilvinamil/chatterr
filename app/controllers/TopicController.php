<?php

class TopicController extends BaseController {

	// Post Controllers

	public function createReply()
	{
		if (Auth::check()) {

			$data = Input::all();
		
			$rules = array(
				'Content' => array('required', 'max:16000'),
		    );	

			$validator = Validator::make($data, $rules);

			if ($validator->fails()) {
			    return Redirect::back() -> withErrors($validator);
			}
			else {
				$replyContent = Input::get('Content');
				$topic_id = Input::get('Topic_id');
				$user_id = Auth::user() ->id;

				$post = new Post;
				$post -> content = $replyContent;
				$post -> user_id = $user_id;
				$post -> topic_id = $topic_id;
				$post -> save();
				return Redirect::back();
			}
		}
		else Redirect::to('login');
	}

}
