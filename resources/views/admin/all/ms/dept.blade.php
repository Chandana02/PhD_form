@extends('layouts.master')

@section('title', 'MS Admin Portal')

@section('body')
  <div class="container main">
    <h5 class="center">List of M.S Departments</h5>
    <input type="hidden" value="PHD" class="phdormsc" />
    <div class="row buttons ">
      
      <div class="col l4"> <a href="/admin/ms/CS" class="btn teal waves">C.S.E</a> </div>
      <div class="col l4"> <a href="/admin/ms/CL" class="btn teal waves">Chemical Engineering</a> </div>
        <div class="col l4"> <a href="/admin/ms/CV" class="btn teal waves">Civil Engineering</a> </div> 
      
     
      
      
      <div class="space-large"></div>
      <div class="col l4"> <a href="/admin/ms/CC" class="btn teal waves">CECASE</a> </div>
      <div class="col l4"> <a href="/admin/ms/EN" class="btn teal waves">Energy Engineering</a> </div>
      <div class="col l4"> <a href="/admin/ms/EC" class="btn teal waves">E.C.E</a> </div>
      <div class="space-large"></div>
      <div class="col l4"> <a href="/admin/ms/EE" class="btn teal waves">E.E.E</a> </div>  
      <div class="col l4"> <a href="/admin/ms/ME" class="btn teal waves">Mechanical Engg.</a> </div>
      <div class="col l4"> <a href="/admin/ms/MME" class="btn teal waves">M.M.E.</a> </div>
      <div class="space-large"></div>
      
      
      <div class="col l4"> <a href="/admin/ms/PR" class="btn teal waves">Production Engg.</a> </div>
      <div class="col l4"> <a href="/admin/ms/IC" class="btn teal waves">I.C.E.</a> </div>
      <div class="col l4"> <a href="/admin/ms/PH" class="btn teal waves">Physics</a> </div>
    </div>
  </div>
  
@endsection