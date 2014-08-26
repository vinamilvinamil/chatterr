@extends('master')
@section('content')


<header class="home-image" style="background-image:url('{{ asset('images/bg.jpg') }}'); no-repeat cover;">
  <div class="home-intro">
    <h1 class="text-jumbo">CHATTER</h1>
    <h3>A new way to engage in discussions.</h3>
    <a href="{{ url('forum') }}" class="btn btn-default">Try It Out</a>
  </div>
</header>

  <!-- Login modal -->
  @include('modals.login')

   <!-- Begin footer -->
      <div class="container-fluid footer">
        <div class="row">
        </div>  
      </div>

@stop    