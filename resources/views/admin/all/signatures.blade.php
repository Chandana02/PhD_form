@extends('layouts.admin')

@section('title', 'Home - Admin')

@section('navbar')
<nav>
  <div class="nav-wrapper ">
    
    <a href="#" details-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="hide-on-sm-and-down">
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
<div class="row">
  <div class="col l4 center center">
    <img src={{URL::asset('uploads/signatures/AR.'.$AR)}} width="230" height="100">
    <p>Architecture</p>
  </div>
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/CS.'.$CS)}} width="230" height="100">
    <p>C.S.E </p>
  </div>
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/CL.'.$CL)}} width="230" height="100">
    <p>Chemical Engg. </p>
  </div>
  <div class="space-large"></div>
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/CV.'.$CV)}} width="230" height="100">
    <p>Civil Engineering </p>
  </div>  
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/CY.'.$CY)}} width="230" height="100">
    <p>Chemistry </p>
  </div>
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/CA.'.$CA)}} width="230" height="100">
    <p>Computer Appl. </p>
  </div>
  <div class="space-large"></div>
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/CC.'.$CC)}} width="230" height="100">
    <p>CECASE </p>
  </div>
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/EN.'.$EN)}} width="230" height="100">
    <p>D.E.E </p>
  </div>
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/EC.'.$EC)}} width="230" height="100">
    <p>E.C.E </p>
  </div>
  <div class="space-large"></div>
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/EE.'.$EE)}} width="230" height="100">
    <p>E.E.E </p>
  </div>  
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/HM.'.$HM)}} width="230" height="100">
    <p>Humanities </p>
  </div>
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/ME.'.$ME)}} width="230" height="100">
    <p>Mechanical Engg. </p>
  </div>
  <div class="space-large"></div>
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/MA.'.$MA)}} width="230" height="100">
    <p>Mathematics </p>
  </div>  
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/MME.'.$MME)}} width="230" height="100">
    <p>M.M.E. </p>
  </div>
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/PR.'.$PR)}} width="230" height="100">
    <p>Production Engg.</p> 
  </div>
  <div class="space-large"></div>
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/IC.'.$IC)}} width="230" height="100">
    <p>I.C.E. <p>
  </div>  
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/PH.'.$PH)}} width="230" height="100">
    <p>Physics </p>
  </div>
  <div class="col l4 center">
    <img src={{URL::asset('uploads/signatures/MS.'.$MS)}} width="230" height="100">
    <p>Management Studies </p>
  </div>
</div>
@endsection