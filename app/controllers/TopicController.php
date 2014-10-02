<?php

class TopicController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$topics = Topic::all();
		$categories = Category::all();
		return View::make('forum') -> with(array('topics' => $topics, 'categories' => $categories));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::check()) {
			$categories = DB::table('categories') -> lists('name', 'id');
		    return View::make('newTopic') -> with('categories', $categories);
		}
		else Redirect::to('login') -> withErrors('You must be logged in to create a topic');
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
				'Title' => array('required', 'max:30'),
				'Content' => array('required', 'max:500'),
				'Category' => array('required')
		    );	

			$validator = Validator::make($data, $rules);

			if ($validator->fails()) {
			    return Redirect::to('newTopic') -> withErrors($validator);
			}
			else {
				$newTitle = Input::get('Title');
				$newContent = Input::get('Content');
				$newCategory = Input::get('Category');

				$user_id = Auth::user() ->id;

				$topic = new Topic;
			    $topic -> title = $newTitle;
				$topic -> content = $newContent;
				$topic -> category_id = $newCategory;
				$topic -> user_id = $user_id;
				$topic -> save();
				return Redirect::to('forum');
			}
		}
		else Redirect::to('login') -> withErrors('You must be logged in to create a topic');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$topic = Topic::find($id);
	    $topic->increment('views');
	    $posts = $topic -> posts;
	    return View::make('topic') -> with('topic', $topic) ->with('posts', $posts);
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
