@extends('master')
@section('content')

<div class="container">
	<div class="panel panel-default createAccount">
		<div class="panel-heading">
			<h4>Create New Account</h4>
		</div>
		<div class="panel-body">
			{{ Form::open(array('action' => 'UserController@store', 'class' => 'form-horizontal', 'role' => 'form')) }}
			<div class="form-group @if($errors->has('Name'))
				has-error
				@endif">
				{{ Form::label('Name', 'Name', array('class' => 'col-sm-2 control-label label-mcc')); }}
				<div class="col-sm-4">
					{{ Form::text('Name', null,array('class' => 'form-control form-mcc','required' => '','autofocus' => '')); }}
					<span class="help-block help-form">Your full name.</span>
				</div>
				<div class="col-sm-6">
					<span class="text-danger control-label pull-left">{{ $errors->first('Name') }}</span>
				</div>
			</div>

			<div class="form-group @if($errors->has('Email'))
				has-error
				@endif">
				{{ Form::label('Email', 'Email', array('class' => 'col-sm-2 control-label label-mcc')); }}
				<div class="col-sm-4">
					{{ Form::email('Email', null,array('class' => 'form-control form-mcc','required' => '')); }}
					<span class="help-block help-form">Your email will never be shown in public.</span>
				</div>
				<div class="col-sm-6">
					<span class="text-danger control-label pull-left">{{ $errors->first('Email') }}</span>
				</div>
			</div>

			<div class="form-group @if($errors->has('Username'))
				has-error
				@endif">
				{{ Form::label('Username', 'Username', array('class' => 'col-sm-2 control-label label-mcc')); }}
				<div class="col-sm-4">
				{{ Form::text('Username', null,array('class' => 'form-control form-mcc','required' => '')); }}
					<span class="help-block help-form">Your username must be unique, no spaces and short.</span>
				</div>
				<div class="col-sm-6">
					<span class="text-danger control-label pull-left">{{ $errors->first('Username') }}</span>
				</div>
			</div>

			<div class="form-group @if($errors->has('Password'))
				has-error
				@endif">
				{{ Form::label('Password', 'Password', array('class' => 'col-sm-2 control-label label-mcc')); }}
				<div class="col-sm-4">
					{{ Form::password('Password', array('class' => 'form-control form-mcc','pattern' => '.{8,}','oninvalid' => 'setCustomValidity("Your password needs to be longer than 7 characters.")','oninput' => 'setCustomValidity("")','required' => '')); }}
					<span class="help-block help-form help-form">Must be longer than 7 characters.</span>
				</div>
				<div class="col-sm-6">
					<span class="text-danger control-label pull-left">{{ $errors->first('Password') }}</span>
				</div>
			</div>
		</div>

		<div class="panel-footer">
			{{ Form::submit('Create account', array('class' => 'btn btn-primary')); }}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ url('/') }}">Cancel</a>
		</div>
		{{ Form::close() }}
	</div>
</div>
@stop