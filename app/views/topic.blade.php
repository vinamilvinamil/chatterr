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
      <div class="row post-row">
        <div class="col-md-2">
          <!-- Topic Post -->
          <div class="pull-left">
            <img src="http://placehold.it/80x80" alt="user-image" >
            <p class="post-username"><strong>{{ $post -> user -> username }} </strong></p>
          </div>
        </div> 
            <div class="col-md-7">
              <div class="pull-right">
                    {{ date("M Y",strtotime($post->created_at)) }}
              </div>
              <div class="pull-left">
                  <p class="post-content">
                    {{ $post -> content }}
                  </p>  
              </div>
            </div>      
      </div> 
    @endforeach

    <!-- Reply Form -->
      <div class="row post-reply">
      <div class="col-md-7">
        {{ Form::open(array('action' => array('TopicController@createReply', 'Topic_id' => $topic->id), 'role' => 'form')) }}
          <div class="form-group @if($errors->has('Content'))
                                 has-error
                                 @endif">
            {{ Form::label('Reply', 'Reply', array('class' => 'control-label label-mcc')); }}
            {{ Form::textarea('Content', null, array('class' => 'form-control form-mcc mce', 'row' => '6')); }}          
            <span class="text-danger control-label pull-left">{{ $errors->first('Content') }}</span>
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