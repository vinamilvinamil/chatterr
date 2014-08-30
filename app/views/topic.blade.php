@extends('master')
@section('content')

@include('layout.userbar')
@include('modals.login')

<div class="container">
  <h2> {{ $topic -> title }} </h2>
  <br>

  <!-- Topic Main Post -->
  <div class="media post-row post-top">
    <a class="pull-left" href="#">
      <img class="media-object" src="http://placehold.it/80x80/fd7400/fff" alt="user-image">
    </a>
    <div class="media-body">
      <h4 class="media-heading">{{ $topic -> user -> username }} </h4>
      <p class="pull-right">
        {{ date("M Y",strtotime($topic->created_at)) }}
      </p>
      {{ $topic -> content }}

      <div>
        <ul class="list-inline post-info">
          <li>
            <h6>Created</h6>
            <span class="text-primary"> {{ date("M Y",strtotime($topic->created_at)) }}</span>
          </li>
          <li>
            <h6>Posts</h6>
            <span class="text-primary"> {{ $topic -> posts -> count() }}</span>
          </li>
          <li>
            <h6>Views</h6>
            <span class="text-primary"> {{ $topic -> views }}</span>
          </li>
          <li>
            <h6>Likes</h6>
            <span class="text-primary"> {{ $topic -> likes }}</span>
          </li>
        </ul>
      </div>
    </div>

    <div class="pull-right text-primary">{{ $topic -> likes }} Likes</div>



  </div>

  <!-- Reply Posts -->  
  @foreach($posts as $post)
  <div class="media post-row">
    <a class="pull-left" href="#">
      <img class="media-object" src="http://placehold.it/80x80/004358/fff" alt="user-image">
    </a>
    <div class="media-body">
      <h4 class="media-heading">{{ $post -> user -> username }} </h4>
      <p class="pull-right">
        {{ date("M Y",strtotime($post->created_at)) }}
      </p>
      <div>
        {{ $post -> content }}
      </div>
    </div>
  </div>
  @endforeach

  <!-- Reply Form -->
  @if (Auth::check())

  @if (Session::has('errors'))
  <div class="row">
    <div class="col-md-7">
      <div class="alert alert-danger login-error alert-dismissible pull-left" autofocus role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <strong>{{ $errors->first() }}</strong>
      </div>
    </div>
  </div>
  @endif 

  <div class="row post-reply">
    <div class="col-md-7">
      {{ Form::open(array('action' => array('TopicController@createReply', 'Topic_id' => $topic->id), 'role' => 'form')) }}
      <div class="form-group">
        {{ Form::textarea('Content', null, array('class' => 'form-control form-mcc mce', 'row' => '6')); }}          
      </div>    
      <div>
        {{ Form::button('<i class="fa fa-comment glyph"></i>Submit reply', array('type' => 'submit', 'class' => 'btn btn-primary')); }}
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ url('forum') }}">Cancel</a>
      </div>
      {{ Form::close() }}
    </div>
  </div>
  <!-- End Reply Form --> 
  @else
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
  <span class="fa fa-user glyph"></span>Login to reply</button> 
  @endif

</div><!-- End Container --> 
@stop