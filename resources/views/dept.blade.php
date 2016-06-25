@extends('layouts.master')

@section('title', 'Admit Card')

@section('body')
  <h5 class="heading center">{!! $candidate->registrationNumber !!}</h5>
  <div class="container main">
    <div class="row buttons">
      @if(in_array('AR', explode(',', $candidate->selected_depts), TRUE) !== false)
      <div class="col l4"> <a href="#!" dept="Architecture" class="dept btn teal waves">Architecture</a> </div>
      @endif
      @if(in_array('CS', explode(',', $candidate->selected_depts), TRUE) !== false)
      <div class="col l4"> <a href="#!" dept="Computer Science and Engineering" class="dept btn teal waves">C.S.E</a> </div>
      @endif
      @if(in_array('CL', explode(',', $candidate->selected_depts), TRUE) !== false)
      <div class="col l4"> <a href="#!" dept="Chemical Engineering" class="dept btn teal waves">Chemical Engg.</a> </div>
      @endif
      @if(in_array('CV', explode(',', $candidate->selected_depts), TRUE) !== false)
      <div class="col l4"> <a href="#!" dept="Civil Engineering" class="dept btn teal waves">Civil Engineering</a> </div>
      @endif 
      @if(in_array('CY', explode(',', $candidate->selected_depts), TRUE) !== false) 
      <div class="col l4"> <a href="#!" dept="Chemistry" class="dept btn teal waves">Chemistry</a> </div>
      @endif
      @if(in_array('CA', explode(',', $candidate->selected_depts), TRUE) !== false)
      <div class="col l4"> <a href="#!" dept="Computer Applications" class="dept btn teal waves">Computer Appl.</a> </div>
      @endif
      @if(in_array('CC', explode(',', $candidate->selected_depts), TRUE) !== false)
      <div class="col l4"> <a href="#!" dept="CECASE" class="dept btn teal waves">CECASE</a> </div>
      @endif
      @if(in_array('EN', explode(',', $candidate->selected_depts), TRUE) !== false)
      <div class="col l4"> <a href="#!" dept="Energy and Environment" class="dept btn teal waves">D.E.E</a> </div>
      @endif
      @if(in_array('EC', explode(',', $candidate->selected_depts), TRUE) !== false)
      <div class="col l4"> <a href="#!" dept="Electronics and Communication Engineering" class="dept btn teal waves">E.C.E</a> </div>
      @endif
      @if(in_array('EE', explode(',', $candidate->selected_depts), TRUE) !== false)
      <div class="col l4"> <a href="#!" dept="Electrical and Electronics Engineering" class="dept btn teal waves">E.E.E</a> </div>
      @endif 
      @if(in_array('HM', explode(',', $candidate->selected_depts), TRUE) !== false) 
      <div class="col l4"> <a href="#!" dept="Humanities and Social Sciences" class="dept btn teal waves">Humanities</a> </div>
      @endif
      @if(in_array('ME', explode(',', $candidate->selected_depts), TRUE) !== false)
      <div class="col l4"> <a href="#!" dept="Mechanical Engineering" class="dept btn teal waves">Mechanical Engg.</a> </div>
      @endif
      @if(in_array('MA', explode(',', $candidate->selected_depts), TRUE) !== false)
      <div class="col l4"> <a href="#!" dept="Mathematics" class="dept btn teal waves">Mathematics</a> </div>
      @endif  
      @if(in_array('MME', explode(',', $candidate->selected_depts), TRUE) !== false)
      <div class="col l4"> <a href="#!" dept="Metallurgical and Materials Engineering" class="dept btn teal waves">M.M.E.</a> </div>
      @endif
      @if(in_array('PR', explode(',', $candidate->selected_depts), TRUE) !== false)
      <div class="col l4"> <a href="#!" dept="Production Engineering" class="dept btn teal waves">Production Engg.</a> </div>
      @endif
      @if(in_array('IC', explode(',', $candidate->selected_depts), TRUE) !== false)
      <div class="col l4"> <a href="#!" dept="Instrumentation and Control Engineering" class="dept btn teal waves">I.C.E.</a> </div>
      @endif 
      @if(in_array('PH', explode(',', $candidate->selected_depts), TRUE) !== false) 
      <div class="col l4"> <a href="#!" dept="Physics" class="dept btn teal waves">Physics</a> </div>
      @endif
      @if(in_array('MS', explode(',', $candidate->selected_depts), TRUE) !== false)
      <div class="col l4"> <a href="#!" dept="Management Studies" class="dept btn teal waves">Management Studies</a> </div>
      @endif
      @if($candidate->selected_depts == '')
      <p class="center"><font size="6">Sorry! You're not shortlisted.</font></p>
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
