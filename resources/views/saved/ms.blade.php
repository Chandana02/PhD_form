@extends('layouts.master')

@section('title', 'M.S. Registration Form')

@section('headerIncludes')
	<script src="{{URL::asset('assets/js/preview.js')}}"></script>
	<script src="{{URL::asset('assets/js/common.js')}}"></script>
	<script src="{{URL::asset('assets/js/code_ms.js')}}"></script>
@endsection

@section('body')
  <div class="heading"></div>
	<div class="container main">

		<div class="row text-center">
			
			<div class="space-medium"></div>
			<div class="divider"></div><div class="divider"></div><br>
			<b>*Note:</b>1. Upload all the necessary files including your image and image of the signature right before the final submission.<br>
				2.Upload images size less than 300X200, signature less than 200X150 px.
		</div>
		<div class="space-medium"></div>
		<div class="row">

		{!! Form::open(array('url'=>'msvalidate','method'=>'POST', 'files'=>true )) !!}
		<input type="text" id="regNo" name="regNo" value="{!! $details->registrationNumber !!}" hidden="true"/>		
		<div class="row">
			<div class="col l6 s12">
				<span class="light">*Bank Reference Number:</span>
				<input type="text" id="chalanNo" name="chalanNo" placeholder="Enter Chalan Number" value="{!! $details->chalanNo !!}" required />
			</div>
			
			<img src="" id="bannerImg" />	
		</div>
  		<div class="row">  					   
  			
		        <div class="input-field col l6 s12 applCheck">
		        <span class="light">*Application Category:</span>		    
		      		<select required name="appl_categ" class="applicationCateg" id="applicationCateg">
				      <option value="" disabled selected>Choose Category</option>
				      <option value="Part Time">Part Time</option>
				      <option value="Full Time">Full Time</option>
				    </select>
		        </div>		        		    		    
		    <div class="col l6 s12">

		    <p>*Upload Passport size photo(200X300):</p>
		      	<div class="file-field input-field">
			      		<div class="demo"></div>
			      		
		          		<div class="uploadImg btn teal darken-1 btn waves-effect waves-light">
		          			<span class="light">File</span>
		          			<input type="file" name="image_path" id="imaged", onchange="readURL(this);">
		          		</div>
		          		<div class="file-path-wrapper">
	        				<input class="file-path validate" type="text">
	      				</div>
		          	</div>
		      </div>	
  		</div>
		<p class="vlarge">Applicant Details</p>
  		<div class="row">  			
		    <div class="col s12 l12">
		      <div class="row dept">
		
		        <div class="input-field col l6 s6 dep1Check">
		      		<!-- <select name="department1" id="department1">

		      			  <option value="" disabled selected>Department Preference 1</option>
                <option value="CS">Computer Science and Engineering</option>
                <option value="CL">Chemical Engineering</option>
                <option value="CV">Civil Engineering </option>
                <option value="CC">CECASE</option>
                <option value="EN">Department of Energy Engineering</option>
                <option value="EE">Electrical & Electronics Engineering</option>
                <option value="EC">Electronics & Communication Engineering</option>
                <option value="ME">Mechanical 
                Engineering</option>
                <option value="PR">Production Engineering</option
                <option value="IC">Instrumentation And Control Engineering</option>
                <option value="MME">Metalurgy and Material Sciences</option>
                <option value="PH">Physics</option>
		      		</select> -->
		      		<input type="hidden" readonly="true" id="department1" name="department1" value="{!! $details->dept1 !!}" />
		     		<input type="text" readonly="true" id="department1_disp" name="department1_disp" value="{!! $details->dept1 !!}" />
		      		
		        </div>
		        <div class="input-field col l6 s6 dep2Check">
		      		<!-- <select name="department2" id="department2">

		      			  <option value="" disabled selected>Department Preference 2</option>
                <option value="CS">Computer Science and Engineering</option>
                <option value="CL">Chemical Engineering</option>
                <option value="CV">Civil Engineering </option>
                <option value="CC">CECASE</option>
                <option value="EN">Department of Energy Engineering</option>
                <option value="EE">Electrical & Electronics Engineering</option>
                <option value="EC">Electronics & Communication Engineering</option>
                <option value="ME">Mechanical 
                Engineering</option>
                <option value="PR">Production Engineering</option
                <option value="IC">Instrumentation And Control Engineering</option>
                <option value="MME">Metalurgy and Material Sciences</option>
                <option value="PH">Physics</option>
		      		</select> -->
		      		<input type="hidden" readonly="true" id="department2" name="department2" value="{!! $details->dept2 !!}" />
			      	<input type="text" readonly="true" id="department2_disp" name="department2_disp" value="{!! $details->dept2 !!}" />
		      		
		        </div>
		        <div class="input-field col l6 s6 dep3Check">
		      		<!-- <select name="department3"  id="department3">

		      			 <option value="" disabled selected>Department Preference 3</option>
                <option value="CS">Computer Science and Engineering</option>
                <option value="CL">Chemical Engineering</option>
                <option value="CV">Civil Engineering </option>
                <option value="CC">CECASE</option>
                <option value="EN">Department of Energy Engineering</option>
                <option value="EE">Electrical & Electronics Engineering</option>
                <option value="EC">Electronics & Communication Engineering</option>
                <option value="ME">Mechanical 
                Engineering</option>
                <option value="PR">Production Engineering</option
                <option value="IC">Instrumentation And Control Engineering</option>
                <option value="MME">Metalurgy and Material Sciences</option>
                <option value="PH">Physics</option>
		      		</select> -->
		      		<input type="hidden" readonly="true" id="department3" name="department3" value="{!! $details->dept3 !!}" />
			      	<input type="text" readonly="true" id="department3_disp" name="department3_disp" value="{!! $details->dept3 !!}" />
		      		
		        </div>
		        
		        
		         
		        <div class="input-field col s6 l6">
		        	          <input id="email" name="email" type="email" class="validate" required value="{!! $details->email !!}">
		        	          <label for="last_name">*Email:</label>
		       	</div>
		        
		         <div class="input-field col l12 s12">
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
		         	<select required name="sex" id="sex">
				      <option value="" disabled selected>Choose your Gender</option>
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
		      		  <span class="light">*Person with Disability(PWD):</span><br>
		         	<select required name="ph" id="ph">
				      <option value="" disabled selected>Choose your option</option>
				      <option value="Yes">Yes</option>
				      <option value="No">No</option>
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
					<textarea required id="addr_for_commn" class="materialize-textarea" name="addr_for_commn" maxlength="200" value="{!! $details->addrforcomm !!}"></textarea>
		            

		            <p>*Mobile Number:</p>
		            <input required id="mobile" type="number" min="7000000000" max="9999999999" class="validate" name="mobile" value="{!! $details->mobile !!}"></input>
		        </div>
		         <div class="input-field col l6 ">
		         <span for="textarea1">*Permanent Address:</span><br>
		         <textarea required id="permanent_addr" class="materialize-textarea" name="permanent_addr" maxlength="200" value="{!! $details->permanentaddr !!}"></textarea>
		            

		            <p>Land-Line Number:</p>
		            <input id="landline" type="text" class="validate" name="landline" value="{!! $details->lanline !!}">
		        </div>


		      </div> 

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
		      <div class="results_announced center">
			      		<p class="center">Qualified in GATE?</p>
			      		<span>
			      			<input type="checkbox" id="announced" class="annn" name="ann" />
			      			<label for="announced">Yes</label>
			      		</span>
			      		
			      	</div>
			      	<div class="space-medium"></div>
			      	<div class="exams"></div>
		      <div class="space-large"></div>


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
		      	            <input required id="max1" type="number" class="validate" min="0" max="100" name="max1" value="{!! $details['gpamax1'] !!}">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa1" type="number" class="validate" min="0" max="100" name="gpa1" value="{!! $details['gpa1'] !!}" step="0.01">
		      	            </td>
		      	          </tr>
		      	          <tr>
		      	            <td>1</td>
		      	            <td>Second</td>
		      	            <td>
		      	            <input required id="max2" type="number" class="validate" name="max2" min="0" max="100" value="{!! $details['gpamax2'] !!}">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa2" type="number" class="validate" name="gpa2" min="0" max="100" value="{!! $details['gpa2'] !!}" step="0.01">
		      	            </td>
		      	          </tr>
		      	          <tr>
		      	            <td>2</td>
		      	            <td>Third</td>
		      	            <td>
		      	            <input required id="max3" type="number" class="validate" name="max3" min="0" max="100" value="{!! $details['gpamax3'] !!}">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa3" type="number" class="validate" name="gpa3" min="0" max="100" value="{!! $details['gpa3'] !!}" step="0.01">
		      	            </td>
		      	          </tr>
		      	          <tr>
		      	            <td>2</td>
		      	            <td>Fourth</td>
		      	            <td>
		      	            <input required id="max4" type="number" class="validate" name="max4" min="0" max="100" value="{!! $details['gpamax4'] !!}">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa4" type="number" class="validate" name="gpa4" min="0" max="100" value="{!! $details['gpa4'] !!}" step="0.01">
		      	            </td>
		      	          </tr>
		      	          <tr>
		      	            <td>3</td>
		      	            <td>Fifth</td>
		      	            <td>
		      	            <input required id="max5" type="number" class="validate" name="max5" min="0" max="100" value="{!! $details['gpamax5'] !!}">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa5" type="number" class="validate" name="gpa5" min="0" max="100" value="{!! $details['gpa5'] !!}" step="0.01">
		      	            </td>
		      	          </tr>
		      	          <tr>
		      	            <td>3</td>
		      	            <td>Sixth</td>
		      	            <td>
		      	            <input required id="max6" type="number" class="validate" name="max6" min="0" max="100" value="{!! $details['gpamax6'] !!}">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa6" type="number" class="validate" name="gpa6" min="0" max="100" value="{!! $details['gpa6'] !!}" step="0.01">
		      	            </td>
		      	          </tr>
		      	          <tr>
		      	            <td>4</td>
		      	            <td>Seventh</td>
		      	            <td>
		      	            <input required id="max7" type="number" class="validate" name="max7" min="0" max="100" value="{!! $details['gpamax7'] !!}">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa7" type="number" class="validate" name="gpa7" min="0" max="100" value="{!! $details['gpa7'] !!}" step="0.01">
		      	            </td>
		      	          </tr>
		      	          <tr>
		      	            <td>4</td>
		      	            <td>Eighth</td>
		      	            <td>
		      	            <input required id="max8" type="number" class="validate eight" name="max8" min="0" max="100" value="{!! $details['gpamax8'] !!}">
		      	            </td>
		      	            <td>
		      	            	<input required id="gpa8" type="number" class="validate eight" name="gpa8" min="0" max="100" value="{!! $details['gpa8'] !!}" step="0.01">
		      	            </td>
		      	          </tr>
		      	          
		      	        </tbody>
		      	      </table>
		      </div>
		      <p>
		      	<input type="checkbox" id="ra3" name="ra3" />
			      <label for="ra3">Click here if final semester results are not announced.</label>
		      </p>
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
		      		      <input type="checkbox" id="agree" name="agree" class="check" required="true"/>
		      		      <label for="agree">Agree</label>
		      		    </span>
		      		   
		      		</p>
		      	</div>
		      </div>
		      <div class="space-medium"></div>
		      <div class="row">
		      	<div class="upload col l6 s6 ">
			      		<img src="" id="signImg"/>
			    <p>Upload Signature</p>
			      	<div class="file-field input-field">
		          		<div class="btn teal darken-1 btn waves-effect waves-light">
		          			<span class="light">File</span>
		          			<input type="file" id="signImg" name="sign" onchange="signURL(this);"/>
		          		</div>
		          		<div class="file-path-wrapper">
	        				<input class="file-path validate" type="text">
	      				</div>
		          	</div>
			      	<div class="space-medium"></div>			      	
			      </div>
		      	
		      	<div class="space-medium"></div>

		      

			  </div>

		      <div class="row">
		      	<div class="col l12 s12">
		      	<p><b>Note:</b> The part time external Ph.D. applicant should attach the duly filled in Form-1 & Form-2, and Part-Time on campus applicant should attach the duly filled in Form-3. Otherwise, the application will be summarily rejected.</p>
		      	</div>
		      </div>

		      <div class="row">
		      		<div class="upload_container">
		      	
		      		</div>	
		      </div>
		      
		      <p>(*) indicates that it's a required field.</p> 
  		 <div class="center">
      <a id="preview2" href="../../../mspreview" target="_blank" class="teal darken-1 waves-effect waves-light btn modal-trigger">Preview Form</a>
      
   <button class="valid1 teal darken-1 send-btn btn waves-effect waves-light" type="submit">Submit</button>
   <a id="save2" class="teal darken-1 send-btn btn waves-effect waves-light center">Save Form</a>
   </div>
	 	
	      {!! Form::close() !!}
	      </div>
	      </div>
	      </div>
	      <div id="preview" class="modal">
          
        </div>
@endsection

@section('script')
	<script type="text/javascript">
	$(document).ready(function() {
		$('#save2').click(function(e) {
        	$("form").attr("action", "/save2ms").submit();
        	return;
    	});
    });
	function readURL(input) 
			{
			    document.getElementById("bannerImg").style.display = "block";

			    if (input.files && input.files[0]) {
			        var reader = new FileReader();

			        reader.onload = function (e) {
			            document.getElementById('bannerImg').src =  e.target.result;
			            bannerImage = document.getElementById('bannerImg');
			            if(bannerImg.height>300 || bannerImg.width>200){
			            	alert('Enter Image of size < 200*300');
			            	return ;
			            }
			            else{
						imgData = getBase64Image(bannerImage);
						localStorage.setItem("imgData", imgData);}
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
			            if(signImg.width>200 || signImg.height>150){
			            	alert('Enter Image of size < 200*300');
			            	return ;
			            }
			            else{
						signData = getBase64Image(signImage);
						localStorage.setItem("signData", signData);
					}
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

		// https://github.com/Dogfalo/materialize/issues/1861
		$("select[required]").css({display: "inline", height: 0, padding: 0, width: 0, position: "absolute"});
		$("#agree").css({visibility: 'visible', height: 1, position: 'relative', left: 0})

		// so that the select input that's made invisible above doesn't get focus on using tabstops,
        // creating inconsistencies potentially
		$('select').attr('tabindex', "-1");
		
		var a = '{!! $details->exam !!}';
		var b = '{!! $details->validity !!}';
		var c = '{!! $details->rank !!}';
		var d = '{!! $details->score !!}';
		var e = '{!! $details->discipline !!}';

		if(a=='' && b=='' && c=='' && d=='' && e==''){


		}
		else{
			$('.annn').click();
			if(a == 'GATE'){
				$('.examCheck .select-wrapper input').val(a);
				$('.examCheck .select-wrapper ul>li:eq(1)').click();
			}
			$("#rank").val(c);
			$("#score").val(d);
			$("#validity").val(b);
			$("#discipline").val(e);

		}

		var x = new Date().getFullYear();
		var y = x+1;
			console.log(x);
			var p = '<h4 class="center">APPLICATION FOR ADMISSION TO M.S.<br> PROGRAMME ('+ x + '-' + y + ')</h4>';
			$('.heading').append(p);

		$("textarea#addr_for_commn").val('{!! $details->addrforcomm !!}');
		$("textarea#permanent_addr").val('{!! $details->permanentaddr !!}');
		$("textarea#employer_details_1").val('{!! $details->proexp1 !!}');
		$("textarea#employer_details_2").val('{!! $details->proexp2 !!}');
		$("textarea#employer_details_3").val('{!! $details->proexp3 !!}');

			$('.annn').click(function()
			{
				if($('.exams').has('.add'))
					$('.add').remove();
				
				if($('.annn').is(':checked'))
					$('.exams').append('<div class="add">\
						<div class="col l3 s6"> \
							<span class="light">Examination:</span>\
								 <select id="exam" class="exam_select" required name="exam"> \
								 <option value="" selected>Choose your Exam</option> \
								 <option value="GATE">GATE</option> \
								 	 </select> \
								 	 </div> \
								 	 <div class="col l3 s6">\
								 	  <span class="light">Enter Score:</span> \
								 	  <input placeholder="Enter Score" id="score" type="number" class="validate" name="score" value="{!! $details->score !!}">\
								 	   </div> \
								 	   <div class="col l3 s6"> \
								 	   <span class="light">Enter Rank:</span> \
								 	   <input placeholder="Enter Rank" id="rank" type="number" class="validate" name="rank" max="1000000" min="0" value="{!! $details->rank !!}"> \
								 	   </div> \
								 	   <div class="col l3 s6"> \
								 	   <span class="light">Valid Till:</span> <input id="validity" type="date" class="validate" name="validity" max="2018" min="2010" value="{!! $details->validity !!}"> \
								 	   </div> \
								 	    <div class="col l12 s12"> \
								 	    <span class="light">Discipline:</span>\
								 	     <input type="text" id="discipline" class="validate" name="discipline" required  value="{!! $details->discipline !!}" />\
								 	      </div>\
								 	      <div class="space-small"></div>\
								 	      </div>');
			});

			var t='{!! $details->sex !!}';
			if(t=='Male'){
				$('.sexCheck .select-wrapper input').val(t);
				$('.sexCheck .select-wrapper ul>li:eq(1)').click();
			}
			else{
				$('.sexCheck .select-wrapper input').val(t);
				$('.sexCheck .select-wrapper ul>li:eq(2)').click();
			}

			t='{!! $details->applicationCategory !!}';
			if(t=='Part Time'){
				$('.applCheck .select-wrapper input').val(t);
				$('.applCheck .select-wrapper ul>li:eq(1)').click();
			}
			else if(t == 'Full Time'){
				$('.applCheck .select-wrapper input').val(t);
				$('.applCheck .select-wrapper ul>li:eq(2)').click();
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
			$('.categCheck .select-wrapper ul>li:eq(1)').click();
			$('#department1_disp').val(department('{!! $details->dept1 !!}'));
			$('#department2_disp').val(department('{!! $details->dept2 !!}'));
			$('#department3_disp').val(department('{!! $details->dept3 !!}'));

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
				if(t == 'IC')
				{
					return 'Instrumentation and Control Engineering';
				}
				if(t == 'MME')
				{
					return 'Metalurgy and Material Sciences';
				}
				if(t == 'PH')
				{
					return 'Physics';
				}		
			}
			
	});
	</script>
@endsection