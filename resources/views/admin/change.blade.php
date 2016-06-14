<!DOCTYPE html>
<html>
<head>
  
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admissions NITT | Admin Portal</title>
  <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/materialize.min.css')}}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="shortcut icon" href="{{URL::asset('assets/images/logo.png')}}">
  <script src="{{URL::asset('assets/js/jquery-2.1.1.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/materialize.min.js')}}"></script>
</head>
<body>
  <header style="height: 25vh;
	padding: 0px;
	margin: 0px;
	background-image: url('{{URL::asset('assets/images/header.png')}}');
	background-repeat: no-repeat;
	background-position: center;
	background-color: #004d40;
	background-size: contain;"></header>
  
 <nav>
    <div class="nav-wrapper ">
      
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="hide-on-sm-and-down">
        <li><a href="/#">Home</a></li>
        <li><a href="/home">Ph.D/M.S. Admissions</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
       <li><a href="/#">Home</a></li>
        <li><a href="/home">Ph.D/M.S. Admissions</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
    </div>
  </nav>
  <div class="space-medium"></div>
  <div class="container main">
    <div class="row">
      {!! Form::open(array( 'action' => 'AdminController@change', 'method'=>'POST')) !!}
        <div class="secure flow-text center">Login</div>

        <div class="input-field col s8 offset-s2">
          <input placeholder="Enter username" id="username" name="username" type="text" class="validate">
          <label for="user_name">Username</label>
        </div>
        <div class="input-field col s8 offset-s2">
          <input placeholder="Enter old password" id="old_password" name="old_password" type="password" class="validate">
          <label for="old_password">Old Password</label>
        </div>
        <div class="input-field col s8 offset-s2">
          <input placeholder="Enter new password" id="new_password" name="new_password" type="password" class="validate">
          <label for="new_password">Old Password</label>
        </div>
        <div class="center col s8 offset-s2">
          {!! Form::submit('Change', array('class'=>'teal darken-1 send-btn btn waves-effect waves-light' )) !!}
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