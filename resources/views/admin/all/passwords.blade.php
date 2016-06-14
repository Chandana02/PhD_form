@extends('layouts.admin')

@section('title', 'Home - Admin')

@section('navbar')
<nav>
  <div class="nav-wrapper ">
    
    <a href="#" details-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="hide-on-sm-and-down">
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
<div class="container">
  <table class="centered striped">
    <thead>
      <tr>
          <th data-field="dept">Department</th>
          <th data-field="userName">User Name</th>
          <th data-field="pass">Password</th>
      </tr>
    </thead>

    <tbody>
      @for($i = 0; $i < sizeof($credentials) - 1; $i++)
      <tr>
        <td>{!! $credentials[$i]->dept !!}</td>
        <td>{!! $credentials[$i]->userName !!}</td>
        <td>{!! $credentials[$i]->encrypt_pass !!}</td>
      </tr>
      @endfor
    </tbody>
  </table>
</div>
<script type="text/javascript">
function department(t)
{
  if(t == 'CS')
  {
    return 'Computer Science and Engineering';
  }
  if(t == 'CL')
  {
    return 'Chemical Engineering';
  }
  if(t == 'CV')
  {
    return 'Civil Engineering';
  }
  if(t == 'CC')
  {
    return 'CECASE';
  }
  if(t == 'EN')
  {
    return 'Energy and Environment';
  }
  if(t == 'EE')
  {
    return 'Electrical and Electronics Engineering';
  }
  if(t == 'EC')
  {
    return 'Electronics and Communication Engineering';
  }
  if(t == 'ME')
  {
    return 'Mechanical Engineering';
  }
  if(t == 'PR')
  {
    return 'Production Engineering';
  }
  if(t == 'IC')
  {
    return 'Instrumentation and Control Engineering';
  }
  if(t == 'MME')
  {
    return 'Metalurgical and Materials Engineering';
  }
  if(t == 'PH')
  {
    return 'Physics';
  }   
}
</script>
@endsection