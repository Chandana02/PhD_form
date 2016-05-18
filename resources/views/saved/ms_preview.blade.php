	<!DOCTYPE html>
	<html>
	<head>

		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">
		<title>Admissions NITT | Ph.d Registration Form</title>
		<link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/css/materialize.min.css')}}">
		<link rel="shortcut icon" href="{{URL::asset('assets/logo.jpg')}}"> 
		<!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
		<script src="{{URL::asset('assets/js/jquery-2.1.1.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/materialize.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/common.js')}}"></script>
		
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
	      
	    </div>
	  </nav>

	 
		<div class="container main">
			<div class="row text-center">
				<div class="heading"></div>
				<div class="space-medium"></div>
				<div class="divider"></div><div class="divider"></div><br>
				<b>*Note:</b>1. Upload all the necessary files including your image and image of the signature right before the final submission.<br>
				2.Upload images size less than 300X200, signature less than 200X150 px.
			</div>
			<div class="space-medium"></div>								
			<input type="text" id="regNo" name="regNo"  hidden="true"/>

			<div class="row">
				<div class="col l6 s12">
					<p class="large">*Bank Reference Number:</p>
					<input type="text" id="chalanNo" name="chalanNo"  required />
				</div>
				<div class="col l6">
					<img src="" id="tableBanner" />	
				</div>
			</div>

	  		<div class="row">  					   
	  			<p class="large">*Application Category:</p>		    
			        
			      		
					    <div class="input-field col l6 s12 applCheck">
					        

					        <input class="applicationCateg" name="appl_categ" id="applicationCateg" />

					      </div>

					      <div class="upload col l6 s12 ">

			    <!-- <p>*Upload Image:</p>
			      	<div class="file-field input-field">
			      		<div class="demo"></div>
			      		
		          		<div class="uploadImg btn teal darken-1 btn waves-effect waves-light">
		          			<span class="light">File</span>
		          			{!! Form::file('image_path' , array('class'=>'', 'required')) !!}			
		          		</div>
		          		<div class="file-path-wrapper">
	        				<input class="file-path validate" type="text">
	      				</div>
		          	</div> -->
			      </div>
			      

			        </div>		        		    		    
	  		
	  			<p class="vlarge">Applicant Details</p>
			    <div class="col s12">
			      <div class="row dept">
			        <div class="input-field col l6 s6 dep1Check">
			        	<!-- <select name="department1" id="department1">
	 						<option value="" disabled selected>Department 1</option>
			      			<option value="AR">Architecture</option>
			      			<option value="CS">Computer Science and Engineering</option>
			      			<option value="CL">Chemical Engineering</option>
			      			<option value="CV">Civil Engineering </option>
			      			<option value="CY">Chemistry </option>
			      			<option value="CA">Computer Applications </option>
			      			<option value="CC">CECASE</option>
			      			<option value="EN">Department of Energy Engineering</option>
			      			<option value="EC">Electronics & Communication Engineering</option>
			      			<option value="EE">Electrical & Electronics Engineering</option>		      			
			      			<option value="HM">Humanities & Social Science</option>
			      			<option value="ME">Mechanical Engineering</option>
			      			<option value="MA">Mathematics</option>			      			
			      			<option value="MME">Metalurgy and Material Engineering</option>
			      			<option value="PR">Production Engineering</option>
			     		</select> -->
			     		<input type="text" readonly="true" id="department1" name="department1"  />
			        </div>
			        <div class="input-field col l6 s6 dep2Check">
			        	<!-- <select name="department2" id="department2">
	 						<option value="" disabled selected>Department 2</option>
			      			<option value="AR">Architecture</option>
			      			<option value="CS">Computer Science and Engineering</option>
			      			<option value="CL">Chemical Engineering</option>
			      			<option value="CV">Civil Engineering </option>
			      			<option value="CY">Chemistry </option>
			      			<option value="CA">Computer Applications </option>
			      			<option value="CC">CECASE</option>
			      			<option value="EN">Department of Energy Engineering</option>
			      			<option value="EC">Electronics & Communication Engineering</option>
			      			<option value="EE">Electrical & Electronics Engineering</option>		      			
			      			<option value="HM">Humanities & Social Science</option>
			      			<option value="ME">Mechanical Engineering</option>
			      			<option value="MA">Mathematics</option>			      		
			      			<option value="MME">Metalurgy and Material Engineering</option>
			      			<option value="PR">Production Engineering</option>		      
			      		</select> -->
			   		<input type="text" readonly="true" id="department2" name="department2"  />
			      	
			        </div>
			        </div>
			        <div class="dept row">			        
			        <div class="input-field col s6 l6 dep3Check">
			        	<!-- <select name="department3" id="department3" >
	 						<option value="" disabled selected>Department 3</option>
			      			<option value="AR">Architecture</option>
			      			<option value="CS">Computer Science and Engineering</option>
			      			<option value="CL">Chemical Engineering</option>
			      			<option value="CV">Civil Engineering </option>
			      			<option value="CY">Chemistry </option>
			      			<option value="CA">Computer Applications </option>
			      			<option value="CC">CECASE</option>
			      			<option value="EN">Department of Energy Engineering</option>
			      			<option value="EC">Electronics & Communication Engineering</option>
			      			<option value="EE">Electrical & Electronics Engineering</option>		      			
			      			<option value="HM">Humanities & Social Science</option>
			      			<option value="ME">Mechanical Engineering</option>
			      			<option value="MA">Mathematics</option>
			      			<option value="MME">Metalurgy and Material Engineering</option>
			      			<option value="PR">Production Engineering</option>		      
			      		</select>	 -->
			      		<input type="text" readonly="true" id="department3" name="department3"  />		     
			        </div>
			       <!--  <div class="input-field col s6 l6">
			        	<input type="text" value="dept" hidden="true" />
			        </div> -->
			      </div>     
			      <div class="space-small"></div>
			       <div class="row">
			        <div class="input-field col s6 l6">
			        	<span class="light">*Email Id:</span>
			        	          <input id="email" name="email" type="email" class="validate" >
			        	          
			       	</div>
			        
			         <div class="input-field col l6 s6">
			         <span class="light">*Area of Research:</span>
			          <input required  id="area_of_research" type="text" class="validate" name="area_of_research" maxlength="50" >
			        </div>
			        </div>
			      <div class="row">
			        <div class="input-field col l6 s6">
			        	<span class="light">*Name:</span>
			      		<input required  id="name" type="text" class="validate" name="name" maxlength="32" >
			        </div>
			         <div class="input-field col l6  s6">
			         <span class="light">*Father's Name:</span>
			          <input required  id="father_name" type="text" class="validate" name="father_name" maxlength="32" >
			        </div>
			      </div>

			      <div class="row">
			        <div class="input-field col l6">
			        	<span class="light">*Date of Birth:</span>
			      		<input required id="dob" type="text" class="validate" name="dob" >
			        </div>

			         <div class="input-field col l6 categCheck">
			         <span class="light">*Category:</span><br>
			         
			         	<select required name="category" id="category">
					      <option value="" disabled selected>Choose your Category</option>
					      <option value="OBC">OBC</option>
					      <option value="OC">OC</option>
					      <option value="SC">SC</option>
					      <option value="ST">ST</option>
					    </select>
					
			        </div>
			      </div> 

			      <div class="row">
			        <div class="input-field col l6 sexCheck">
			      		<span class="light">*Sex:</span><br>
			         	
			         	<select id="sex" name="sex" required="true">
			         		<option value="" disabled selected>Choose your Option</option>
			         		<option value="Male">Male</option>
			         		<option value="Female">Female</option>
			         	</select>
			      		
			        </div>
			         <div class="input-field col l6 statusCheck">
			         <span class="light">*Marital Status:</span><br>
			         
			         	<select required name="marital_status" id="marital_status">
					      <option value="" disabled selected>Choose your Marital Status</option>
					      <option value="Married">Married</option>
					      <option value="single">Single</option>
					    </select>
			      </div> 
			      </div>

			      <div class="row">
			        <div class="input-field col l6 pdCheck">
			      		  <span class="light">*Person With Disability(PwD):</span><br>
			      
			         	<select required name="ph" id="ph">
					      <option value="" disabled selected>Choose your option</option>
					      <option value="Yes">Yes</option>
					      <option value="No">No</option>
					    </select>
					
			        </div>
			         <div class="input-field col l6 ">

			         <span class="light">*Nationality:</span>
			          <input required  id="nationality" type="text" class="validate" name="nationality" maxlength="32" >
			        </div>
			      </div>           

			       <div class="row">
			        <div class="input-field col l6"> 
			        	<span for="textarea1">*Address for Communication:</span><br>     		  
						<textarea required id="addr_for_commn" class="materialize-textarea" name="addr_for_commn" maxlength="200"></textarea>			          
			            <p>*Mobile Number:</p>
			            <input required id="mobile" type="number" min="7000000000" max="9999999999" class="validate" name="mobile"  />
			        </div>
			         <div class="input-field col l6 ">
			         <span for="textarea1">*Permanent Address:</span><br>
			         <textarea required id="permanent_addr" class="materialize-textarea" name="permanent_addr" maxlength="200" ></textarea>			            
			            <p>Land-Line Number:</p>
			            <input id="landline" type="text" class="validate" name="landline"  />
			        </div>


			      </div> 

	  		<div class="row">
	  			<div class="col s12">
	  			<p class="vlarge">Undergraduate</p>
	  				 <div class="row">
			        <div class="input-field col l6">
			        	<span class="light">*Name of Degree:</span>
			      		<input required  id="ug_deg" type="text" class="validate" name="ug_deg" maxlength="32" >
			        </div>
			         <div class="input-field col l6 ">
			         	<span class="light">*Branch Name:</span>
			         	<input required  id="ug_branch" type="text" class="validate" name="ug_branch" maxlength="50" >
			        </div>
			      </div>

			      <div class="row">
			      	
			      	<div class="input-field col l6 ">
			      		<span class="light">*C.G.P.A/Percentage:</span>
			      		<input required  id="ug_gpa" type="number" class="validate ug_cgpa" name="ug_gpa" min="4" max="100" step="0.01"  >
			      	</div>
			      	<div class="input-field col l6 ugclassCheck">
			      		<span class="light">*Class:</span>
			      		<select required name="ug_class" id="ug_class">
					      <option value="" disabled selected>Choose your option</option>
					      <option  value="Honours">Honours</option>
					      <option  value="Distinction">Distinction</option>
					      <option  value="First">First</option>
					      <option  value="Second">Second</option>
					    </select>
			      	</div>
			      </div> 
			      <!-- <p>
			      	<input type="checkbox" id="ra1" name="ra1" />
				      <label for="ra1">Click here if final semester results are not announced.</label>
			      </p> -->
			      </div>
			      </div>

			      <div class="row">
			      	<div class="input-field col l12 s12">
			      		<span class="light">*College Name:</span>
			      		<input required  id="ug_name_of_inst" type="text" class="validate" name="ug_name_of_inst" maxlength="50" >
			      	</div>

			      	<div class="input-field col l12 s12">
			      		<span class="light">*University Name:</span>
			      		<input required  id="ug_name_of_uni" type="text" class="validate" name="ug_name_of_uni" maxlength="50" >
			      	</div>

			      	<div class="input-field col l4 s4">
			      		<span class="light">*Year of Passing:</span>
			      		<input required id="ug_yop" type="number" class="validate" name="ug_yop" min="1900" >
			      	</div>
			      </div>

			      <div class="space-medium"></div>
					<div class="exams">
						<p class="vlarge">*Gate Details:</p>
						<div class="col l4">
							<span class="light">*Examination:</span>
							<input type="text" id="exam" name="exam" />
						</div>
						<div class="col l4">
						<span class="light">*Score:</span>
							<input type="text" id="score" name="score" min="-100" max="1000" />
						</div>
						<div class="col l4">
							<span class="light">*Rank:</span>
							<input type="text" id="rank" name="rank" min="1" max="99999" />
						</div>
						<div class="col l6">
							<span class="light">*Validity:</span>
							<input type="text" id="valid" name="validity" />
						</div>
						<div class="col l6">
							
							<span class="light">*Discipline:</span>
							<input type="text" id="discipline" name="discipline" />
						</div>
					</div>		      

			      	<div class="space-medium"></div>
			      <div class="row">
	  			<div class="row">
		      <p class="vlarge">*Academic Details:</p>
		      	<table class="highlight centered responsive-table">
		      	        <thead>
		      	          <tr>
		      	              <th details-field="id">Year</th>
		      	              <th details-field="name">Semester</th>
		      	              <th details-field="price">Maximum G.P.A</th>
		      	              <th details-field="price">G.P.A obtained</th>
		      	          </tr>
		      	        </thead>

		      	        <tbody>
		      	          <tr>
		      	            <td>1</td>
		      	            <td>First</td>
		      	            <td>
		      	            <input required id="max1" type="number" class="validate" min="0" max="100" name="max1">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa1" type="number" class="validate" min="0" max="100" name="gpa1" step="0.01">
		      	            </td>
		      	          </tr>
		      	          <tr>
		      	            <td>1</td>
		      	            <td>Second</td>
		      	            <td>
		      	            <input required id="max2" type="number" class="validate" name="max2" min="0" max="100">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa2" type="number" class="validate" name="gpa2" min="0" max="100" step="0.01">
		      	            </td>
		      	          </tr>
		      	          <tr>
		      	            <td>2</td>
		      	            <td>Third</td>
		      	            <td>
		      	            <input required id="max3" type="number" class="validate" name="max3" min="0" max="100">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa3" type="number" class="validate" name="gpa3" min="0" max="100" step="0.01">
		      	            </td>
		      	          </tr>
		      	          <tr>
		      	            <td>2</td>
		      	            <td>Fourth</td>
		      	            <td>
		      	            <input required id="max4" type="number" class="validate" name="max4" min="0" max="100">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa4" type="number" class="validate" name="gpa4" min="0" max="100" step="0.01">
		      	            </td>
		      	          </tr>
		      	          <tr>
		      	            <td>3</td>
		      	            <td>Fifth</td>
		      	            <td>
		      	            <input required id="max5" type="number" class="validate" name="max5" min="0" max="100">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa5" type="number" class="validate" name="gpa5" min="0" max="100" step="0.01">
		      	            </td>
		      	          </tr>
		      	          <tr>
		      	            <td>3</td>
		      	            <td>Sixth</td>
		      	            <td>
		      	            <input required id="max6" type="number" class="validate" name="max6" min="0" max="100">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa6" type="number" class="validate" name="gpa6" min="0" max="100" step="0.01">
		      	            </td>
		      	          </tr>
		      	          <tr>
		      	            <td>4</td>
		      	            <td>Seventh</td>
		      	            <td>
		      	            <input required id="max7" type="number" class="validate" name="max7" min="0" max="100">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa7" type="number" class="validate" name="gpa7" min="0" max="100" step="0.01">
		      	            </td>
		      	          </tr>
		      	          <tr>
		      	            <td>4</td>
		      	            <td>Eighth</td>
		      	            <td>
		      	            <input required id="max8" type="number" class="validate eight" name="max8" min="0" max="100">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa8" type="number" class="validate eight" name="gpa8" min="0" max="100" step="0.01">
		      	            </td>
		      	          </tr>
		      	          
		      	        </tbody>
		      	      </table>
		      </div>
		      <!-- <p>
		      	<input type="checkbox" id="ra3" name="ra3" />
			      <label for="ra3">Click here if final semester results are not announced.</label>
		      </p> -->

			      <div class="row">
			      	<p class="vlarge">Details of Professional Experience</p>
			      	<p>*(In case of more than one employer fill the details,else fill N.A.)</p>
			      	<div class="space-small"></div>
			      	<div class="col s12 l12 emp_details">
			      		<p for="textarea1">Name & Address of Employer 1</p><br>
			      		 <textarea id="employer_details_1"  class="materialize-textarea" name="employer_details_1"></textarea>

			      		 <p>Position Held:</p>
			      		 <input id="emp_pos_1" type="text" class="validate" name="emp_pos_1" maxlength="100" >

			      		 <div class="col l6 s6">
			      		 	<p>From:</p>
			      		 	<input id="emp_from_1" type="date" class="validate" name="emp_from_1" maxlength="100" >
			      		 </div>
			      		 <div class="col l6 s6">
			      		 	<p>To:</p>
			      		 	<input id="emp_to_1" type="date" class="validate" name="emp_to_1" maxlength="100" >
			      		 </div>
			      	</div>
			      	<div class="col s12 l12 emp_details">
			      		<p for="textarea1">Name & Address of Employer 2</p><br>
			      		 <textarea id="employer_details_2"  class="materialize-textarea" name="employer_details_2" ></textarea>

			      		 <p>Position Held:</p>
			      		 <input id="emp_pos_2" type="text" class="validate" name="emp_pos_2" maxlength="100" >

			      		 <div class="col l6 s6">
			      		 	<p>From:</p>
			      		 	<input id="emp_from_2" type="date" class="validate" name="emp_from_2" maxlength="100" >
			      		 </div>
			      		 <div class="col l6 s6">
			      		 	<p>To:</p>
			      		 	<input id="emp_to_2" type="date" class="validate" name="emp_to_2" maxlength="100" >
			      		 </div>
			      	</div>
			      	<div class="col s12 l12 emp_details">
			      		<p for="textarea1">Name & Address of Employer 3</p><br>
			      		 <textarea id="employer_details_3"  class="materialize-textarea" name="employer_details_3"></textarea>

			      		 <p>Position Held:</p>
			      		 <input id="emp_pos_3" type="text" class="validate" name="emp_pos_3" maxlength="100" >

			      		 <div class="col l6 s6">
			      		 	<p>From:</p>
			      		 	<input id="emp_from_3" type="date" class="validate" name="emp_from_3" maxlength="100">
			      		 </div>
			      		 <div class="col l6 s6">
			      		 	<p>To:</p>
			      		 	<input id="emp_to_3" type="date" class="validate" name="emp_to_3" maxlength="100" >
			      		 </div>
			      	</div>
			      </div>

			      <div class="right">

	        		<img src="" id="signBanner" />

	        		<p class="center">Signature</p>
	        	</div>
		      </div>
		      </div>
	        	
	        	

	<div class="space-large"></div>
	

		<script type="text/javascript">
		var dataImage = localStorage.getItem('imgData');
		bannerImg = document.getElementById('tableBanner');
		bannerImg.setAttribute('src', "data:image/jpeg;base64," + dataImage);

		var dataSign = localStorage.getItem('signData');
		bannerSign = document.getElementById('signBanner');
		bannerSign.setAttribute('src', "data:image/jpeg;base64," + dataSign);

		$(document ).ready(function(){
			// console.log(localStorage.getItem('img'));
			var a = JSON.parse(localStorage.getItem('data'));
			// console.log(a);

			var x = new Date().getFullYear();
			// console.log(x);
			var y = x+1;
			var p = '<h4 class="center">APPLICATION FOR ADMISSION TO M.S.<br> PROGRAMME ('+ x + '-' + y+ ')</h4>';
			$('.heading').append(p);
			$(".button-collapse").sideNav();
			$('select').material_select();
			$('.main').find('input, textarea, button, select').attr('disabled','disabled');
			$("textarea#addr_for_commn").val(a['addr_for_commn']);
			$("textarea#permanent_addr").val(a['permanent_addr']);
			
			$("textarea#employer_details_1").val(a['employer_details_1']);
			$("textarea#employer_details_2").val(a['employer_details_2']);
			$("textarea#employer_details_3").val(a['employer_details_3']);
			$('#chalanNo').val(a['chalan_no']);
			$('#applicationCateg').val(a['appl_categ']);
			$('#department1').val(a['department1']);
			$('#department2').val(a['department2']);
			$('#department3').val(a['department3']);
			$('#name').val(a['name']);
			$('#area_of_research').val(a['area_of_research']);
			$('#email').val(a['email']);
			$('#father_name').val(a['father_name']);
			$('#dob').val(a['dob']);
			$('#nationality').val(a['nationality']);
			$('#mobile').val(a['mobile']);
			$('#landline').val(a['landline']);
			$('#ug_deg').val(a['ug_deg']);
			$('#ug_branch').val(a['ug_branch']);
			$('#ug_gpa').val(a['ug_gpa']);
			$('#ug_yop').val(a['ug_yop']);
			$('#ug_name_of_inst').val(a['ug_name_of_inst']);
			$('#ug_name_of_uni').val(a['ug_name_of_uni']);
			$('#ug_class').val(a['ug_class']);
			
			$('#max1').val(a['max1']);
			$('#max2').val(a['max2']);
			$('#max3').val(a['max3']);
			$('#max4').val(a['max4']);
			$('#max5').val(a['max5']);
			$('#max6').val(a['max6']);
			$('#max7').val(a['max7']);
			$('#max8').val(a['max8']);
			$('#gpa1').val(a['gpa1']);
			$('#gpa2').val(a['gpa2']);
			$('#gpa3').val(a['gpa3']);
			$('#gpa4').val(a['gpa4']);
			$('#gpa5').val(a['gpa5']);
			$('#gpa6').val(a['gpa6']);
			$('#gpa7').val(a['gpa7']);
			$('#gpa8').val(a['gpa8']);

				$('#exam').val(a['exam']);
			$('#score').val(a['score']);
			$('#rank').val(a['rank']);
			$('#valid').val(a['validity']);
			$('#discipline').val(a['discipline']);

			$('#emp_pos_1').val(a['emp_pos_1']);
			$('#emp_pos_2').val(a['emp_pos_2']);
			$('#emp_pos_3').val(a['emp_pos_3']);
			$('#emp_to_1').val(a['emp_to_1']);
			$('#emp_to_2').val(a['emp_to_2']);
			$('#emp_to_3').val(a['emp_to_3']);
			$('#emp_from_1').val(a['emp_from_1']);
			$('#emp_from_2').val(a['emp_from_2']);
			$('#emp_from_3').val(a['emp_from_3']);


			var t=a['sex'];
			if(t=='Male'){
				$('.sexCheck .select-wrapper input').val(t);
				$('.sexCheck .select-wrapper ul>li:eq(1)').click();
			}
			else{
				$('.sexCheck .select-wrapper input').val(t);
				$('.sexCheck .select-wrapper ul>li:eq(2)').click();
			}

			t=a['ug_class'];
			if(t=='Honours'){
				$('.ugclassCheck .select-wrapper input').val(t);
				$('.ugclassCheck .select-wrapper ul>li:eq(1)').click();
			}
			else if(t == 'Distinction'){
				$('.ugclassCheck .select-wrapper input').val(t);
				$('.ugclassCheck .select-wrapper ul>li:eq(2)').click();
			}
			else if(t=='First')
			{
				$('.ugclassCheck .select-wrapper input').val(t);
				$('.ugclassCheck .select-wrapper ul>li:eq(3)').click();
			}
			else if(t=='Second')
			{
				$('.ugclassCheck .select-wrapper input').val(t);
				$('.ugclassCheck .select-wrapper ul>li:eq(4)').click();
			}

			t=a['category'];
			if(t=='OBC'){
				$('.categCheck .select-wrapper input').val(t);
				$('.categCheck .select-wrapper ul>li:eq(1)').click();
			}
			else if(t == 'OC'){
				$('.categCheck .select-wrapper input').val(t);
				$('.categCheck .select-wrapper ul>li:eq(2)').click();
			}
			else if(t=='SC')
			{
				$('.categCheck .select-wrapper input').val(t);
				$('.categCheck .select-wrapper ul>li:eq(3)').click();
			}
			else if(t=='ST')
			{
				$('.categCheck .select-wrapper input').val(t);
				$('.categCheck .select-wrapper ul>li:eq(4)').click();
			}

			t=a['marital_status'];
			
			if(t=='single'){
				$('.statusCheck .select-wrapper input').val(t);
				$('.statusCheck .select-wrapper ul>li:eq(2)').click();
			}
			else{
				$('.statusCheck .select-wrapper input').val(t);
				$('.statusCheck .select-wrapper ul>li:eq(1)').click();
			}

			t=a['ph'];
			if(t=='No'){
				$('.pdCheck .select-wrapper input').val(t);
				$('.pdCheck .select-wrapper ul>li:eq(2)').click();
			}
			else{
				$('.pdCheck .select-wrapper input').val(t);
				$('.pdCheck .select-wrapper ul>li:eq(1)').click();
			}
			t=a['applicationCateg'];
			if(t!=''){
				$('.appCheck .select-wrapper input').val(t);	
			}

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
					return 'Department of Energy Engineering';
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
					return 'Metalurgy and Material Sciences';
				}
				if(t == 'MA')
				{
					return 'Mathematics';
				}
				if(t == 'IC')
				{
					return 'Instrumentation & Control';
				}		
			}
		});
		</script>

	</body>
	</html>

	