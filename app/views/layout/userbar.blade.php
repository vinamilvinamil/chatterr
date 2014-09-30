<div class="container-fluid forum-userbar">
	<div class="container">

		<!-- Alert box -->
		<div class="pull-left">
			@if (Session::has('message'))
			<div class="alert alert-success forum-alert alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<span class="fa fa-check glyph"></span>
				<span class="glyph">{{ Session::get('message') }}</span>
			</div>
			@endif
		</div>

		<!-- Login and logout button -->
		<div class="btn-group" style="margin-right:8px;">
			@if (Auth::check())	
			<button type="button" id="userOptions" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
				{{ Auth::user() -> username }}
				@else
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
					<span class="fa fa-user glyph"></span>
					Log in
					@endif
				</button>
				<ul class="dropdown-menu" aria-labelledby="userOptions" role="menu">
					<li><a href="{{ action('AuthController@getLogout') }}">Log out</a></li>
				</ul>	
			</div>

		<!-- User menu button -->	
			<div class="btn-group">
				<a type="button" id="forumOptions" class="dropdown-toggle" data-toggle="dropdown">
					<span class="fa fa-bars fa-2x"></span>
				</a>
				<ul class="dropdown-menu pull-right" aria-labelledby="forumOptions" role="menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
				</ul>
			</div>
		</div>	
	</div>