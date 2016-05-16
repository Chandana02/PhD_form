@extends('layouts.master')

@section('title', 'Home - Admin')

@section('body')
  <div class="space-large"></div>
  <div class="container main">
    <div class="row">
      <div class="col l6 s6 center">
          <a class="waves-effect waves-light btn" href="ms">M.S. Applicants</a>
      </div>
      <div class="col l6 s6 center">
          <a class="waves-effect waves-light btn" href="phd">Ph.D. Applicants</a>
      </div>
    </div>
  </div>
  <div class="space-medium"></div>
@endsection