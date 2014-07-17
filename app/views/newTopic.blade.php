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
		<button type="button" class="btn btn-primary">{{ $username }}</button>	
</div>

<div class="container">
	<div class="panel panel-default createAccount">
		<div class="panel-heading">New Topic</div>
  		<div class="panel-body">
  			{{ Form::open(array('action' => 'ForumController@createTopic', 'class' => 'form-horizontal', 'role' => 'form')) }}

	        <div class="form-group @if($errors->has('Title'))
	    						   has-error
								   @endif">
		        {{ Form::label('Title', 'Title', array('class' => 'col-sm-2 control-label label-mcc')); }}
		        <div class="col-sm-4">
		        	{{ Form::text('Title', '',array('class' => 'form-control form-mcc')); }}
		        	<span class="help-block help-form">The topic title.</span>
		        </div>
		        <div class="col-sm-6">
		        	<span class="text-danger control-label pull-left">{{ $errors->first('Title') }}</span>
		        </div>
	        </div>

	        <div class="form-group @if($errors->has('Content'))
	    						   has-error
								   @endif">
		        {{ Form::label('Content', 'Content', array('class' => 'col-sm-2 control-label label-mcc')); }}
		        <div class="col-sm-4">
		        	{{ Form::text('Content', '',array('class' => 'form-control form-mcc')); }}
		        	<span class="help-block help-form">Topic content.</span>
		        </div>
		        <div class="col-sm-6">
		        	<span class="text-danger control-label pull-left">{{ $errors->first('Content') }}</span>
		        </div>
	        </div>		

  		</div>
  		<div class="panel-footer">
			{{ Form::submit('Submit topic', array('class' => 'btn btn-primary')); }}
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ url('forum') }}">Cancel</a>
		   
		</div>
  	{{ Form::close() }}
  	</div>
</div>


@stop