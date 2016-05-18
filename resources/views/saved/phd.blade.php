@extends('layouts.master')

@section('title', 'Ph.D Registration Form')

@section('headerIncludes')
<script src="{{URL::asset('assets/js/common.js')}}"></script>
<script src="{{URL::asset('assets/js/preview.js')}}"></script>
@endsection

<?php
function escape_new_line($s) {
	$s = addslashes($s);
	$s = str_replace("\r", "\\r", $s);
	return str_replace("\n", "\\n", $s);
}
?>

@section('body')
<div class="container main">
	<div class="row text-center">

		<div class="heading"></div>

		<div class="space-medium"></div>
		<div class="divider"></div><div class="divider"></div><br>
		<b>*Note:</b>1. Upload all the necessary files including your image and image of the signature right before the final submission.<br>
		2.Upload images size less than 300X200, signature less than 200X150 px.
	</div>
	<div class="space-medium"></div>


	{!! Form::open(array('url'=>'phdvalidate','method'=>'POST', 'files'=>true )) !!}	


	<input type="text" id="regNo" name="regNo" value="{!! $details->registrationNumber !!}" hidden="true"/>

	<fieldset>
		<legend class="vlarge">Application Details</legend>
		<div class="row">
			<div class="input-field col l6 s12">
				<span class="light">*Bank Reference Number:</span>
				<input type="text" id="chalanNo" name="chalanNo" placeholder="Enter Chalan Number" value="{!! $details->chalanNo !!}" required />
			</div>
			<div class="input-field col l6 s12 applCheck">
				<span class="light">*Application Category:</span>
				<select class="applicationCateg validate" name="appl_categ" required id="applicationCateg"> 
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
		</div>

		<div class="row">
			<div class="input-field upload col l6 s12 ">
				<span class="light">*Upload Passport size photo(200X300):</span>

				<div class="file-field">
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
			<div class="col l6 s12">
				{{ 
					// ugly hack to declare variables and not put it in html :P

					($modifiedRegistrationNumber = str_replace('/', '-', $details->registrationNumber)) && 
					($photoExtension = explode(',', $details->imagePath)[0]) && 
					""
				}}
				@if ($photoExtension)
				<img src="/uploads/PHD/{!! $modifiedRegistrationNumber . '/photo.' . $photoExtension !!}" id="bannerImg" />
				@else
				<img src="" id="bannerImg" />
				@endif
			</div>
		</div>

		<div class="col s12 l12">
			<div class="row dept">
				<div class="input-field col l6 s6 dep1Check">
					<span class="light">*Department 1</span>
					<input type="hidden" readonly="true" id="department1" name="department1" value="{!! $details->dept1 !!}" />
					<input type="text" readonly="true" id="department1_disp" name="department1_disp" value="{!! $details->dept1 !!}" />
				</div>
				<div class="input-field col l6 s6 dep2Check">
					<span class="light">*Department 2</span>
					<input type="hidden" readonly="true" id="department2" name="department2" value="{!! $details->dept2 !!}" />
					<input type="text" readonly="true" id="department2_disp" name="department2_disp" value="{!! $details->dept2 !!}" />
				</div>
				<div class="input-field col s6 l6 dep3Check">
					<span class="light">*Department 3</span>
					<input type="hidden" readonly="true" id="department3" name="department3" value="{!! $details->dept3 !!}" />		     
					<input type="text" readonly="true" id="department3_disp" name="department3_disp" value="{!! $details->dept3 !!}" />
				</div>
				<div class="input-field col s6 l6">
					<span class="light">*Email Id:</span>
					<input id="email" name="email" type="email" class="validate" required value="{!! $details->email !!}">
				</div>

				<div class="input-field col l12 s12">
					<span class="light">*Area of Research:</span>
					<input required placeholder="Area of Research" id="area_of_research" type="text" class="validate" name="area_of_research" value="{!! $details->areaOfResearch !!}">
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend class="vlarge">Personal Details</legend>

		<div class="row">
			<div class="row">
				<div class="input-field col l6 s12">
					<span class="light">*Name:</span>
					<input required placeholder="Name of Candidate" id="name" type="text" class="validate" name="name" value="{!! $details->name !!}">
				</div>
				<div class="input-field col l6 s12">
					<span class="light">*Father's Name:</span>
					<input required placeholder="Father's/Guardian Name" id="father_name" type="text" class="validate" name="father_name" value="{!! $details->fatherName !!}">
				</div>
			</div>

			<div class="row">
				<div class="input-field col l6 s12">
					<span class="light">*Date of Birth:</span>
					<input required id="dob" type="text" class="validate" name="dob" value="{!! $details->dob !!}" readonly="true">
				</div>

				<div class="input-field col l6 s12 categCheck">
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
				<div class="input-field col l6 s12 pdCheck">
					<span class="light">*Person with Disability(PwD):</span><br>
					<select required name="ph" id="ph">
						<option value="" disabled selected>Choose your option</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</div>
				<div class="input-field col l6 s12">
					<span class="light">*Nationality:</span>
					<input required placeholder="Nationality" id="nationality" type="text" class="validate" name="nationality" maxlength="32" value="{!! $details->nationality !!}">
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend class="vlarge">Contact</legend>
		<div class="row">
			<div class="row">
				<div class="input-field col l6 s12"> 
					<span for="textarea1">*Address for Communication:</span><br>     		  
					<textarea required id="addr_for_commn" class="materialize-textarea" name="addr_for_commn" maxlength="200" value="{!! escape_new_line($details->addrforcomm) !!}"></textarea>
				</div>
				<div class="input-field col l6 s12">
					<span for="textarea1">*Permanent Address:</span><br>
					<textarea required id="permanent_addr" class="materialize-textarea" name="permanent_addr" maxlength="200" value="{!! escape_new_line($details->permanentaddr) !!}"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="input-field col l6 s12">
					<p>*Mobile Number:</p>
					<input required id="mobile" type="number" min="7000000000" max="9999999999" class="validate" name="mobile" value="{!! $details->mobile !!}" />
				</div>
				<div class="input-field col l6 s12">
					<p>Land-Line Number:</p>
					<input id="landline" type="text" class="validate" name="landline" value="{!! $details->lanline !!}" />
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend class="vlarge">Undergraduate Details</legend>
		<div class="row">
			<div class="row">
				<div class="col s12">
					<div class="row">
						<div class="input-field col l6">
							<span class="light">*Name of Degree:</span>
							<input required placeholder="Name of Degree" id="ug_deg" type="text" class="validate" name="ug_deg" value="{!! $details->ugdegreeName !!}">
						</div>
						<div class="input-field col l6 ">
							<span class="light">*Branch Name:</span>
							<input required placeholder="Branch/Specialization" id="ug_branch" type="text" class="validate" name="ug_branch" value="{!! $details->ugbranch !!}">
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
					<input required placeholder="College Name" id="ug_name_of_inst" type="text" class="validate" name="ug_name_of_inst" value="{!! escape_new_line($details->uginstitutionName) !!}">
				</div>

				<div class="input-field col l12 s12">
					<span class="light">*University Name:</span>
					<input required placeholder="University Name" id="ug_name_of_uni" type="text" class="validate" name="ug_name_of_uni" value="{!! escape_new_line($details->uguniversityName) !!}">
				</div>

				<div class="input-field col l4 s4">
					<span class="light">*Year of Passing:</span>
					<input required id="ug_yop" type="number" class="validate" name="ug_yop" min="1900" value="{!! $details->ugyop !!}">
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend class="vlarge">Postgraduate Details</legend>
		<div class="row">
			<div class="row">
				<div class="col s12">
					<div class="row">
						<div class="input-field col l6">
							<span class="light">*Name of Degree:</span>
							<input required placeholder="Name of Degree" id="pg_deg" type="text" class="validate" name="pg_deg" value="{!! $details->pgdegreeName !!}">
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
					<p style="text-align: center">
						<input type="checkbox" id="ra2" name="ra2" />
						<label for="ra2">Click here if final semester results are not announced.</label>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="input-field col l12 s12">
					<span class="light">*College Name:</span>
					<input required placeholder="College Name" id="pg_name_of_inst" type="text" class="validate" name="pg_name_of_inst" value="{!! escape_new_line($details->pginstitutionName) !!}">
				</div>

				<div class="input-field col l12 s12">
					<span class="light">*University Name:</span>
					<input required placeholder="University Name" id="pg_name_of_uni" type="text" class="validate" name="pg_name_of_uni" value="{!! escape_new_line($details->pguniversityName) !!}">
				</div>

				<div class="input-field col l4 s4">
					<span class="light">*Year of Passing</span>
					<input required id="pg_yop" type="number" class="validate" name="pg_yop" min="1900" value="{!! $details->pgyop !!}"> 
				</div>
			</div>

			<div class="divider"></div><br><br>

			<div class="col l12 s12">
				<span class="light">*Title of P.G Project:</span>
				<input required placeholder="Title of P.G Project" id="title_of_project" type="text" class="validate" name="title_of_project" value="{!! $details->pgproject !!}" >
			</div>
			<div class="col l4 s12 input-field">
				<p for="textarea1">Publications:</p><br>
				<textarea id="details_of_pub1" placeholder="Enter Details here.." class="materialize-textarea" name="details_of_pub1" value="{!! escape_new_line($details->publications1) !!}"></textarea>
			</div>
			<div class="col l4 s12 input-field">
				<p for="textarea1">Publications:</p><br>
				<textarea id="details_of_pub2" placeholder="Enter Details here.." class="materialize-textarea" name="details_of_pub2" value="{!! escape_new_line($details->publications2) !!}"></textarea>
			</div>
			<div class="col l4 s12 input-field">
				<p for="textarea1">Publications:</p><br>
				<textarea id="details_of_pub3" placeholder="Enter Details here.." class="materialize-textarea" name="details_of_pub3" value="{!! escape_new_line($details->publications3) !!}"></textarea>
			</div>
			<div class="col l4 s12 input-field">
				<p for="textarea1">Publications:</p><br>
				<textarea id="details_of_pub4" placeholder="Enter Details here.." class="materialize-textarea" name="details_of_pub4" value="{!! escape_new_line($details->publications4) !!}"></textarea>
			</div>
			<div class="col l4 s12 input-field">
				<p for="textarea1">Publications:</p><br>
				<textarea id="details_of_pub5" placeholder="Enter Details here.." class="materialize-textarea" name="details_of_pub5" value="{!! escape_new_line($details->publications5) !!}"></textarea>
			</div>
			<div class="col l4 s12 input-field">
				<p for="textarea1">Publications:</p><br>
				<textarea id="details_of_pub6" placeholder="Enter Details here.." class="materialize-textarea" name="details_of_pub6" value="{!! escape_new_line($details->publications6) !!}"></textarea>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend class="vlarge">Other Details</legend>
		<div class="row">
			<div class="row">
				<div class="results_announced center">
					<p class="center">Qualified in GATE/NET/SLET/CSIR/CAT/UGC/NBHM</p>
					<span>
						<input type="checkbox" id="announced" name="ann" class="annn" />
						<label for="announced">Yes</label>
					</span>
				</div>
				<div class="space-medium"></div>
				<div class="exams"></div>
				<div class="space-medium"></div>

				<div class="col l4 s12 input-field">
					<p for="textarea1">Awards/Prizes/Sports/NCC etc</p><br>
					<textarea id="awards1" placeholder="Enter Details here.." class="materialize-textarea" name="awards1" value="{!! escape_new_line($details->awards1) !!}"></textarea>
				</div>
				<div class="col l4 s12 input-field">
					<p for="textarea1">Awards/Prizes/Sports/NCC etc</p><br>
					<textarea id="awards2" placeholder="Enter Details here.." class="materialize-textarea" name="awards2" value="{!! escape_new_line($details->awards2) !!}"></textarea>
				</div>
				<div class="col l4 s12 input-field">
					<p for="textarea1">Awards/Prizes/Sports/NCC etc</p><br>
					<textarea id="awards3" placeholder="Enter Details here.." class="materialize-textarea" name="awards3" value="{!! escape_new_line($details->awards3) !!}"></textarea>
				</div>
				<div class="col l4 s12 input-field">
					<p for="textarea1">Awards/Prizes/Sports/NCC etc</p><br>
					<textarea id="awards4" placeholder="Enter Details here.." class="materialize-textarea" name="awards4" value="{!! escape_new_line($details->awards4) !!}"></textarea>
				</div>
				<div class="col l4 s12 input-field">
					<p for="textarea1">Awards/Prizes/Sports/NCC etc</p><br>
					<textarea id="awards5" placeholder="Enter Details here.." class="materialize-textarea" name="awards5" value="{!! escape_new_line($details->awards5) !!}"></textarea>
				</div>
				<div class="col l4 s12 input-field">
					<p for="textarea1">Awards/Prizes/Sports/NCC etc</p><br>
					<textarea id="awards6" placeholder="Enter Details here.." class="materialize-textarea" name="awards6" value="{!! escape_new_line($details->awards6) !!}"></textarea>
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend class="vlarge">Professional Experience</legend>
			<div class="row">
				<p style="text-align: center">
					<input type="checkbox" id="professional_experience" name="professional_experience" />
					<label for="professional_experience">Click here if have had some professional experience</label><br><br>
				</p>
				
				<div id="emp_details1" class="col s12 l12 emp_details input-field">
					<div class="col l12 s12">
						<span class="light">Name & Address of Employer 1 </span>
						<textarea id="employer_details_1" placeholder="Enter Details here.." class="materialize-textarea" name="employer_details_1" value="{!! escape_new_line($details->proexp1) !!}"></textarea>
					</div>

					<div class="col l4 s6">
						<span class="light">Position Held:</span>
						<input id="emp_pos_1" type="text" class="validate" name="emp_pos_1" value="{!! escape_new_line($details->position1) !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">From:</span>
						<input id="emp_from_1" type="date" class="validate" name="emp_from_1" value="{!! $details->from1 !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">To:</span>
						<input id="emp_to_1" type="date" class="validate" name="emp_to_1" value="{!! $details->to1 !!}">
					</div>
				</div>

				<div id="emp_details2" class="col s12 l12 emp_details input-field">
					<div class="col l12 s12">
						<span class="light">Name & Address of Employer 2</span>
						<textarea id="employer_details_2" placeholder="Enter Details here.." class="materialize-textarea" name="employer_details_2" value="{!! escape_new_line($details->proexp2) !!}"></textarea>
					</div>

					<div class="col l4 s6">
						<span class="light">Position Held:</span>
						<input id="emp_pos_2" type="text" class="validate" name="emp_pos_2" value="{!! escape_new_line($details->position2) !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">From:</span>
						<input id="emp_from_2" type="date" class="validate" name="emp_from_2" value="{!! $details->from2 !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">To:</span>
						<input id="emp_to_2" type="date" class="validate" name="emp_to_2" value="{!! $details->to2 !!}">
					</div>
				</div>

				<div id="emp_details3" class="col s12 l12 emp_details input-field">
					<div class="col l12 s12">
						<span class="light">Name & Address of Employer 3 </span>
						<textarea id="employer_details_3" placeholder="Enter Details here.." class="materialize-textarea" name="employer_details_3" value="{!! escape_new_line($details->proexp3) !!}"></textarea>
					</div>

					<div class="col l4 s6">
						<span class="light">Position Held:</span>
						<input id="emp_pos_3" type="text" class="validate" name="emp_pos_3" value="{!! escape_new_line($details->position3) !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">From:</span>
						<input id="emp_from_3" type="date" class="validate" name="emp_from_3" value="{!! $details->from3 !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">To:</span>
						<input id="emp_to_3" type="date" class="validate" name="emp_to_3" value="{!! $details->to3 !!}">
					</div>
				</div>

				<div id="emp_details4" class="col s12 l12 emp_details input-field">
					<div class="col l12 s12">
						<span class="light">Name & Address of Employer 4 </span>
						<textarea id="employer_details_4" placeholder="Enter Details here.." class="materialize-textarea" name="employer_details_4" value="{!! escape_new_line($details->proexp4) !!}"></textarea>
					</div>

					<div class="col l4 s6">
						<span class="light">Position Held:</span>
						<input id="emp_pos_4" type="text" class="validate" name="emp_pos_4" value="{!! escape_new_line($details->position4) !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">From:</span>
						<input id="emp_from_4" type="date" class="validate" name="emp_from_4" value="{!! $details->from4 !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">To:</span>
						<input id="emp_to_4" type="date" class="validate" name="emp_to_4" value="{!! $details->to4 !!}">
					</div>
				</div>

				<div id="emp_details5" class="col s12 l12 emp_details input-field">
					<div class="col l12 s12">
						<span class="light">Name & Address of Employer 5 </span>
						<textarea id="employer_details_5" placeholder="Enter Details here.." class="materialize-textarea" name="employer_details_5" value="{!! escape_new_line($details->proexp5) !!}"></textarea>
					</div>

					<div class="col l4 s6">
						<span class="light">Position Held:</span>
						<input id="emp_pos_5" type="text" class="validate" name="emp_pos_5" value="{!! escape_new_line($details->position5) !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">From:</span>
						<input id="emp_from_5" type="date" class="validate" name="emp_from_5" value="{!! $details->from5 !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">To:</span>
						<input id="emp_to_5" type="date" class="validate" name="emp_to_5" value="{!! $details->to5 !!}">
					</div>
				</div>

				<div id="emp_details6" class="col s12 l12 emp_details input-field">
					<div class="col l12 s12">
						<span class="light">Name & Address of Employer 6 </span>
						<textarea id="employer_details_6" placeholder="Enter Details here.." class="materialize-textarea" name="employer_details_6" value="{!! escape_new_line($details->proexp6) !!}"></textarea>
					</div>

					<div class="col l4 s6">
						<span class="light">Position Held:</span>
						<input id="emp_pos_6" type="text" class="validate" name="emp_pos_6" value="{!! escape_new_line($details->position6) !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">From:</span>
						<input id="emp_from_6" type="date" class="validate" name="emp_from_6" value="{!! $details->from6 !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">To:</span>
						<input id="emp_to_6" type="date" class="validate" name="emp_to_6" value="{!! $details->to6 !!}">
					</div>
				</div>

				<p style="text-align: center;">
					<button id="show_more" class="teal darken-1 btn waves-effect waves-light center">Show More</button>
					<button id="show_less" class="teal darken-1 btn waves-effect waves-light center">Show Less</button>
				</p>
			</div>
			</fieldset>

			<div class="row">
				<div class="col l12 s12 ">
					<p>I do hereby declare that the information furnished in this application are true and correct to the best of my knowledge. If, any of the particulars furnished above is found to be incorrect at the time of admission, the admission may be cancelled.</p>
					<p class="center agreement">
						<span>
							<input type="checkbox" name="agree" id="agree" class="check" required="true"/>
							<label for="agree">Agree</label>
						</span>

					</p>
				</div>
			</div>
			<div class="space-medium"></div>
			<div class="row">

				<div class="upload col l6 s6 ">
					{{ 
						// ugly hack to declare variables and not put it in html :P

						($modifiedRegistrationNumber = str_replace('/', '-', $details->registrationNumber)) && 
						($tmp = explode(',', $details->imagePath)) && 
						($signExtension = count($tmp) == 2 ? $tmp[1] : '') &&
						""
					}}
					@if ($signExtension)
					<img src="/uploads/PHD/{!! $modifiedRegistrationNumber . '/sign.' . $signExtension !!}" id="signImg" />
					@else
					<img src="" id="signImg" />
					@endif

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


			<button class="valid1 teal darken-1 send-btn btn waves-effect waves-light" type="submit">Submit</button>
			<button id="save2" class="teal darken-1 send-btn btn waves-effect waves-light center">Save Form</button>
		</div>


		{!! Form::close() !!}

	</div>
</div>



<div id="preview" class="modal">


</div>

@endsection

@section('script')
<script type="text/javascript">
	if('{!! $photoExtension !!}' == '')
	{
		localStorage.removeItem('imgData');	
	}
	if('{!! $signExtension !!}' == '')
	{
		localStorage.removeItem('signData');	
	}
	
	$(document).ready(function() {
		$('#save2').click(function(e) {
			$("form").attr("action", "/save2phd").submit();
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
				console.log(bannerImg.width);	
				if(bannerImg.height>300 || bannerImg.width>200){
					alert('Enter Image of size < 200*300');
					return ;
				}
				else{
					imgData = getBase64Image(bannerImage);
					localStorage.setItem("imgData", imgData);
				}
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
		console.log(canvas.width);
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

	        var a = '{!! escape_new_line($details->exam) !!}';
	        var b = '{!! escape_new_line($details->validity) !!}';
	        var c = '{!! escape_new_line($details->rank) !!}';
	        var d = '{!! escape_new_line($details->score) !!}';
	        var e = '{!! escape_new_line($details->discipline) !!}';
	        console.log(a,b,c,d,e);
	        if(a=='' && b=='' && c=='' && d=='' && e==''){

	        }
	        else{
	        	$('.annn').click();
	        	if(a == 'GATE'){
	        		$('.examCheck .select-wrapper input').val(a);
	        		$('.examCheck .select-wrapper ul>li:eq(1)').click();
	        	}
	        	else if(a == 'NET')
	        	{
	        		$('.examCheck .select-wrapper input').val(a);
	        		$('.examCheck .select-wrapper ul>li:eq(2)').click();
	        	}
	        	else if(a == 'SLET')
	        	{
	        		$('.examCheck .select-wrapper input').val(a);
	        		$('.examCheck .select-wrapper ul>li:eq(3)').click();
	        	}
	        	else if(a == 'CSIR')
	        	{
	        		$('.examCheck .select-wrapper input').val(a);
	        		$('.examCheck .select-wrapper ul>li:eq(4)').click();
	        	}
	        	else if(a == 'CAT')
	        	{
	        		$('.examCheck .select-wrapper input').val(a);
	        		$('.examCheck .select-wrapper ul>li:eq(5)').click();
	        	}
	        	else if(a == 'UGC')
	        	{
	        		$('.examCheck .select-wrapper input').val(a);
	        		$('.examCheck .select-wrapper ul>li:eq(6)').click();
	        	}
	        	$("#rank").val(c);
	        	$("#score").val(d);
	        	$("#validity").val(b);
	        	$("#discipline").val(e);
	        }

	        var x = new Date().getFullYear();
	        console.log(x);
	        var y = x+1;
	        var p = '<h4 class="center">APPLICATION FOR ADMISSION TO Ph.D.<br> PROGRAMME ('+ x + '-' + y + ')</h4>';
	        $('.heading').append(p);

	        $("textarea#addr_for_commn").val('{!! escape_new_line($details->addrforcomm) !!}');
	        $("textarea#permanent_addr").val('{!! escape_new_line($details->permanentaddr) !!}');
	        $("textarea#details_of_pub1").val('{!! escape_new_line($details->publications1) !!}');
	        $("textarea#details_of_pub2").val('{!! escape_new_line($details->publications2) !!}');
	        $("textarea#details_of_pub3").val('{!! escape_new_line($details->publications3) !!}');
	        $("textarea#awards3").val('{!! escape_new_line($details->awards3) !!}');
	        $("textarea#awards2").val('{!! escape_new_line($details->awards2) !!}');
	        $("textarea#awards1").val('{!! escape_new_line($details->awards1) !!}');
	        $("textarea#employer_details_1").val('{!! escape_new_line($details->proexp1) !!}');
	        $("textarea#employer_details_2").val('{!! escape_new_line($details->proexp2) !!}');
	        $("textarea#employer_details_3").val('{!! escape_new_line($details->proexp3) !!}');

	        var t='{!! $details->sex !!}';
	        if(t.toLowerCase()=='male'){
	        	$('.sexCheck .select-wrapper input').val(t);
	        	$('.sexCheck .select-wrapper ul>li:eq(1)').click();
	        }
	        else{
	        	$('.sexCheck .select-wrapper input').val(t);
	        	$('.sexCheck .select-wrapper ul>li:eq(2)').click();
	        }

	        t='{!! $details->applicationCategory !!}';
	        if(t=='onCampus'){
	        	$('.applCheck .select-wrapper input').val(t);
	        	$('.applCheck .select-wrapper ul>li:eq(2)').click();
	        }
	        else if(t == 'External'){
	        	$('.applCheck .select-wrapper input').val(t);
	        	$('.applCheck .select-wrapper ul>li:eq(3)').click();
	        }
	        else if(t == 'stipendiary'){
	        	$('.applCheck .select-wrapper input').val(t);
	        	$('.applCheck .select-wrapper ul>li:eq(4)').click();
	        }
	        else if(t == 'nonStipendiary'){
	        	$('.applCheck .select-wrapper input').val(t);
	        	$('.applCheck .select-wrapper ul>li:eq(6)').click();
	        }
	        else if(t == 'Project'){
	        	$('.applCheck .select-wrapper input').val(t);
	        	$('.applCheck .select-wrapper ul>li:eq(7)').click();
	        }
	        else if(t == 'Other'){
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

	        if(t.toLowerCase()=='single'){
	        	$('.statusCheck .select-wrapper input').val(t);
	        	$('.statusCheck .select-wrapper ul>li:eq(2)').click();
	        }
	        else{
	        	$('.statusCheck .select-wrapper input').val(t);
	        	$('.statusCheck .select-wrapper ul>li:eq(1)').click();
	        }

	        t='{!! $details->PH !!}';
	        if(t.toLowerCase()=='no'){
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

	        t = '{!! $details->category !!}';
	        $(".categCheck input").val(t);
	        if(t == "OBC")
	        	$(".categCheck ul>li:eq(1)").click();
	        else if(t == "OC")
	        	$(".categCheck ul>li:eq(2)").click();
	        else if(t == "SC")
	        	$(".categCheck ul>li:eq(3)").click();
	        else if(t == "ST")
	        	$(".categCheck ul>li:eq(4)").click();

	        $('#department1_disp').val(department('{!! $details->dept1 !!}'));
	        $('#department2_disp').val(department('{!! $details->dept2 !!}'));
	        $('#department3_disp').val(department('{!! $details->dept3 !!}'));

        var emps_shown = 0;

        function changeProfessionalExperience() {
        	if($("#professional_experience").prop('checked') == false) {
		        $(".emp_details").hide();
		        emps_shown = 0;
	        }
		    else {
		    	emps_shown = 1;
		    	$("#emp_details1").show();
		    	for(var i = 2; i < 7; i++) {
		    		if($("#emp_details" + i).val() != "") {
		    			$("#emp_details" + i).show();
		    			emps_shown++;
		    		}
		    		else
		    			break;
		    	}
		    }

		    if(emps_shown == 0)
		    	$("#show_less").prop('disabled', true);
		    else
		    	$("#show_less").prop('disabled', false);
		    if(emps_shown == 6)
		    	$("#show_more").prop('disabled', true);
		    else
		    	$("#show_more").prop('disabled', false);
		}

	    $("#show_more").click(function() {
	    	emps_shown++;
	    	if(emps_shown == 6)
	    		$(this).prop('disabled', true);
	    	$("#emp_details" + emps_shown).show('fast');
	    	$("#show_less").prop('disabled', false);
	    });

	    $("#show_less").click(function() {
	    	$("#emp_details" + emps_shown).hide('fast');
	    	emps_shown--;
	    	if(emps_shown == 0) {
	    		$(this).prop('disabled', true);
	    		$("#professional_experience").prop('checked', false);
	    	}
	    	$("#show_more").prop('disabled', false);
	    });

	    $("#professional_experience").on('change', changeProfessionalExperience);
	    changeProfessionalExperience();

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
	        	if(t == 'MS')
	        	{
	        		return 'Management Studies';
	        	}		
	        	if(t == 'HM'){
	        		return 'Humanities & Social Science';
	        	}
	        	if(t == 'IC'){
	        		return 'Instrumentation & Control';
	        	}
	        	if(t == 'PH'){
	        		return 'Physics';
	        	}

	        }
	    });
	</script>
	@endsection