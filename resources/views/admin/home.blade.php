@extends('layouts.admin')

@section('title', 'Home - Admin')

@section('navbar')
<nav>
  <div class="nav-wrapper ">
    
    <a href="#" details-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="hide-on-med-and-down">
      <li><a href="#">Home</a></li>
      <li><a href="#">Ph.D/M.S. Admissions</a></li>
      <li><a href="/logout">Logout</a></li>
    </ul>
    <ul class="side-nav" id="mobile-demo">
      <li><a href="#">Home</a></li>
      <li><a href="#">Ph.D/M.S. Admissions</a></li>
      <li><a href="/logout">Logout</a></li>
    </ul>
  </div>
</nav>
@endsection

@section('body')
  <div class="space-large"></div>
  <div class="container main">
    <div class="row">
      <div class="col l6 s6 center">
          <a class="waves-effect waves-light btn" href="ms">M.S. Applicants <font size="2">({!! $count['MS'] !!})</font></a>
      </div>
      <div class="col l6 s6 center">
          <a class="waves-effect waves-light btn" href="phd">Ph.D. Applicants <font size="2">({!! $count['PHD'] !!})</font></a>
      </div>
    </div>
  </div>
  <div class="space-medium"></div>
@endsection