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
				$post_id = Input::get('Topic_id');

				$post = new Post;
				$post -> content = $replyContent;
				$post -> id = $post_id;
				$post -> save();
				return Redirect::back() -> with('message', 'Successfully edited post');
			}
		}
		else
			return Redirect::to('login');
	}


	public function getPost($id) {
		if (Auth::check()) {
			$post = Post::find($id);
			if (Auth::user() -> id == $post -> user -> id )
				return View::make('editPost') -> with('post', $post);
			else
				return Redirect::to('forum') -> with('message', 'Oops, you can only edit posts you created');
		}
		else Redirect::to('login') -> with('message', 'You must be logged in to edit posts');
	}

	public function editPost()
	{
		if (Auth::check()) {

			$data = Input::all();

			$rules = array(
				'content' => array('required', 'max:16000'),
				);	

			$validator = Validator::make($data, $rules);

			if ($validator->fails()) {
				return Redirect::back() -> withErrors($validator);
			}
			else {
				$newContent = Input::get('content');
				$id = Input::get('post_id');
				$topic = Input::get('topic_id');

				$post = Post::find($id);
				$post -> content = $newContent;
				$post -> save();
				return Redirect::route('topic', array('id' => $topic))-> with('message', 'Successfully edited post');
			}
		}
		else
			return Redirect::to('login');
	}



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






