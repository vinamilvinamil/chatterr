@extends('master')
@section('content')

<div class="container-fluid forum-userbar">
		<div class="btn-group">
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
		</div>
		<button type="button" class="btn btn-primary">{{ Auth::user() -> username }}</button>	
</div>


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
		        	{{ Form::textarea('Content', null, array('class' => 'form-control form-mcc', 'row' => '6')); }}		       
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