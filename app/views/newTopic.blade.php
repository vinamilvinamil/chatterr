@extends('master')
@section('content')

@include('layout.userbar')

<div class="container">
	<div class="createAccount">
		<h2>New Topic</h2>
		<br>
		<div>
			{{ Form::open(array('action' => 'ForumController@createTopic', 'role' => 'form')) }}

			<div class="form-group @if($errors->has('Title'))
				has-error
				@endif">
				{{ Form::label('Title', 'Title', array('class' => 'control-label label-mcc')); }}
				
				{{ Form::text('Title', null, array('class' => 'form-control form-mcc')); }}
				<span class="help-block help-form">The topic title.</span>
				
				
				<span class="text-danger control-label pull-left">{{ $errors->first('Title') }}</span>
				
			</div>

			<div class="form-group @if($errors->has('Category'))
				has-error
				@endif">
				{{ Form::label('Category', 'Category', array('class' => 'control-label label-mcc')); }}
				
				{{ Form::select('Category', $categories, null, array('class'=>'form-control')) }}
				<span class="help-block help-form">Topic category, please select one.</span>
				
				<span class="text-danger control-label pull-left">{{ $errors->first('Category') }}</span>
				
			</div>

			<div class="form-group @if($errors->has('Content'))
				has-error
				@endif">
				{{ Form::label('Content', 'Content', array('class' => 'control-label label-mcc')); }}
				{{ Form::textarea('Content', null, array('class' => 'form-control form-mcc mce', 'row' => '6')); }}		       
				<span class="help-block help-form">Topic content.</span>
				<span class="text-danger control-label pull-left">{{ $errors->first('Content') }}</span>
			</div>		

		</div>
		<div>
			{{ Form::submit('Submit topic', array('class' => 'btn btn-primary')); }}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ url('forum') }}">Cancel</a>
			
		</div>
		{{ Form::close() }}
	</div>
</div>
<div class="container-fluid" style="margin-bottom:100px;">
</div>


@stop