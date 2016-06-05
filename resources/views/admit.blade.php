@extends('layouts.master')

@section('title', 'Admit Card')

@section('body')
<div class="row">
{!! Form::open(array('url'=>'admitcard','method'=>'POST')) !!}

    <div class="secure flow-text center">Admit Card</div>
    <div class="space-medium"></div>
    <div class="col l6 s12">
        <span class="light">Enter Registration Number</span>
        <input type="text" id="regNo" class="validate" name="regNo" required>
        </div>
        <div class="col l6 s12">
          <span class="light">Enter Date of Birth </span>
          <div class="row">
            <div class="col l4">
              <input placeholder="Year(yyyy)" required id="year" type="number" class="validate" name="year" max="2016" min="1900" value="">             
            </div>
            <div class="col l4">
              <input placeholder="Month(mm)" required id="month" type="number" class="validate" name="month" max="12" min="1" >              
            </div>
            <div class="col l4">
              <input placeholder="Day(dd)" required id="day" type="number" class="validate" name="day" max="day" min="1" >              
            </div>
          </div>
    </div>
    <div class="center col s8 offset-s2">
      {!! Form::submit('Submit', array('class'=>'teal darken-1 send-btn btn waves-effect waves-light' )) !!}
    </div>

{!! Form::close() !!}
</div>
@endsection
