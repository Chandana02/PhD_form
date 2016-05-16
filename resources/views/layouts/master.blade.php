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
	<link rel="shortcut icon" href="{{URL::asset('assets/logo.jpg')}}"> 
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
			<ul class="hide-on-med-and-down">
				<li><a href="/">Home</a></li>
				<li><a href="/">Ph.D/M.S. Admissions</a></li>
				<li><a href="/contact">Contact</a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li><a href="/">Home</a></li>
				<li><a href="/">Ph.D/M.S. Admissions</a></li>
				<li><a href="/contact">Contact</a></li>
			</ul>
		</div>
	</nav>

	<div class="space-medium"></div>
	
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
		})
	</script>

	@yield('script')
	
</body>
</html>

