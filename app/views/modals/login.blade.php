<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Sign in</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(array('action' => 'AuthController@postLogin', 'class' => 'form-horizontal', 'role' => 'form')) }}

        <div class="form-group @if($errors->has('Username'))
         has-error
         @endif">
         {{ Form::label('User', 'Username', array('class' => 'col-sm-2 control-label label-mcc')); }}
         <div class="col-xs-5">
          {{ Form::text('Username', '',array('class' => 'form-control form-mcc', 'required' => '')); }}
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
          {{ Form::password('Password', array('class' => 'form-control form-mcc', 'required' => '')); }}
        </div>
        <div class="col-sm-5">
          <span class="text-danger control-label pull-left">{{ $errors->first('Password') }}</span>
        </div>
      </div>

    </div>
    <div class="modal-footer">
      <div class="btn-group pull-left" style="margin-right:8px;">
        {{ Form::button('<i class="fa fa-sign-in glyph"></i>Log in', array('type' => 'submit', 'class' => 'btn btn-primary pull-left')); }}
      </div>
      <div class="btn-group pull-left">  
        <a href="{{ action('UserController@create') }}", type="button" class="btn btn-default pull-left">Create new account</a>
        {{ Form::close() }}
      </div>  

    </div>
  </div>
</div>
</div>
    <!-- End Login Modal -->