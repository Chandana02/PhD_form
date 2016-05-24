@extends('layouts.admin')

@section('title', 'MS Admin Portal')

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
  <div class="container main">
    <h5 class="center">List of M.S Departments</h5>
    <input type="hidden" value="PHD" class="phdormsc" />
    <div class="row buttons">
      <div class="col l4"> <a href="/admin/ms/CS" class="btn teal waves">C.S.E <font size="2">({!! $count['CS'] !!})</font></a> </div>
      <div class="col l4"> <a href="/admin/ms/CL" class="btn teal waves">Chemical Engg. <font size="2">({!! $count['CL'] !!})</font></a> </div>
      <div class="col l4"> <a href="/admin/ms/CV" class="btn teal waves">Civil Engineering <font size="2">({!! $count['CV'] !!})</font></a> </div> 
      <div class="space-large"></div>
      <div class="col l4"> <a href="/admin/ms/CC" class="btn teal waves">CECASE <font size="2">({!! $count['CC'] !!})</font></a> </div>
      <div class="col l4"> <a href="/admin/ms/EN" class="btn teal waves">Energy Engineering <font size="2">({!! $count['EN'] !!})</font></a> </div>
      <div class="col l4"> <a href="/admin/ms/EC" class="btn teal waves">E.C.E <font size="2">({!! $count['EC'] !!})</font></a> </div>
      <div class="space-large"></div>
      <div class="col l4"> <a href="/admin/ms/EE" class="btn teal waves">E.E.E <font size="2">({!! $count['EE'] !!})</font></a> </div>  
      <div class="col l4"> <a href="/admin/ms/ME" class="btn teal waves">Mechanical Engg. <font size="2">({!! $count['ME'] !!})</font></a> </div>
      <div class="col l4"> <a href="/admin/ms/MME" class="btn teal waves">M.M.E. <font size="2">({!! $count['MME'] !!})</font></a> </div>
      <div class="space-large"></div>
      <div class="col l4"> <a href="/admin/ms/PR" class="btn teal waves">Production Engg. <font size="2">({!! $count['PR'] !!})</font></a> </div>
      <div class="col l4"> <a href="/admin/ms/IC" class="btn teal waves">I.C.E. <font size="2">({!! $count['IC'] !!})</font></a> </div>
      <div class="col l4"> <a href="/admin/ms/PH" class="btn teal waves">Physics <font size="2">({!! $count['PH'] !!})</font></a> </div>
    </div>
  </div>
@endsection