@extends('layouts.admin')

@section('title', 'PhD Admin Portal')

@section('navbar')
    <ul class="hide-on-sm-and-down">
      <li><a href="/admin/home">Home</a></li>
      <li><a href="/admin/ms">M.S. Admissions</a></li>
      <li><a href="/admin/hod-passwords">HOD-Passwords</a></li>
      <li><a href="/logout">Logout</a></li>
    </ul>
    <ul class="side-nav" id="mobile-demo">
      <li><a href="/admin/home">Home</a></li>
      <li><a href="/admin/ms">M.S. Admissions</a></li>
      <li><a href="/logout">Logout</a></li>
    </ul>
@endsection

@section('body')
<div class="space-medium"></div>
  <div class="container main">
    <h5 class="center">List of Ph.D Departments</h5>
    <input type="hidden" value="PHD" class="phdormsc" />
    <div class="row buttons ">
      <div class="col l4"> <a href="/admin/phd/AR" class="btn teal waves">Architecture <font size="2">({!! $count['AR'] !!})</font></a> </div>
      <div class="col l4"> <a href="/admin/phd/CS" class="btn teal waves">C.S.E <font size="2">({!! $count['CS'] !!})</font></a> </div>
      <div class="col l4"> <a href="/admin/phd/CL" class="btn teal waves">Chemical Engg. <font size="2">({!! $count['CL'] !!})</font></a> </div>
      <div class="space-large"></div>
      <div class="col l4"> <a href="/admin/phd/CV" class="btn teal waves">Civil Engineering <font size="2">({!! $count['CV'] !!})</font></a> </div>  
      <div class="col l4"> <a href="/admin/phd/CY" class="btn teal waves">Chemistry <font size="2">({!! $count['CY'] !!})</font></a> </div>
      <div class="col l4"> <a href="/admin/phd/CA" class="btn teal waves">Computer Appl. <font size="2">({!! $count['CA'] !!})</font></a> </div>
      <div class="space-large"></div>
      <div class="col l4"> <a href="/admin/phd/CC" class="btn teal waves">CECASE <font size="2">({!! $count['CC'] !!})</font></a> </div>
      <div class="col l4"> <a href="/admin/phd/EN" class="btn teal waves">D.E.E <font size="2">({!! $count['EN'] !!})</font></a> </div>
      <div class="col l4"> <a href="/admin/phd/EC" class="btn teal waves">E.C.E <font size="2">({!! $count['EC'] !!})</font></a> </div>
      <div class="space-large"></div>
      <div class="col l4"> <a href="/admin/phd/EE" class="btn teal waves">E.E.E <font size="2">({!! $count['EE'] !!})</font></a> </div>  
      <div class="col l4"> <a href="/admin/phd/HM" class="btn teal waves">Humanities <font size="2">({!! $count['HM'] !!})</font></a> </div>
      <div class="col l4"> <a href="/admin/phd/ME" class="btn teal waves">Mechanical Engg. <font size="2">({!! $count['ME'] !!})</font></a> </div>
      <div class="space-large"></div>
      <div class="col l4"> <a href="/admin/phd/MA" class="btn teal waves">Mathematics <font size="2">({!! $count['MA'] !!})</font></a> </div>  
      <div class="col l4"> <a href="/admin/phd/MME" class="btn teal waves">M.M.E. <font size="2">({!! $count['MME'] !!})</font></a> </div>
      <div class="col l4"> <a href="/admin/phd/PR" class="btn teal waves">Production Engg. <font size="2">({!! $count['PR'] !!})</font></a> </div>
      <div class="space-large"></div>
      <div class="col l4"> <a href="/admin/phd/IC" class="btn teal waves">I.C.E. <font size="2">({!! $count['IC'] !!})</font></a> </div>  
      <div class="col l4"> <a href="/admin/phd/PH" class="btn teal waves">Physics <font size="2">({!! $count['PH'] !!})</font></a> </div>
      <div class="col l4"> <a href="/admin/phd/MS" class="btn teal waves">Management Studies <font size="2">({!! $count['MS'] !!})</font></a> </div>
    </div>
  </div>
@endsection