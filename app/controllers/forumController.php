<?php

class forumController extends BaseController {

// Get Controllers
public function getForum() 
	{
		$topics = Topic::all();
		$categories = Category::all();
		return View::make('forum') -> with(array('topics' => $topics, 'categories' => $categories));
	}	

public function getNewTopic() 
	{
		if (Auth::check()) {
			$categories = DB::table('categories') -> lists('name', 'id');
		    return View::make('newTopic') -> with('categories', $categories);
		}
		else return 'You must be logged in to create a post.';
	}	


// Post Controllers
public function createTopic() 
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
		else return 'You must be logged in. Log in and try again.';
	}		

}	