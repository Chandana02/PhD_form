<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admissions NITT | Rules</title>
  <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/materialize.min.css')}}">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="{{URL::asset('assets/js/jquery-2.1.1.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/materialize.min.js')}}"></script>
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
      <ul class="hide-on-med-and-down">
        <li><a href="/home">Home</a></li>
        <li><a href="/home">PhD./M.S. Admissions</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
       <li><a href="/home">Home</a></li>
        <li><a href="/home">PhD./M.S. Admissions</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
    </div>
  </nav>

  <div class="space-medium"></div>
  <div class="container main">
  	<div class="row">
      <h5 class="center">
        Instructions to fill the application
      </h5>
      <div class="space-small"></div>
      <div class="inst">
        <ol>
          <li>Use Google Chrome to fill the application.</li>
          <li>Please read the <a href="#">information brouchure </a>before filling the aplication.</li>
          <li>The entire registration process is of 3 stages. 
            <ul>
              <li>Stage 1: Personal details</li>
              <li>Stage 2: Online payment</li>
              <li>Stage 3: Other details</li>
            </ul>
          </li>
          <li>Application fees should be paid through  <a href="https://www.onlinesbi.com/prelogin/icollecthome.htm?corpID=88587">State Bank Collect</a> before the submission of the application form.</li>
          <li>If any information given in the application is found incorrect, the application will be rejected.</li>
        </ol>
      </div>
      <div class="space-small"></div>
      <div class="center">
      <a href="/phd" class="center btn teal waves">Proceed</a>

      </div>
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