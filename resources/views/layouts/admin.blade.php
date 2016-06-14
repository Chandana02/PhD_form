<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta id="token" name="csrf-token" content="{{ csrf_token() }}">
	<title>Admissions NITT | @yield('title')</title>
	<link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{URL::asset('assets/css/materialize.min.css')}}">
	<link rel="shortcut icon" href="{{URL::asset('assets/images/logo.png')}}"> 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="{{URL::asset('assets/js/jquery-2.1.1.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/materialize.min.js')}}"></script>

	@yield('headerIncludes')
	
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
  			<a href="#" details-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
  			<a href="#!" class="brand-logo right"></a>
	@yield('navbar')
	  	</div>
	</nav>
    	
	@yield('body')
	
	<div class="space-medium"></div>
	<footer class="page-footer teal darken-4">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Contact Us</h5>
					<p class="grey-text text-lighten-4">National Institute of Technology</p>
					<p class="grey-text text-lighten-4">Tiruchirappalli - 620015</p>
					<p class="grey-text text-lighten-4">Tamil Nadu, INDIA</p>
				</div>
				<div class="col l4  s12">
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
				
				<a class="grey-text text-lighten-4" href="#!">Made with &hearts; by Delta Force, NIT Trichy</a>
			</div>
		</div>
	</footer>
	
	<script type="text/javascript">
		$(document ).ready(function(){
			$(".button-collapse").sideNav();
			if("{!! Session::get('dept') !!}")
				$('.brand-logo').html("Welcome, " + department("{!! Session::get('dept') !!}")).css("font-size", "14px");
		function department(t)
        {
        	if(t == 'AR')
        	{
        		return 'Architecture';
        	}
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
        	if(t == 'CY')
        	{
        		return 'Chemistry';
        	}
        	if(t == 'CA')
        	{
        		return 'Computer Applications';
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
        	if(t == 'MME')
        	{
        		return 'Metalurgical and Materials Engineering';
        	}
        	if(t == 'MA')
        	{
        		return 'Mathematics';
        	}
        	if(t == 'MS')
        	{
        		return 'Management Studies';
        	}		
        	if(t == 'HM')
        	{
        		return 'Humanities and Social Sciences';
        	}
        	if(t == 'IC')
        	{
        		return 'Instrumentation and Control Engineering';
        	}
        	if(t == 'PH')
        	{
        		return 'Physics';
        	}
            if(t == 'all')
            {
                return 'Dean Academic';
            }
		}
	});
	</script>

	@yield('script')
	
</body>
</html>

