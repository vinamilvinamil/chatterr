<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="A modern discussion platform">
  <meta name="author" content="Michael Hanslo">
  <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

  <title>Chatter</title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/mcc.css') }}" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />

  <!-- TinyMCE Initiate -->
  <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
  <script type="text/javascript">
    tinymce.init({
      plugins: "link emoticons image",
      selector: "textarea.mce",
      width: '90%',
      extended_valid_elements : 'iframe[src|title|width|height|allowfullscreen|frameborder]',
      menubar: false,
      statusbar:  false,
      toolbar: "undo redo | bold italic | link | emoticons | image",
      forced_root_block : "",
      force_br_newlines : true,
      force_p_newlines : false
    });
  </script>


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body>

      <nav class="navbar navbar-default navbar-fixed-top mc-nav" role="navigation">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand logo" href="{{ url('/') }}"><img src="{{ asset('images/logo-s.png') }}" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
              <li><a href="{{ URL::to('/') }}">Home</a></li>
              <li><a href="{{ action('TopicController@index') }}">Forum</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  

  @yield('content')


    <!-- Core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

  </body>
  </html>
