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
	<button type="button" class="btn btn-primary">Hot</button>
	<a href="{{ url('newTopic') }}"><button type="button" class="btn btn-default"><span class="fa fa-pencil glyph"></span>New Topic</button></a>		
</div>

<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Topics</th>
				<th>Category</th>
				<th>Users</th>
				<th>Posts</th>
				<th>Views</th>
				<th>Activity</th>
			</tr>
		</thead>
		<tbody>
			@foreach($topics as $topic)
			<tr>
				<td> <a href="{{ action('TopicController@show', array($topic -> id)) }}" class="forum-topic-title">{{ $topic -> title }}</a> </td>
				<td> {{ $topic -> category -> name }} </td>
				<td> {{ $topic -> user -> username }} </td>
				<td> {{ $topic -> posts -> count() }} </td>
				<td> {{ $topic -> views }} </td>
				<td> {{ date("j M Y",strtotime($topic->updated_at)) }} </td>
			</tr>
			@endforeach	
		</tbody>
	</table>
</div>	
@stop