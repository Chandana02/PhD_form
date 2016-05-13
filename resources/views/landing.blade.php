<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ph.d Registration Form</title>
  <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/materialize.min.css')}}">
  <!-- <link rel="shortcut icon" href="{{URL::asset('assets/logo.jpg')}}"> -->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
      <p class="imp"><b>Stage 1 of Application Process will start from Monday - 16th May, 2016 at 10:00 AM IST. We strongly recommend you to go through the application brochure and instructions mentioned below.</b></p>
      <div class="space-medium"></div>
      <div class="content">
        <h5 class="center"><b><u>INSTRUCTIONS:</u></b></h5>
        <ul class="pad">
          <li>1)Please Read carefully the Application <a>Brochure</a> before applying.</li>
          <li>2)Reach out to Help Desk Numbers mentioned in the <a href="contact">Contact</a> in case of a query.</li>
        </ul>
        <h5 class="center"><b><u>Application Process:</u></b></h5>
        <ul class="pad">
          <li><b>Stage 1</b>: Online application on <a>http://admission.nitt.edu/</a>  to be available from 16th May, 2016 - 10:00 AM IST</li>
          <li><b>Stage 2</b>: This stage is online payment of application fee through <a>SBI Collect.</a> </li>
          <li><b>Stage 3</b>: Proceed with the application form submitted in the first stage from your mail after online payment. Challan/Bank reference number would be used in this stage.</li>
        </ul>
      </div>
    </div>

  </div>
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
                  <li><a class="grey-text text-lighten-3" href="https://www.nitt.edu">Institute Website</a></li>
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
  });
  </script>
  
</body>
</html>