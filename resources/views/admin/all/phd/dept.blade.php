@extends('layouts.master')

@section('title', 'MS Admin Portal')

@section('body')
  <div class="container main">
    <h5 class="center">List of Ph.D Departments</h5>
    <input type="hidden" value="PHD" class="phdormsc" />
    <div class="row buttons ">
      <div class="col l4"> <a href="/admin/phd/AR" class="btn teal waves">Architecture</a> </div>
      <div class="col l4"> <a href="/admin/phd/CS" class="btn teal waves">C.S.E</a> </div>
      <div class="col l4"> <a href="/admin/phd/CL" class="btn teal waves">Chemical Engineering</a> </div>
      <div class="space-large"></div>
      <div class="col l4"> <a href="/admin/phd/CV" class="btn teal waves">Civil Engineering</a> </div>  
      <div class="col l4"> <a href="/admin/phd/CY" class="btn teal waves">Chemistry</a> </div>
      <div class="col l4"> <a href="/admin/phd/CA" class="btn teal waves">Computer Applications</a> </div>
      <div class="space-large"></div>
      <div class="col l4"> <a href="/admin/phd/CC" class="btn teal waves">CECASE</a> </div>
      <div class="col l4"> <a href="/admin/phd/EN" class="btn teal waves">Energy Engineering</a> </div>
      <div class="col l4"> <a href="/admin/phd/EC" class="btn teal waves">E.C.E</a> </div>
      <div class="space-large"></div>
      <div class="col l4"> <a href="/admin/phd/EE" class="btn teal waves">E.E.E</a> </div>  
      <div class="col l4"> <a href="/admin/phd/HM" class="btn teal waves">Humanities & Social</a> </div>
      <div class="col l4"> <a href="/admin/phd/ME" class="btn teal waves">Mechanical Engg.</a> </div>
      <div class="space-large"></div>
      <div class="col l4"> <a href="/admin/phd/MA" class="btn teal waves">Mathematics</a> </div>  
      <div class="col l4"> <a href="/admin/phd/MME" class="btn teal waves">M.M.E.</a> </div>
      <div class="col l4"> <a href="/admin/phd/PR" class="btn teal waves">Production Engg.</a> </div>
      <div class="space-large"></div>
      <div class="col l4"> <a href="/admin/phd/IC" class="btn teal waves">I.C.E.</a> </div>  
      <div class="col l4"> <a href="/admin/phd/PH" class="btn teal waves">Physics.</a> </div>
      <div class="col l4"> <a href="/admin/phd/MS" class="btn teal waves">Management Studies.</a> </div>
    </div>
  </div>
@endsection