@extends('master')
@section('content')

<div class="container-fluid forum-userbar">
	<div class="container">
		<div class="btn-group">
			<button type="button" id="forumOptions" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    Action <span class="caret"></span>
			</button>
			<ul class="dropdown-menu" aria-labelledby="forumOptions" role="menu">
				<li><a href="#">Action</a></li>
				<li><a href="#">Another action</a></li>
				<li><a href="#">Something else here</a></li>
			</ul>
		</div>
		<div class="btn-group">
			@if (Auth::check())	
				<button type="button" id="userOptions" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
				{{ Auth::user() -> username }}
			@else
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
				Sign in
			@endif
				</button>
			<ul class="dropdown-menu" aria-labelledby="userOptions" role="menu">
				<li><a href="{{ url('logout') }}">Log out</a></li>
			</ul>	
		</div>
	</div>	
</div>

<!-- Login Modal -->
    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Sign in</h4>
          </div>
          <div class="modal-body">
            {{ Form::open(array('url' => 'login', 'class' => 'form-horizontal', 'role' => 'form')) }}

            <div class="form-group @if($errors->has('Username'))
                                   has-error
                                   @endif">
                {{ Form::label('User', 'Username', array('class' => 'col-sm-2 control-label label-mcc')); }}
                  <div class="col-xs-5">
                    {{ Form::text('Username', '',array('class' => 'form-control form-mcc')); }}
                  </div>
                  <div class="col-sm-5">
                    <span class="text-danger control-label pull-left">{{ $errors->first('Username') }}</span>
                  </div>
            </div>

             <div class="form-group @if($errors->has('Password'))
                                    has-error
                                    @endif">
                {{ Form::label('Password', 'Password', array('class' => 'col-sm-2 control-label label-mcc')); }}
                  <div class="col-xs-5">
                    {{ Form::password('Password', array('class' => 'form-control form-mcc')); }}
                  </div>
                  <div class="col-sm-5">
                    <span class="text-danger control-label pull-left">{{ $errors->first('Password') }}</span>
                  </div>
            </div>

          </div>
          <div class="modal-footer">
            <div class="col-sm-3" style="padding-left:0px; margin-right:-26px;">
              {{ Form::submit('Sign in', array('class' => 'btn btn-primary pull-left')); }}
            </div>
            <div class="col-sm-9">  
              <a href="{{ url('signup') }}", type="button" class="btn btn-default pull-left">Create new account</a>
              {{ Form::close() }}
            </div>  

            </div>
        </div>
      </div>
    </div>
    <!-- End Login Modal -->

    <!-- Post title -->
    <div class="container">
    <h2> {{ $topic -> title }} </h2>
    <br>
    <!-- End post title -->

    <!-- Forum Post -->
    <div class="pull-left">
      <img src="http://placehold.it/80x80" alt="user-image" >
      <p><strong>{{ $topic -> user -> username }}</strong></p>
    </div>
    <div>
    		<p>
    			{{ $topic -> content }}
    		</p>	
    </div>    
	
</div>
<!-- End Forum Post --> 

@stop