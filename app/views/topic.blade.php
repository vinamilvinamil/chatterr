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
      <img class="media-object" src="{{ $topic -> user -> avatars -> gravatar }}" alt="{{ $topic -> user -> username }}">
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
    @if ($topic -> likes > 0)
    <div class="pull-right text-primary">{{ $topic -> likes }} people likes this.</div>
    @endif  



  </div>

  <!-- Reply Posts -->  
  @foreach($posts as $post)
  <article class="media post-row">
    <a class="pull-left" href="#">
      <img class="media-object" src="{{ $post -> user -> avatars -> gravatar }}" alt="{{ $post -> user -> username }}">
    </a>
    <div class="media-body">
      <div class="media-heading">
        <span class="post-username">{{ $post -> user -> username }}</span>
        <span class="pull-right post-time">
          {{ date("M Y",strtotime($post->created_at)) }}
        </span>
      </div>
      <div>
        {{ $post -> content }}
      </div>
      <!-- Post controls -->
      <div class="btn-toolbar post-controls pull-right" role="toolbar">
        @if (Auth::check())
        <a href="#" class="like" title="Like this post" data-post-id="{{ $post -> id }}">
          <span class="btn-group fa fa-heart post-control-btn"></span>
        </a>
        <a href="#" title="Bookmark this post">
          <span class="btn-group fa fa-bookmark post-control-btn"></span>
        </a>
        @if (Auth::user() -> id == $post -> user -> id )
        <a href="{{ action('TopicController@getPost', $post->id) }}" title="Edit this post">
          <i class="btn-group fa fa-edit post-control-btn"></i>
        </a>
        @endif
        @endif
      </div> 

    </div>
    <div class="media-body">
      @if ($post -> likes > 0)
      <div class="text-primary pull-right">
        <div data-like-id="{{ $post -> id }}">{{ $post -> likes }} people likes this.</div>
      </div>
      @endif  
    </div>
  </article>
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
        <a href="{{ url('forum') }}">Cancel</a>
      </div>
      {{ Form::close() }}
    </div>
  </div>
  <!-- End Reply Form --> 
  @else
  <div style="height:10px;"></div>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
    <span class="fa fa-user glyph"></span>Login to reply</button> 
    <div style="height:80px;"></div>
    @endif

  </div><!-- End Container -->
  @stop







