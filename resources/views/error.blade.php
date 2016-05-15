@extends('layouts.master')

@section('title', 'Error')

@section('body')
  <div class="container main">
  	<div class="row">
      <h5>{!! isset($message) ? $message : "We encountered an unexpected error. Please retry." !!}</h5>
        
        <input action="action" type="button" value="Click here to go back" class="btn teal" onclick="history.go(-1);" />
  	</div>
  </div>  
@endsection