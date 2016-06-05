@extends('layouts.master')

@section('title', 'Admit Card')

@section('body')
  <h5 class="heading center">{!! $candidate->registrationNumber !!}</h5>
  <div class="container main">
    <div class="row buttons">
      @if(strpos($candidate->selected_depts, 'AR') !== false)
      <div class="col l4"> <a href="#!" dept="Architecture" class="dept btn teal waves">Architecture</a> </div>
      @elseif(strpos($candidate->selected_depts, 'CS') !== false)
      <div class="col l4"> <a href="#!" dept="Computer Science and Engineering" class="dept btn teal waves">C.S.E</a> </div>
      @elseif(strpos($candidate->selected_depts, 'CL') !== false)
      <div class="col l4"> <a href="#!" dept="Chemical Engineering" class="dept btn teal waves">Chemical Engg.</a> </div>
      @elseif(strpos($candidate->selected_depts, 'CV') !== false)
      <div class="col l4"> <a href="#!" dept="Civil Engineering" class="dept btn teal waves">Civil Engineering</a> </div> 
      @elseif(strpos($candidate->selected_depts, 'CY') !== false) 
      <div class="col l4"> <a href="#!" dept="Chemistry" class="dept btn teal waves">Chemistry</a> </div>
      @elseif(strpos($candidate->selected_depts, 'CA') !== false)
      <div class="col l4"> <a href="#!" dept="Computer Applications" class="dept btn teal waves">Computer Appl.</a> </div>
      @elseif(strpos($candidate->selected_depts, 'CC') !== false)
      <div class="col l4"> <a href="#!" dept="CECASE" class="dept btn teal waves">CECASE</a> </div>
      @elseif(strpos($candidate->selected_depts, 'EN') !== false)
      <div class="col l4"> <a href="#!" dept="Energy and Environment" class="dept btn teal waves">D.E.E</a> </div>
      @elseif(strpos($candidate->selected_depts, 'EC') !== false)
      <div class="col l4"> <a href="#!" dept="Electronics and Communication Engineering" class="dept btn teal waves">E.C.E</a> </div>
      @elseif(strpos($candidate->selected_depts, 'EE') !== false)
      <div class="col l4"> <a href="#!" dept="Electrical and Electronics Engineering" class="dept btn teal waves">E.E.E</a> </div> 
      @elseif(strpos($candidate->selected_depts, 'HM') !== false) 
      <div class="col l4"> <a href="#!" dept="Humanities and Social Sciences" class="dept btn teal waves">Humanities</a> </div>
      @elseif(strpos($candidate->selected_depts, 'ME') !== false)
      <div class="col l4"> <a href="#!" dept="Mechanical Engineering" class="dept btn teal waves">Mechanical Engg.</a> </div>
      @elseif(strpos($candidate->selected_depts, 'MA') !== false)
      <div class="col l4"> <a href="#!" dept="Mathematics" class="dept btn teal waves">Mathematics</a> </div>  
      @elseif(strpos($candidate->selected_depts, 'MME') !== false)
      <div class="col l4"> <a href="#!" dept="Metallurgical and Materials Engineering" class="dept btn teal waves">M.M.E.</a> </div>
      @elseif(strpos($candidate->selected_depts, 'PR') !== false)
      <div class="col l4"> <a href="#!" dept="Production Engineering" class="dept btn teal waves">Production Engg.</a> </div>
      @elseif(strpos($candidate->selected_depts, 'IC') !== false)
      <div class="col l4"> <a href="#!" dept="Instrumentation and Control Engineering" class="dept btn teal waves">I.C.E.</a> </div> 
      @elseif(strpos($candidate->selected_depts, 'PH') !== false) 
      <div class="col l4"> <a href="#!" dept="Physics" class="dept btn teal waves">Physics</a> </div>
      @elseif(strpos($candidate->selected_depts, 'MS') !== false)
      <div class="col l4"> <a href="#!" dept="Management Studies" class="dept btn teal waves">Management Studies</a> </div>
      @endif
    </div>
  </div>
  <div class="space-medium"></div>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.dept').click(function(){
      window.location = '/admit/' + $('.heading').html().split('/')[0] + '/' + $('.heading').html().replace(/\//g, '-') + '/' + $(this).attr('dept');
    })
  });
  </script>
@endsection
