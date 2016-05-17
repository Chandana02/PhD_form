@extends('layouts.master')

@section('title', 'Form Submitted')

@section('headerIncludes')
	<script src="{{URL::asset('assets/js/print.js')}}"></script>
@endsection

@section('body')
	<div class="container main">
		<div class="row">
			<div class="col l10 offset-l1 s10 offset-s1 ">
				<div class="card">
					<div class=" waves-effect waves-block waves-light">  
					</div>
					<div class="card-content">
						<span class="card-title activator grey-text text-darken-4">{!! $details['name'] !!}</span>
						<div class="row">
							<div class="col l12 s12">
								<span>Registration Number: {!! $details['reg_number'] !!}</span>
							</div>
						</div>
						<div class="row" style="font-size: 13px">
							<div class="col l6 s6">
								<span class="col l5 s6">Name: </span>
								<span class="col l7 s6">{!! $details['name']!!}</span>
							</div>
							<div class="col l6 s6">
								<span class="col l5 s6">Department 1: </span>
								<span class="col l7 s6">{!! $details['department1'] !!}</span>
							</div>
						</div>
						<div class="row" style="font-size: 13px">
							<div class="col l6 s6">
								<span class="col l5 s6">Department 2: </span>
								<span class="col l7 s6">{!! $details['department2'] !!}</span>
							</div>
							<div class="col l6 s6">
								<span class="col l5 s6">Department 3: </span>
								<span class="col l7 s6">{!! $details['department3'] !!}</span>
							</div>
						</div>
						<div class="space-small center">
						</div>
						<div class="center">
							<a class="waves-effect waves-light btn modal-trigger print" data-reg={!! $details['reg_number'] !!} href="#!" >Click Here To view full form</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection