<!DOCTYPE html>
<html>
<head>
  
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admissions NITT | Admin Portal</title>
  <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/materialize.min.css')}}">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="{{URL::asset('assets/js/jquery-2.1.1.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/materialize.min.js')}}"></script>
</head>
<body>
  <header> 
  </header>
  
 <nav>
    <div class="nav-wrapper ">
      
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="hide-on-med-and-down">
        <li><a href="/#">Home</a></li>
        <li><a href="/home">PhD/M.S. Admissions</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
       <li><a href="/#">Home</a></li>
        <li><a href="/home">PhD/M.S. Admissions</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
    </div>
  </nav>
  <div class="space-medium"></div>
  <div class="container main">
    <div class="row">
      {!! Form::open(array( 'action' => 'AdminController@login', 'method'=>'POST')) !!}
        <div class="secure flow-text center">Login</div>

        <div class="input-field col s8 offset-s2">
          <input placeholder="Enter Username" id="username" name="username" type="text" class="validate">
          <label for="first_name">Username</label>
        </div>
        <div class="input-field col s8 offset-s2">
          <input placeholder="Enter Password" id="password" name="password" type="password" class="validate">
          <label for="first_name">Password</label>
        </div>
        <div class="col s8 offset-s2 center">
          <p>Click <a href='change'>here</a> to change password</p>  
        </div>
        <div class="center col s8 offset-s2">
          {!! Form::submit('Submit', array('class'=>'teal darken-1 send-btn btn waves-effect waves-light' )) !!}
        </div>

        
        {!! Form::close() !!}
    </div>
  </div>
  
  <div class="space-large"></div>
<footer class="page-footer teal darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Contact Us</h5>
                <p class="grey-text text-lighten-4">National Institute of Technology</p>
                <p class="grey-text text-lighten-4">Tiruchirappalli - 620015</p>
                <p class="grey-text text-lighten-4">Tamil Nadu, INDIA</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">QuickLinks</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="http://www.nitt.edu/">Institute Website</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://www.nitt.edu/home/academics/departments/">Departments</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://www.nitt.edu/home/admissions/">Admissions</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://www.nitt.edu/contact">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright dark">
            <div class="container center">
            
            <a class="grey-text text-lighten-4" href="#!">Made with &hearts; by Delta Force</a>
            </div>
          </div>
</footer>
            

  <script type="text/javascript">
  $(document ).ready(function(){
    $(".button-collapse").sideNav();
  })
  </script>
  
</body>
</html>