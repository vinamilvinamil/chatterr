@extends('master')
@section('content')

<div class="container-fluid forum-userbar">
		<button type="button" id="userOptions" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		    Action <span class="caret"></span>
		</button>
		<ul class="dropdown-menu" aria-labelledby="userOptions" role="menu">
			<li><a href="#">Action</a></li>
			<li><a href="#">Another action</a></li>
			<li><a href="#">Something else here</a></li>
			<li class="divider"></li>
			<li><a href="#">Separated link</a></li>
		</ul>
		<button type="button" class="btn btn-primary">Sign in</button>	
</div>

<div class="container forum-optionbar">
	<button type="button" id="catOptions" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		Action <span class="caret"></span>
	</button>
		<ul class="dropdown-menu" aria-labelledby="catOptions" role="menu">
			<li><a href="#">Action</a></li>
			<li><a href="#">Another action</a></li>
			<li><a href="#">Something else here</a></li>
			<li class="divider"></li>
			<li><a href="#">Separated link</a></li>
		</ul>
	<button type="button" class="btn btn-primary">Normal</button>	
	<button type="button" class="btn btn-primary">Hot</button>
	<a href="{{ url('newTopic') }}"><button type="button" class="btn btn-default">New Topic</button></a>		
</div>

<div class="container forum-headings">
	<div class="row">
		<div class="col-md-4">Topics</div>
		<div class="col-md-1">Category</div>
		<div class="col-md-2">Users</div>
		<div class="col-md-1">Posts</div>
		<div class="col-md-1">Likes</div>
		<div class="col-md-1">Views</div>
		<div class="col-md-2">Activity</div>
	</div>
</div>

<div class="container forum-headings">
	@foreach($t as $topic)
	<div class="row">
				<div class="col-md-4">
						{{ $topic -> title }}
				</div>
				<div class="col-md-1">
						{{ $topic -> category }}
				</div>
				<div class="col-md-2">
						{{ $topic -> user -> username }}
				</div>
				<div class="col-md-1">
					Posts
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