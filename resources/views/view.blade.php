@extends('layouts.master')

@section('title', 'View my Application')

@section('body')
	<div class="container main">
		<div class="row">
			{!! Form::open(array( 'action' => 'ApplicationController@view', 'method'=>'POST')) !!}

			<div class="input-field col s8 offset-s2">
				<input id="regNo" name="regNo" type="text" class="validate">
				<label for="first_name">Registration Number</label>
			</div>
			<div class="center col s8 offset-s2">
				<button class="teal darken-1 send-btn btn waves-effect waves-light" type="submit">Submit</button>
			</div>

			
			{!! Form::close() !!}
		</div>
	</div>
@endsection
