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
		<script src="{{URL::asset('assets/js/savephd.js')}}"></script>
		<script src="{{URL::asset('assets/js/preview.js')}}"></script>
		
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
	        <li><a href="/home">Home</a></li>
	        <li><a href="/ms">M.S. Admissions</a></li>
	        <li><a href="/contact">Contact</a></li>
	      </ul>
	      <ul class="side-nav" id="mobile-demo">
	       <li><a href="/home">Home</a></li>
	        <li><a href="/ms">M.S. Admissions</a></li>
	        <li><a href="/contact">Contact</a></li>
	      </ul>
	    </div>
	  </nav>

	 
		<div class="container main">
			<div class="row text-center">

				<div class="heading"></div>

				<div class="space-medium"></div>
				<div class="divider"></div><div class="divider"></div><br>
				<b>*Note:</b> Upload all the necessary files including your image and image of the signature right before the final submission.
			</div>
			<div class="space-medium"></div>
			

			{!! Form::open(array('url'=>'phdvalidate','method'=>'POST', 'files'=>true )) !!}	

			
			<input type="text" id="regNo" name="regNo" value="{!! $details->registrationNumber !!}" hidden="true"/>

			<div class="row">
				<div class="col l6 s12">
					<p class="large">*Bank Reference Number:</p>
					<input type="text" id="chalanNo" name="chalanNo" placeholder="Enter Chalan Number" value="{!! $details->chalanNo !!}" required />
				</div>
				<output id="list"></output>	
				<img src="" id="bannerImg" width="150" height="200"/>	
			</div>

	  		<div class="row">  					   
	  			<p class="large">*Application Category:</p>		    
			        
			      		
					    <div class="input-field col l6 s12 applCheck">
					        <select class="applicationCateg" name="appl_categ" required id="applicationCateg"> 
					        <option value="" disabled selected>Choose category</option>
					          <optgroup label="Part Time">
					            <option value="onCampus">On Campus</option>
					            <option value="External">External</option>
					          </optgroup>
					          <optgroup label="Full Time">
					            <option value="stipendiary">Stipendiary</option>
					            <option value="nonStipendiary">Non-Stipendiary</option>
					            <option value="Project">Project</option>
					      		<option value="Others">Other Fellowships</option>
					          </optgroup>
					        </select>
					      </div>

					      <div class="upload col l6 s12 ">

			    <p>*Upload Image:</p>

			      	<div class="file-field input-field">
			      		<div class="demo"></div>
			      		
		          		<div class="uploadImg btn teal darken-1 btn waves-effect waves-light">
		          			<span class="light">File</span>
		          			<input type="file" name="image_path" id="imaged", onchange="readURL(this);" required>		
		          		</div>
		          		<div class="file-path-wrapper">
	        				<input class="file-path validate" type="text">
	      				</div>
		          	</div>

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
			     		<input type="text" readonly="true" id="department1" name="department1" data-reg="{!! $details->dept1 !!}" />
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
			   		<input type="text" readonly="true" id="department2" name="department2" data-reg="{!! $details->dept2 !!}" />
			      	
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
			      		<input type="text" readonly="true" id="department3" name="department3" data-reg="{!! $details->dept3 !!}" />		     
			        </div>
			       <!--  <div class="input-field col s6 l6">
			        	<input type="text" value="dept" hidden="true" />
			        </div> -->
			      </div>     
			      <div class="space-small"></div>
			       <div class="row">
			        <div class="input-field col s6 l6">
			        	<span class="light">*Email Id:</span>
			        	          <input id="email" name="email" type="email" class="validate" required value="{!! $details->email !!}">
			        	          
			       	</div>
			        
			         <div class="input-field col l6 s6">
			         <span class="light">*Area of Research:</span>
			          <input required placeholder="Area of Research" id="area_of_research" type="text" class="validate" name="area_of_research" maxlength="50" value="{!! $details->areaOfResearch !!}">
			        </div>
			        </div>
			      <div class="row">
			        <div class="input-field col l6 s6">
			        	<span class="light">*Name:</span>
			      		<input required placeholder="Name of Candidate" id="name" type="text" class="validate" name="name" maxlength="32" value="{!! $details->name !!}">
			        </div>
			         <div class="input-field col l6  s6">
			         <span class="light">*Father's Name:</span>
			          <input required placeholder="Father's/Guardian Name" id="father_name" type="text" class="validate" name="father_name" maxlength="32" value="{!! $details->fatherName !!}">
			        </div>
			      </div>

			      <div class="row">
			        <div class="input-field col l6">
			        	<span class="light">*Date of Birth:</span>
			      		<input required id="dob" type="date" class="validate" name="dob" value="{!! $details->dob !!}">
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
			         	<!-- <input name="sex" id="sex" readonly="true" value="{!! $details->sex !!}" /> -->
			         	<select id="sex" name="sex" required="true">
			         		<option value="" disabled selected>Choose your Option</option>
			         		<option value="male">Male</option>
			         		<option value="female">Female</option>
			         	</select>
			      		
			        </div>
			         <div class="input-field col l6 statusCheck">
			         <span class="light">*Marital Status:</span><br>
			         
			         	<select required name="marital_status" id="marital_status">
					      <option value="" disabled selected>Choose your Marital Status</option>
					      <option value="married">Married</option>
					      <option value="single">Single</option>
					    </select>
			      </div> 
			      </div>

			      <div class="row">
			        <div class="input-field col l6 pdCheck">
			      		  <span class="light">*Person with Disability(P.W.D):</span><br>
			      
			         	<select required name="ph" id="ph">
					      <option value="" disabled selected>Choose your option</option>
					      <option value="yes">Yes</option>
					      <option value="no">No</option>
					    </select>
					
			        </div>
			         <div class="input-field col l6 ">

			         <span class="light">*Nationality:</span>
			          <input required placeholder="Nationality" id="nationality" type="text" class="validate" name="nationality" maxlength="32" value="{!! $details->nationality !!}">
			        </div>
			      </div>           

			       <div class="row">
			        <div class="input-field col l6"> 
			        	<span for="textarea1">*Address for Communication:</span><br>     		  
						<textarea required id="addr_for_commn" class="materialize-textarea" name="addr_for_commn" maxlength="200"></textarea>			          
			            <p>*Mobile Number:</p>
			            <input required id="mobile" type="number" min="7000000000" max="9999999999" class="validate" name="mobile" value="{!! $details->mobile !!}" />
			        </div>
			         <div class="input-field col l6 ">
			         <span for="textarea1">*Permanent Address:</span><br>
			         <textarea required id="permanent_addr" class="materialize-textarea" name="permanent_addr" maxlength="200" value="{!! $details->permanentaddr !!}"></textarea>			            
			            <p>Land-Line Number:</p>
			            <input id="landline" type="text" class="validate" name="landline" value="{!! $details->lanline !!}" />
			        </div>


			      </div> 

	  		<div class="row">
	  			<div class="col s12">
	  			<p class="vlarge">Undergraduate</p>
	  				 <div class="row">
			        <div class="input-field col l6">
			        	<span class="light">*Name of Degree:</span>
			      		<input required placeholder="Name of Degree" id="ug_deg" type="text" class="validate" name="ug_deg" maxlength="32" value="{!! $details->ugdegreeName !!}">
			        </div>
			         <div class="input-field col l6 ">
			         	<span class="light">*Branch Name:</span>
			         	<input required placeholder="Branch/Specialization" id="ug_branch" type="text" class="validate" name="ug_branch" maxlength="50" value="{!! $details->ugbranch !!}">
			        </div>
			      </div>

			      <div class="row">
			      	
			      	<div class="input-field col l6 ">
			      		<span class="light">*C.G.P.A/Percentage:</span>
			      		<input required placeholder="C.G.P.A" id="ug_gpa" type="number" class="validate ug_cgpa" name="ug_gpa" min="4" max="100" step="0.01" value="{!! $details->uggpa !!}" >
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
			      <p>
			      	<input type="checkbox" id="ra1" name="ra1" />
				      <label for="ra1">Click here if final semester results are not announced.</label>
			      </p>
			      </div>
			      </div>

			      <div class="row">
			      	<div class="input-field col l12 s12">
			      		<span class="light">*College Name:</span>
			      		<input required placeholder="College Name" id="ug_name_of_inst" type="text" class="validate" name="ug_name_of_inst" maxlength="50" value="{!! $details->uginstitutionName !!}">
			      	</div>

			      	<div class="input-field col l12 s12">
			      		<span class="light">*University Name:</span>
			      		<input required placeholder="University Name" id="ug_name_of_uni" type="text" class="validate" name="ug_name_of_uni" maxlength="50" value="{!! $details->uguniversityName !!}">
			      	</div>

			      	<div class="input-field col l4 s4">
			      		<span class="light">*Year of Passing:</span>
			      		<input required id="ug_yop" type="number" class="validate" name="ug_yop" min="1900" value="{!! $details->ugyop !!}">
			      	</div>
			      </div>

			      <div class="row">
	  			<div class="col s12">
	  			<p class="vlarge">Postgraduate</p>
	  				 <div class="row">
			        <div class="input-field col l6">
			        	<span class="light">*Name of Degree:</span>
			      		<input required placeholder="Name of Degree" id="pg_deg" type="text" class="validate" name="pg_deg" maxlength="50" value="{!! $details->pgdegreeName !!}">
			        </div>
			         <div class="input-field col l6 ">
			         	<span class="light">*Branch Name:</span>
			         	<input required placeholder="Branch/Specialization" id="pg_branch" type="text" class="validate" name="pg_branch" maxlength="50" value="{!! $details->pgbranch !!}">
			        </div>
			      </div>

			      <div class="row">
			      	
			      	<div class="input-field col l6">
			      		<span class="light">*C.G.P.A/Percentage:</span>
			      		<input required placeholder="C.G.P.A" id="pg_gpa" type="number" class="validate pg_cgpa" name="pg_gpa" min="4" max="100" step="0.01" value="{!! $details->pggpa !!}">
			      	</div>
			      	<div class="input-field col l6 pgclassCheck">
			      		<span class="light">*Class:</span>
			      		<select required name = "pg_class" id="pg_class">
					      <option value="" disabled selected>Choose your option</option>
					      <option  value="Honours">Honours</option>
					      <option  value="Distinction">Distinction</option>
					      <option  value="First">First</option>
					      <option  value="Second">Second</option>
					    </select>
			      	</div>
			      </div> 
			      <p>
				      <input type="checkbox" id="ra2" name="ra2" />
				      <label for="ra2">Click here if final semester results are not announced.</label>
				  </p>
			      </div>
			      </div>
			      <div class="row">
			      	<div class="input-field col l12 s12">
			      		<span class="light">*College Name:</span>
			      		<input required placeholder="College Name" id="pg_name_of_inst" type="text" class="validate" name="pg_name_of_inst" maxlength="50" value="{!! $details->pginstitutionName !!}">
			      	</div>

			      	<div class="input-field col l12 s12">
			      	<span class="light">*University Name:</span>
			      		<input required placeholder="University Name" id="pg_name_of_uni" type="text" class="validate" name="pg_name_of_uni" maxlength="50" value="{!! $details->pguniversityName !!}">
			      	</div>

			      	<div class="input-field col l4 s4">
			      		<span class="light">*Year of Passing</span>
			      		<input required id="pg_yop" type="number" class="validate" name="pg_yop" min="1900" value="{!! $details->pgyop !!}"> 
			      	</div>
			      </div>

			      <div class="row">
			      	<p class="vlarge">*Other Details:</p>
			      	<div class="space-small"></div>
			      	<div class="results_announced center">
			      		<p class="center">Qualified in GATE/NET/SLET/CSIR/CAT/UGC/NBHM</p>
			      		<span>
			      			<input type="checkbox" id="announced" name="ann" />
			      			<label for="announced">Yes</label>
			      		</span>
			      		
			      	</div>
			      	<div class="space-medium"></div>
					<div class="exams"></div>		      

			      	<div class="col l12 s12">
			      		<span class="light">*Title of P.G Project:</span>
			      		<input required placeholder="Title of P.G Project" id="title_of_project" type="text" class="validate" name="title_of_project" maxlength="100" value="{!! $details->pgproject !!}" >
			      	</div>
			      	<div class="col l4 s12">
			      		<p for="textarea1">Publications:</p><br>
			      		 <textarea id="details_of_pub1" placeholder="Enter Details here.." class="materialize-textarea" name="details_of_pub1" maxlength="200" value="{!! $details->publications1 !!}"></textarea>
			      	</div>
			      	<div class="col l4 s12">
			      		<p for="textarea1">Publications:</p><br>
			      		 <textarea id="details_of_pub2" placeholder="Enter Details here.." class="materialize-textarea" name="details_of_pub2" maxlength="200" value="{!! $details->publications2 !!}"></textarea>
			      	</div>
			      	<div class="col l4 s12">
			      		<p for="textarea1">Publications:</p><br>
			      		 <textarea id="details_of_pub3" placeholder="Enter Details here.." class="materialize-textarea" name="details_of_pub3" maxlength="200" value="{!! $details->publications3 !!}"></textarea>
			      	</div>
			      	<div class="col l4 s12">
			      		<p for="textarea1">Awards/ Prizes/Sports/NCC etc</p><br>
			      		 <textarea id="awards1" placeholder="Enter Details here.." class="materialize-textarea" name="awards1" maxlength="200" value="{!! $details->awards1 !!}"></textarea>
			      	</div>
			      	<div class="col l4 s12">
			      		<p for="textarea1">Awards/ Prizes/Sports/NCC etc</p><br>
			      		 <textarea id="awards2" placeholder="Enter Details here.." class="materialize-textarea" name="awards2" maxlength="200" value="{!! $details->awards2 !!}"></textarea>
			      	</div>
			      	<div class="col l4 s12">
			      		<p for="textarea1">Awards/ Prizes/Sports/NCC etc</p><br>
			      		 <textarea id="awards3" placeholder="Enter Details here.." class="materialize-textarea" name="awards3" maxlength="200" value="{!! $details->awards3 !!}"></textarea>
			      	</div>
			      </div>

			      <div class="row">
			      	<p class="vlarge">Details of Professional Experience</p>
			      	<p>*(In case of more than one employer fill the details,else fill N.A.)</p>
			      	<div class="space-small"></div>
			      	<div class="col s12 l12 emp_details">
			      		<p for="textarea1">Name & Address of Employer 1</p><br>
			      		 <textarea id="employer_details_1" placeholder="Enter Details here.." class="materialize-textarea" name="employer_details_1" value="{!! $details->proexp1 !!}"></textarea>

			      		 <p>Position Held:</p>
			      		 <input id="emp_pos_1" type="text" class="validate" name="emp_pos_1" maxlength="100" value="{!! $details->position1 !!}">

			      		 <div class="col l6 s6">
			      		 	<p>From:</p>
			      		 	<input id="emp_from_1" type="date" class="validate" name="emp_from_1" maxlength="100" value="{!! $details->from1 !!}">
			      		 </div>
			      		 <div class="col l6 s6">
			      		 	<p>To:</p>
			      		 	<input id="emp_to_1" type="date" class="validate" name="emp_to_1" maxlength="100" value="{!! $details->to1 !!}">
			      		 </div>
			      	</div>
			      	<div class="col s12 l12 emp_details">
			      		<p for="textarea1">Name & Address of Employer 2</p><br>
			      		 <textarea id="employer_details_2" placeholder="Enter Details here.." class="materialize-textarea" name="employer_details_2" value="{!! $details->proexp2 !!}"></textarea>

			      		 <p>Position Held:</p>
			      		 <input id="emp_pos_2" type="text" class="validate" name="emp_pos_2" maxlength="100" value="{!! $details->position2 !!}">

			      		 <div class="col l6 s6">
			      		 	<p>From:</p>
			      		 	<input id="emp_from_2" type="date" class="validate" name="emp_from_2" maxlength="100" value="{!! $details->from2 !!}">
			      		 </div>
			      		 <div class="col l6 s6">
			      		 	<p>To:</p>
			      		 	<input id="emp_to_2" type="date" class="validate" name="emp_to_2" maxlength="100" value="{!! $details->to2 !!}">
			      		 </div>
			      	</div>
			      	<div class="col s12 l12 emp_details">
			      		<p for="textarea1">Name & Address of Employer 3</p><br>
			      		 <textarea id="employer_details_3" placeholder="Enter Details here.." class="materialize-textarea" name="employer_details_3" value="{!! $details->proexp3 !!}"></textarea>

			      		 <p>Position Held:</p>
			      		 <input id="emp_pos_3" type="text" class="validate" name="emp_pos_3" maxlength="100" value="{!! $details->position3 !!}">

			      		 <div class="col l6 s6">
			      		 	<p>From:</p>
			      		 	<input id="emp_from_3" type="date" class="validate" name="emp_from_3" maxlength="100" value="{!! $details->from3 !!}">
			      		 </div>
			      		 <div class="col l6 s6">
			      		 	<p>To:</p>
			      		 	<input id="emp_to_3" type="date" class="validate" name="emp_to_3" maxlength="100" value="{!! $details->to3 !!}">
			      		 </div>
			      	</div>
			      </div>

			      <div class="row">
			      	<div class="col l12 s12 ">
			      		<p>I do hereby declare that the information furnished in this application are true and correct to the best of my knowledge. If, any of the particulars furnished above is found to be incorrect at the time of admission, the admission may be cancelled.</p>
			      		<p class="center agreement">
			      			<span>
			      		      <input type="checkbox" id="agree" class="check" required="true"/>
			      		      <label for="agree">Agree</label>
			      		    </span>
			      		    
			      		</p>
			      	</div>
			      </div>
			      <div class="space-medium"></div>
			      <div class="row">
			      	
			      	<div class="upload col l6 s6 ">
			      		<img src="" width="200" height="100" id="signImg"/>
			    <p>Upload Signature</p>
			      	<div class="file-field input-field">
		          		<div class="btn teal darken-1 btn waves-effect waves-light">
		          			<span class="light">File</span>
		          			<input type="file" id="signImg" name="sign" onchange="signURL(this);" required />
		          		</div>
		          		<div class="file-path-wrapper">
	        				<input class="file-path validate" type="text">
	      				</div>
		          	</div>
			      	<div class="space-medium"></div>			      	
			      </div>

			      
			      	<div class="col l12 s12">
			      	<p><b>Note:</b> The part time external Ph.D. applicant should attach the duly filled in Form-1 & Form-2, and Part-Time on campus applicant should attach the duly filled in Form-3. Otherwise, the application will be summarily rejected.</p>
			      	</div>
			      </div>
			      
					<div class="upload_container " >
			      
			      
			      </div>
			      
					<div class="space-medium"></div>
					<div class="row"> 
			     <p>(*) indicates that it's a required field.</p>     
	  			</div>

	  		<div class="center">
	      <a id="preview1" href="../../../phdpreview" target="_blank" class="teal darken-1 waves-effect waves-light btn modal-trigger">Preview Form</a>

	      
	   {!! Form::submit('Submit', array('class'=>'valid1 teal darken-1 send-btn btn waves-effect waves-light' )) !!}
	   <a id="save2" class="teal darken-1 send-btn btn waves-effect waves-light center">Save Form</a>
	   </div>
	   			
		 	
		      {!! Form::close() !!}
		      
		      </div>
		      </div>
		      


		       <div id="preview" class="modal">
	          

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
	            
	            <a class="grey-text text-lighten-4" href="#!">Made with &hearts; by Delta Force</a>
	            </div>
	          </div>
	        </footer>
	            

		<script type="text/javascript">
		function readURL(input) 
			{
			    document.getElementById("bannerImg").style.display = "block";

			    if (input.files && input.files[0]) {
			        var reader = new FileReader();

			        reader.onload = function (e) {
			            document.getElementById('bannerImg').src =  e.target.result;
			            bannerImage = document.getElementById('bannerImg');
						imgData = getBase64Image(bannerImage);
						localStorage.setItem("imgData", imgData);
			        }

			        reader.readAsDataURL(input.files[0]);
			    }
			}

		function signURL(input) 
			{
			    document.getElementById("signImg").style.display = "block";

			    if (input.files && input.files[0]) {
			        var reader = new FileReader();

			        reader.onload = function (e) {
			            document.getElementById('signImg').src =  e.target.result;
			            signImage = document.getElementById('signImg');
						signData = getBase64Image(signImage);
						localStorage.setItem("signData", signData);
			        }

			        reader.readAsDataURL(input.files[0]);
			    }
			}

			function getBase64Image(img) {
			    var canvas = document.createElement("canvas");
			    canvas.width = img.width;
			    canvas.height = img.height;

			    var ctx = canvas.getContext("2d");
			    ctx.drawImage(img, 0, 0);

			    var dataURL = canvas.toDataURL("image/png");

			    return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
			}
		$(document ).ready(function(){
			$(".button-collapse").sideNav();
			$('select').material_select();
			
			// function handleFileSelect(evt) {
			//     var files = evt.target.files; // FileList object
			//     console.log(files);
			//     // Loop through the FileList and render image files as thumbnails.
			//     for (var i = 0, f; f = files[i]; i++) {

			//       // Only process image files.
			//       if (!f.type.match('image.*')) {
			//         continue;
			//       }

			//       var reader = new FileReader();

			//       // Closure to capture the file information.
			//       reader.onload = (function(theFile) {
			//         return function(e) {
			//           // Render thumbnail.
			//           var span = document.createElement('span');
			//           span.innerHTML = ['<img class="thumb" src="', e.target.result,
			//                             '" title="', escape(theFile.name), '"/>'].join('');
			//           $('#list').empty();
			//           document.getElementById('list').insertBefore(span, null);
			//           localStorage.setItem('img', e.target.result);


			//         };
			//       })(f);

			//       // Read in the image file as a data URL.
			//       reader.readAsDataURL(f);
			//     }
			//   }

			  // document.getElementById('imaged').addEventListener('change', handleFileSelect, false);


			  // if(localStorage.img) { 
			  // 		console.log(localStorage.getItem('img'));
			  //        var span = document.createElement('span');
			  //         span.innerHTML = ['<img class="thumb" src="', localStorage.img,
			  //                           '" title="test"/>'].join('');

			  //         document.getElementById('list').insertBefore(span, null);
			  //         console.log('success');
			    
			  //   }


			    
			var x = new Date().getFullYear();
			console.log(x);
			var y = x+1;
			var p = '<h4 class="center">APPLICATION FOR ADMISSION TO Ph.D. PROGRAMME ('+ x + '-' + y + ')</h4>';
			$('.heading').append(p);

			$("textarea#addr_for_commn").val('{!! $details->addrforcomm !!}');
			$("textarea#permanent_addr").val('{!! $details->permanentaddr !!}');
			$("textarea#details_of_pub1").val('{!! $details->publications1 !!}');
			$("textarea#details_of_pub2").val('{!! $details->publications2 !!}');
			$("textarea#details_of_pub3").val('{!! $details->publications3 !!}');
			$("textarea#awards3").val('{!! $details->awards3 !!}');
			$("textarea#awards2").val('{!! $details->awards2 !!}');
			$("textarea#awards1").val('{!! $details->awards1 !!}');
			$("textarea#employer_details_1").val('{!! $details->proexp1 !!}');
			$("textarea#employer_details_2").val('{!! $details->proexp2 !!}');
			$("textarea#employer_details_3").val('{!! $details->proexp3 !!}');

			var t='{!! $details->sex !!}';
			if(t=='male'){
				$('.sexCheck .select-wrapper input').val(t);
				$('.sexCheck .select-wrapper ul>li:eq(1)').click();
			}
			else{
				$('.sexCheck .select-wrapper input').val(t);
				$('.sexCheck .select-wrapper ul>li:eq(2)').click();
			}

			t='{!! $details->applicationCategory !!}';
			if(t=='On Campus'){
				$('.applCheck .select-wrapper input').val(t);
				$('.applCheck .select-wrapper ul>li:eq(2)').click();
			}
			else if(t == 'External'){
				$('.applCheck .select-wrapper input').val(t);
				$('.applCheck .select-wrapper ul>li:eq(3)').click();
			}
			else if(t == 'Stipendiary'){
				$('.applCheck .select-wrapper input').val(t);
				$('.applCheck .select-wrapper ul>li:eq(4)').click();
			}
			else if(t == 'Non-Stipendiary'){
				$('.applCheck .select-wrapper input').val(t);
				$('.applCheck .select-wrapper ul>li:eq(6)').click();
			}
			else if(t == 'Project'){
				$('.applCheck .select-wrapper input').val(t);
				$('.applCheck .select-wrapper ul>li:eq(7)').click();
			}
			else if(t == 'Other Fellowships'){
				$('.applCheck .select-wrapper input').val(t);
				$('.applCheck .select-wrapper ul>li:eq(8)').click();
			}

			t='{!! $details->ugclass !!}';
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

			t='{!! $details->pgclass !!}';
			if(t=='Honours'){
				$('.pgclassCheck .select-wrapper input').val(t);
				$('.pgclassCheck .select-wrapper ul>li:eq(1)').click();
			}
			else if(t == 'Distinction'){
				$('.pgclassCheck .select-wrapper input').val(t);
				$('.pgclassCheck .select-wrapper ul>li:eq(2)').click();
			}
			else if(t=='First')
			{
				$('.pgclassCheck .select-wrapper input').val(t);
				$('.pgclassCheck .select-wrapper ul>li:eq(3)').click();
			}
			else if(t=='Second')
			{
				$('.pgclassCheck .select-wrapper input').val(t);
				$('.pgclassCheck .select-wrapper ul>li:eq(4)').click();
			}

			t='{!! $details->maritalStatus !!}';
			
			if(t=='single'){
				$('.statusCheck .select-wrapper input').val(t);
				$('.statusCheck .select-wrapper ul>li:eq(2)').click();
			}
			else{
				$('.statusCheck .select-wrapper input').val(t);
				$('.statusCheck .select-wrapper ul>li:eq(1)').click();
			}

			t='{!! $details->PH !!}';
			if(t=='no'){
				$('.pdCheck .select-wrapper input').val(t);
				$('.pdCheck .select-wrapper ul>li:eq(2)').click();
			}
			else{
				$('.pdCheck .select-wrapper input').val(t);
				$('.pdCheck .select-wrapper ul>li:eq(1)').click();
			}
			t='{!! $details->applicationCateg !!}';
			if(t!=''){
				$('.appCheck .select-wrapper input').val(t);	
			}
			
			$('.categCheck .select-wrapper ul>li:eq(1)').click();

			$('#department1').val(department('{!! $details->dept1 !!}'));
			$('#department2').val(department('{!! $details->dept2 !!}'));
			$('#department3').val(department('{!! $details->dept3 !!}'));




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
				if(t == 'HM'){
					return 'Humanities & Social Science';
				}
			}
		});
		</script>

	</body>
	</html>

	