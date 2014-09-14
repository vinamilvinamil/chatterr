@extends('master')
@section('content')

@include('layout.userbar')
@include('modals.login')

<div class="container">
  <div class="row">
    <div class="col-md-7">
    <h3>Edit Post</h3>
      @if (Session::has('errors'))
      <div class="row">
        <div class="col-md-7">
          <div class="alert alert-danger login-error alert-dismissible pull-left" autofocus role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <strong class="glyph">{{ $errors->first() }}</strong>
          </div>
        </div>
      </div>
      @endif      
      {{ Form::model($post, array('action' => array('TopicController@editPost', 
       'role' => 'form', 
       'post_id' => $post -> id, 
       'topic_id' => $post -> topic -> id
       ))) }}
      <div class="form-group">
        {{ Form::textarea('content', null, array('class' => 'form-control form-mcc mce', 'row' => '6')); }}          
      </div>    
      <div class="btn-group pull-left" style="margin-right:8px;">
        {{ Form::button('<i class="fa fa-edit glyph"></i>Submit Edit', array('type' => 'submit', 'class' => 'btn btn-primary')); }}
      </div>
      <div class="btn-group pull-left">  
        <a href="#", type="button" class="btn btn-default pull-left">Delete Post</a>
      </div>
      {{ Form::close() }}
    </div>
  </div>  
</div>
@stop