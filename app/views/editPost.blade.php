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
      {{ Form::model($post, array('method' => 'put',
       'action' => array('PostController@update', 'post_id' => $post -> id),
       'role' => 'form'
       )) }}
       <div class="form-group">
        {{ Form::textarea('content', null, array('class' => 'form-control form-mcc mce', 'row' => '6')); }}          
      </div>    
      <div class="btn-group pull-left" style="margin-right:8px;">
        {{ Form::button('<i class="fa fa-edit glyph"></i>Submit Edit', array('type' => 'submit', 'class' => 'btn btn-primary')); }}
      </div>
      {{ Form::close() }}

      {{ Form::open(array('action' => array('PostController@destroy', $post -> id), 'method' => 'delete')) }}
      {{ Form::submit('Delete post!', array('class' => 'btn btn-default')) }}
      {{ Form::close() }}
    </div>
  </div>  
</div>
@stop