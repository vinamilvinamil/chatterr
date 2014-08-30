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
		<div class="pull-left">
			@if (Session::has('message'))
				<div class="alert alert-success forum-alert alert-dismissible" role="alert">
			    	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
			      	<span class="sr-only">Close</span>
			    	</button>
			    	{{ Session::get('message') }}&nbsp;&nbsp;
		 		</div>
			@endif
		</div>

		<div class="btn-group">
			@if (Auth::check())	
			<button type="button" id="userOptions" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
				{{ Auth::user() -> username }}
				@else
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
					Log in
					@endif
				</button>
				<ul class="dropdown-menu" aria-labelledby="userOptions" role="menu">
					<li><a href="{{ url('logout') }}">Log out</a></li>
				</ul>	
			</div>
		</div>	
	</div>