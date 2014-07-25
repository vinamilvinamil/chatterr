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