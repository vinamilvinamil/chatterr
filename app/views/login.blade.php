@extends('master')
@section('content')
<div class="container">

  @if (Session::has('errors'))
  <div class="alert alert-danger login-message alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
    <strong class="glyph">{{ $errors->first() }}</strong>
  </div>
  @endif

  @if (Session::has('message'))
  <div class="alert alert-success login-message alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
    <strong class="glyph">{{ Session::get('message') }}</strong>
  </div>
  @endif  

  <div class="text-center">
    <br><br>
    <p class="lead">Please enter in your login details</p> 
  </div>

  <div class="login-box"> 
    {{ Form::open(array('action' => 'AuthController@postLoginUser', 'role' => 'form')) }}
    <div class="form-group">
      {{ Form::label('User', 'Username', array('class' => 'control-label label-mcc')); }}
      {{ Form::text('Username', null, array('class' => 'form-control form-mcc', 'required' => '')); }}
    </div>
    <div class="form-group">
      {{ Form::label('Password', 'Password', array('class' => 'control-label label-mcc')); }}
      {{ Form::password('Password', array('class' => 'form-control form-mcc', 'required' => '')); }}
    </div>
    <br>
    {{ Form::submit('Sign in', array('class' => 'btn btn-primary pull-left')); }}
    <a href="{{ action('UserController@create') }}", type="button" class="btn btn-default pull-right">Create new account</a>    
    {{ Form::close() }}
  </div> <!-- /login box -->
  
</div>
@stop 



