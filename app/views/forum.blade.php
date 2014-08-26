@extends('master')
@section('content')

@include('layout.userbar')
@include('modals.login')


<div class="container forum-optionbar">
	<div class="btn-group">
		<button type="button" id="catOptions" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			Categories <span class="caret"></span>
		</button>
		<ul class="dropdown-menu" aria-labelledby="catOptions" role="menu">
			@foreach ($categories as $category)
			<li><a href="#">{{ $category -> name }}</a></li>
			@endforeach	
		</ul>
	</div>	
	<button type="button" class="btn btn-primary">Normal</button>	
	<button type="button" class="btn btn-primary">Hot</button>
	<a href="{{ url('newTopic') }}"><button type="button" class="btn btn-default">New Topic</button></a>		
</div>

<div class="container forum-headings">
	<div class="row">
		<h4>
			<div class="col-md-4">Topics</div>
			<div class="col-md-1">Category</div>
			<div class="col-md-2">Users</div>
			<div class="col-md-1">Posts</div>
			<div class="col-md-1">Likes</div>
			<div class="col-md-1">Views</div>
			<div class="col-md-2">Activity</div>
		</h4>
	</div>
</div>

<div class="container forum-headings">
	@foreach($topics as $topic)
	<div class="row">
		<div class="col-md-4">
			<a href="{{ url('topic', $topic -> id) }}">{{ $topic -> title }}</a>
		</div>
		<div class="col-md-1">
			{{ $topic -> category -> name }}
		</div>
		<div class="col-md-2">
			{{ $topic -> user -> username }}
		</div>
		<div class="col-md-1">
			{{ $topic -> posts -> count() }}
		</div>
		<div class="col-md-1">
			{{ $topic -> likes }}
		</div>
		<div class="col-md-1">
			{{ $topic -> views }}
		</div>
		<div class="col-md-2">
			{{ $topic -> updated_at }}
		</div>
	</div>
	@endforeach	
</div>

@stop