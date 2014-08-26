@extends('master')
@section('content')

@include('layout.userbar')
@include('modals.login')

    <div class="container">
      <h2> {{ $topic -> title }} </h2>
      <br>

      <!-- Topic Main Post -->
      <div class="row post-row">
        <div class="col-md-2">
          <div class="pull-left">
            <img src="http://placehold.it/80x80" alt="user-image" >
            <p class="post-username"><strong>{{ $topic -> user -> username }} </strong></p>
          </div>
        </div> 
            <div class="col-md-7">
              <div class="pull-left">
              		<p>
              			{{ $topic -> content }}
              		</p>	
              </div>
            </div>      
	    </div> 

    <!-- Reply Posts -->  
    @foreach($posts as $post)
      <div class="media">
        <a class="pull-left" href="#">
          <img class="media-object" src="http://placehold.it/80x80/004358/fff" alt="user-image">
        </a>
        <div class="media-body">
          <h4 class="media-heading">{{ $post -> user -> username }} </h4>
          <p class="pull-right">
            {{ date("M Y",strtotime($post->created_at)) }}
          </p>
          {{ $post -> content }}
        </div>
      </div>
    @endforeach

    <!-- Reply Form -->
      @if (Session::has('errors'))
        <div class="alert alert-danger login-error alert-dismissible pull-left" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
            <strong>{{ $errors->first() }}</strong>
        </div>
      @endif 

      <div class="row post-reply">
      <div class="col-md-7">
        {{ Form::open(array('action' => array('TopicController@createReply', 'Topic_id' => $topic->id), 'role' => 'form')) }}
          <div class="form-group">
            {{ Form::textarea('Content', null, array('class' => 'form-control form-mcc mce', 'row' => '6')); }}          
          </div>    
      <div>
        {{ Form::submit('Submit reply', array('class' => 'btn btn-primary')); }}
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ url('forum') }}">Cancel</a>
      </div>
      {{ Form::close() }}
    </div>
   <!-- End Reply Form --> 

</div>



@stop