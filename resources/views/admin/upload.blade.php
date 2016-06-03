@extends('layouts.admin')

@section('title', 'Home - Admin')

@section('navbar')
<nav>
  <div class="nav-wrapper ">
    
    <a href="#" details-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="hide-on-med-and-down">
      <li><a href="home">Home</a></li>
      <li><a href="home">Ph.D/M.S. Admissions</a></li>
      <li><a href="/logout">Logout</a></li>
    </ul>
    <ul class="side-nav" id="mobile-demo">
      <li><a href="home">Home</a></li>
      <li><a href="home">Ph.D/M.S. Admissions</a></li>
      <li><a href="/logout">Logout</a></li>
    </ul>
  </div>
</nav>
@endsection

@section('body')
@if(Session::has('message'))
<p class="center">{{ Session::get('message') }}</p>
@endif
<div class="space-small"></div>
<div class="row">
  {!! Form::open(array( 'action' => 'AdminController@upload', 'method'=>'POST', 'files'=>true)) !!}
  <div class="file-field">
    <div class="btn teal darken-1 btn waves-effect waves-light">
      <span class="light">Sign</span>
      <input type="file" name="sign">    
    </div>
    <div class="file-path-wrapper">
      <input class="file-path validate" type="text">
    </div>
  </div>
  <div class="center col s8 offset-s2">
    {!! Form::submit('Upload', array('class'=>'teal darken-1 send-btn btn waves-effect waves-light' )) !!}
  </div>
  {!! Form::close() !!}
</div>
@endsection