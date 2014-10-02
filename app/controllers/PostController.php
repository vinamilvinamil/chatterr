<?php

class PostController extends \BaseController {

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
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
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
				$postContent = Input::get('content');
				$topic_id = Input::get('topic_id');
				$user_id = Auth::user() ->id;

				$post = new Post;
				$post -> content = $postContent;
				$post -> topic_id = $topic_id;
				$post -> user_id = $user_id;
				$post -> save();
				return Redirect::back() -> with('message', 'Successfully submitted post');
			}
		}
		else
			return Redirect::to('login') -> with('message', 'Please login to post a reply.');
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
		if (Auth::check()) {
			$post = Post::find($id);
			if (Auth::user() -> id == $post -> user -> id )
				return View::make('editPost') -> with('post', $post);
			else
				return Redirect::back() -> with('message', 'Oops, you can only edit posts you created');
		}
		else Redirect::to('login') -> with('message', 'You must be logged in to edit posts');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (Auth::check()) {

			if (Request::ajax()) {
				$id = Input::get('id');
				$post = Post::find($id);
				$post -> increment('likes');
				return Response::json('You liked this post!');
			}

			else {

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
					$topic = Post::find($id) -> topic -> id;

					$post = Post::find($id);
					$post -> content = $newContent;
					$post -> save();
					return Redirect::action('TopicController@show', array($topic)) -> with('message', 'Post edited successfully');
				}
			}
		}
		else return Redirect::to('login') -> with('message', 'Please login to edit posts');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Auth::check()) {
			$post = Post::find($id);
			$topic = $post -> topic -> id;

			Post::destroy($id);
			return Redirect::action('TopicController@show', array($topic)) -> with('message', 'Post deleted successfully');
		}
	else
		return Redirect::to('login') -> with('message', 'Please login to edit posts');
}


}
