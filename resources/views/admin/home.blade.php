@extends('layouts.admin')

@section('title', 'Home - Admin')

@section('navbar')
<nav>
  <div class="nav-wrapper ">
    
    <a href="#" details-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="hide-on-sm-and-down">
      <li><a href="/admin/home">Home</a></li>
      <li><a href="/hod-instructions">Instructions</a></li>
      <li><a href="/logout">Logout</a></li>

    </ul>
    <ul class="side-nav" id="mobile-demo">
      <li><a href="#">Home</a></li>
      <li><a href="/hod-instructions">Instructions</a></li>
      <li><a href="/logout">Logout</a></li>
    </ul>
  </div>
</nav>
@endsection

@section('body')
  <div class="space-large"></div>
  <div class="container main">
    @if(Session::get('dept') != 'all' && $hod_sign != null)
    <div class="center">
      <img src={{URL::asset('uploads/signatures/'.$hod_sign)}} width="230" height="100">
    </div>
    @endif
    <div class="row">
    
      <div class="col l6 s6 center">
          <a class="waves-effect waves-light btn" href="ms">M.S. Applicants <font size="2">({!! $count['MS'] !!})</font></a>
      </div>
      <div class="col l6 s6 center">
          <a class="waves-effect waves-light btn" href="phd">Ph.D. Applicants <font size="2">({!! $count['PHD'] !!})</font></a>
      </div>
    </div>
    @if(Session::get('dept') != 'all')
      <div class="col center">
        <a class="waves-effect waves-light btn" href="upload">Upload Signature</a>
      </div>
    @else
      <div class="col center">
        <a class="waves-effect waves-light btn" href="hodsignatures">HOD Signatures</a>
      </div>
    @endif
  </div>
  <div class="space-medium">

  </div>
@endsection