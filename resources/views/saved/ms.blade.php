@extends('layouts.master')

@section('title', 'M.S. Registration Form')

@section('headerIncludes')
<script src="{{URL::asset('assets/js/preview.js')}}"></script>
<script src="{{URL::asset('assets/js/common.js')}}"></script>
<script src="{{URL::asset('assets/js/code_ms.js')}}"></script>
@endsection

<?php
function escape_new_line($s) {
	$s = addslashes($s);
	$s = str_replace("\r", "\\r", $s);
	return str_replace("\n", "\\n", $s);
}
?>

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
		<fieldset>
			<legend class="vlarge">Application Details</legend>
			<div class="row">
				<div class="col l6 s12 input-field">
					<span class="light">*Bank Reference Number:</span>
					<input type="text" id="chalanNo" name="chalanNo" placeholder="Enter Chalan Number" value="{!! $details->chalanNo !!}" required />
				</div>
				<div class="input-field col l6 s12 applCheck">
					<span class="light">*Application Category:</span>
					<select required name="appl_categ" class="applicationCateg" id="applicationCateg">
						<option value="" disabled selected>Choose Category</option>
						<option value="Part Time">Part Time</option>
						<option value="Full Time">Full Time</option>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="col l6 s12 input-field">
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
			      		<img src="/uploads/MS/{!! $modifiedRegistrationNumber . '/photo.' . $photoExtension !!}" id="bannerImg" />
			      	@else
			      		<img src="" id="bannerImg" />
			      	@endif
				</div>
			</div>
			<div class="row">
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
						<div class="input-field col l6 s6 dep3Check">
							<span class="light">*Department 3</span>
							<input type="hidden" readonly="true" id="department3" name="department3" value="{!! $details->dept3 !!}" />
							<input type="text" readonly="true" id="department3_disp" name="department3_disp" value="{!! $details->dept3 !!}" />
						</div>
						<div class="input-field col s6 l6">
							<span class="light">*Email</span>
							<input id="email" name="email" type="email" class="validate" required value="{!! $details->email !!}">
						</div>

						<div class="input-field col l12 s12">
							<span class="light">*Area of Research:</span>
							<input required placeholder="Area of Research" id="area_of_research" type="text" class="validate" name="area_of_research" maxlength="50" value="{!! $details->areaOfResearch !!}">
						</div>
					</div>
				</div>
			</div>
		</fieldset>

		<fieldset>
			<legend class="vlarge">Personal Details</legend>
			<div class="row">
				<div class="col s12 l12">
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
							<input required id="dob" type="text" class="validate" name="dob" value="{!! $details->dob !!}" readonly="true">
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
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend class="vlarge">Contact</legend>
			<div class="row">
				<div class="input-field col l6"> 
					<span for="textarea1">*Address for Communication:</span><br>
					<textarea required id="addr_for_commn" class="materialize-textarea" name="addr_for_commn" maxlength="200" value="{!! escape_new_line($details->addrforcomm) !!}"></textarea>
				</div>
				<div class="input-field col l6">
					<span for="textarea1">*Permanent Address:</span><br>
					<textarea required id="permanent_addr" class="materialize-textarea" name="permanent_addr" maxlength="200" value="{!! escape_new_line($details->permanentaddr) !!}"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="input-field col l6 ">
					<span>*Mobile Number:</span>
					<input required id="mobile" type="number" min="7000000000" max="9999999999" class="validate" name="mobile" value="{!! $details->mobile !!}"></input>
				</div>
				<div class="input-field col l6">
					<span>Land-Line Number:</span>
					<input id="landline" type="text" class="validate" name="landline" value="{!! $details->lanline !!}">
				</div>
			</div>
		</fieldset>

		<fieldset>
			<legend class="vlarge">Undergraduate Details</legend>
			<div class="row">
				<div class="col s12">
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
					<input required placeholder="College Name" id="ug_name_of_inst" type="text" class="validate" name="ug_name_of_inst" maxlength="50" value="{!! escape_new_line($details->uginstitutionName) !!}">
				</div>

				<div class="input-field col l12 s12">
					<span class="light">*University Name:</span>
					<input required placeholder="University Name" id="ug_name_of_uni" type="text" class="validate" name="ug_name_of_uni" maxlength="50" value="{!! escape_new_line($details->uguniversityName) !!}">
				</div>

				<div class="input-field col l4 s4">
					<span class="light">*Year of Passing:</span>
					<input required id="ug_yop" type="number" class="validate" name="ug_yop" min="1900" value="{!! $details->ugyop !!}">
				</div>
			</div>

			<div class="divider"></div><br><br>

			<div class="row">
				<h4 align="center">Results</h4>
				<p style="text-align: center">
					<input type="checkbox" id="yearly_results" name="yearly_results" />
					<label for="yearly_results">Click here if your results are given on an yearly basis.</label><br><br>
				</p>
				<table id="ug_results_table" class="highlight centered responsive-table">
					<thead>
						<tr>
							<th details-field="id">Year</th>
							<th details-field="name">Semester</th>
							<th details-field="price">Maximum G.P.A/Marks</th>
							<th details-field="price">G.P.A/Marks obtained</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>1</td>
							<td>First</td>
							<td>
								<input required id="max1" type="number" class="validate" min="0" max="1000" name="max1" value="{!! $details['gpamax1'] !!}">
							</td>
							<td>
								<input required id="gpa1" type="number" class="validate" min="0" max="1000" name="gpa1" value="{!! $details['gpa1'] !!}" step="0.01">
							</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Second</td>
							<td>
								<input required id="max2" type="number" class="validate" name="max2" min="0" max="1000" value="{!! $details['gpamax2'] !!}">
							</td>
							<td>
								<input required id="gpa2" type="number" class="validate" name="gpa2" min="0" max="1000" value="{!! $details['gpa2'] !!}" step="0.01">
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Third</td>
							<td>
								<input required id="max3" type="number" class="validate" name="max3" min="0" max="1000" value="{!! $details['gpamax3'] !!}">
							</td>
							<td>
								<input required id="gpa3" type="number" class="validate" name="gpa3" min="0" max="1000" value="{!! $details['gpa3'] !!}" step="0.01">
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Fourth</td>
							<td>
								<input required id="max4" type="number" class="validate" name="max4" min="0" max="1000" value="{!! $details['gpamax4'] !!}">
							</td>
							<td>
								<input required id="gpa4" type="number" class="validate" name="gpa4" min="0" max="1000" value="{!! $details['gpa4'] !!}" step="0.01">
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Fifth</td>
							<td>
								<input required id="max5" type="number" class="validate" name="max5" min="0" max="1000" value="{!! $details['gpamax5'] !!}">
							</td>
							<td>
								<input required id="gpa5" type="number" class="validate" name="gpa5" min="0" max="1000" value="{!! $details['gpa5'] !!}" step="0.01">
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Sixth</td>
							<td>
								<input required id="max6" type="number" class="validate" name="max6" min="0" max="1000" value="{!! $details['gpamax6'] !!}">
							</td>
							<td>
								<input required id="gpa6" type="number" class="validate" name="gpa6" min="0" max="1000" value="{!! $details['gpa6'] !!}" step="0.01">
							</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Seventh</td>
							<td>
								<input required id="max7" type="number" class="validate" name="max7" min="0" max="1000" value="{!! $details['gpamax7'] !!}">
							</td>
							<td>
								<input required id="gpa7" type="number" class="validate" name="gpa7" min="0" max="1000" value="{!! $details['gpa7'] !!}" step="0.01">
							</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Eighth</td>
							<td>
								<input required id="max8" type="number" class="validate eight" name="max8" min="0" max="1000" value="{!! $details['gpamax8'] !!}">
							</td>
							<td>
								<input required id="gpa8" type="number" class="validate eight" name="gpa8" min="0" max="1000" value="{!! $details['gpa8'] !!}" step="0.01">
							</td>
						</tr>

					</tbody>
				</table>
			</div>
			<p style="text-align:center">
				<input type="checkbox" id="ra3" name="ra3" />
				<label for="ra3">Click here if final semester/year results are not announced.</label>
			</p><br>
		</fieldset>

		<fieldset>
			<legend class="vlarge">GATE</legend>
			<div class="results_announced center">
				<p class="center">Did you qualify in GATE?</p>
				<span>
					<input type="checkbox" id="announced" class="annn" name="ann" />
					<label for="announced">Yes</label>
				</span>
			</div>
			<div class="space-medium"></div>
			<div class="exams"></div>
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
						<input id="emp_pos_1" type="text" class="validate" name="emp_pos_1" maxlength="100" value="{!! escape_new_line($details->position1) !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">From:</span>
						<input id="emp_from_1" type="date" class="validate" name="emp_from_1" maxlength="100" value="{!! $details->from1 !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">To:</span>
						<input id="emp_to_1" type="date" class="validate" name="emp_to_1" maxlength="100" value="{!! $details->to1 !!}">
					</div>
				</div>

				<div id="emp_details2" class="col s12 l12 emp_details input-field">
					<div class="col l12 s12">
						<span class="light">Name & Address of Employer 2</span>
						<textarea id="employer_details_2" placeholder="Enter Details here.." class="materialize-textarea" name="employer_details_2" value="{!! escape_new_line($details->proexp2) !!}"></textarea>
					</div>

					<div class="col l4 s6">
						<span class="light">Position Held:</span>
						<input id="emp_pos_2" type="text" class="validate" name="emp_pos_2" maxlength="100" value="{!! escape_new_line($details->position2) !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">From:</span>
						<input id="emp_from_2" type="date" class="validate" name="emp_from_2" maxlength="100" value="{!! $details->from2 !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">To:</span>
						<input id="emp_to_2" type="date" class="validate" name="emp_to_2" maxlength="100" value="{!! $details->to2 !!}">
					</div>
				</div>

				<div id="emp_details3" class="col s12 l12 emp_details input-field">
					<div class="col l12 s12">
						<span class="light">Name & Address of Employer 3 </span>
						<textarea id="employer_details_3" placeholder="Enter Details here.." class="materialize-textarea" name="employer_details_3" value="{!! escape_new_line($details->proexp3) !!}"></textarea>
					</div>

					<div class="col l4 s6">
						<span class="light">Position Held:</span>
						<input id="emp_pos_3" type="text" class="validate" name="emp_pos_3" maxlength="100" value="{!! escape_new_line($details->position3) !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">From:</span>
						<input id="emp_from_3" type="date" class="validate" name="emp_from_3" maxlength="100" value="{!! $details->from3 !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">To:</span>
						<input id="emp_to_3" type="date" class="validate" name="emp_to_3" maxlength="100" value="{!! $details->to3 !!}">
					</div>
				</div>

				<div id="emp_details4" class="col s12 l12 emp_details input-field">
					<div class="col l12 s12">
						<span class="light">Name & Address of Employer 4 </span>
						<textarea id="employer_details_4" placeholder="Enter Details here.." class="materialize-textarea" name="employer_details_4" value="{!! escape_new_line($details->proexp4) !!}"></textarea>
					</div>

					<div class="col l4 s6">
						<span class="light">Position Held:</span>
						<input id="emp_pos_4" type="text" class="validate" name="emp_pos_4" maxlength="100" value="{!! escape_new_line($details->position4) !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">From:</span>
						<input id="emp_from_4" type="date" class="validate" name="emp_from_4" maxlength="100" value="{!! $details->from4 !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">To:</span>
						<input id="emp_to_4" type="date" class="validate" name="emp_to_4" maxlength="100" value="{!! $details->to4 !!}">
					</div>
				</div>

				<div id="emp_details5" class="col s12 l12 emp_details input-field">
					<div class="col l12 s12">
						<span class="light">Name & Address of Employer 5 </span>
						<textarea id="employer_details_5" placeholder="Enter Details here.." class="materialize-textarea" name="employer_details_5" value="{!! escape_new_line($details->proexp5) !!}"></textarea>
					</div>

					<div class="col l4 s6">
						<span class="light">Position Held:</span>
						<input id="emp_pos_5" type="text" class="validate" name="emp_pos_5" maxlength="100" value="{!! escape_new_line($details->position5) !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">From:</span>
						<input id="emp_from_5" type="date" class="validate" name="emp_from_5" maxlength="100" value="{!! $details->from5 !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">To:</span>
						<input id="emp_to_5" type="date" class="validate" name="emp_to_5" maxlength="100" value="{!! $details->to5 !!}">
					</div>
				</div>

				<div id="emp_details6" class="col s12 l12 emp_details input-field">
					<div class="col l12 s12">
						<span class="light">Name & Address of Employer 6 </span>
						<textarea id="employer_details_6" placeholder="Enter Details here.." class="materialize-textarea" name="employer_details_6" value="{!! escape_new_line($details->proexp6) !!}"></textarea>
					</div>

					<div class="col l4 s6">
						<span class="light">Position Held:</span>
						<input id="emp_pos_6" type="text" class="validate" name="emp_pos_6" maxlength="100" value="{!! escape_new_line($details->position6) !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">From:</span>
						<input id="emp_from_6" type="date" class="validate" name="emp_from_6" maxlength="100" value="{!! $details->from6 !!}">
					</div>
					<div class="col l4 s3">
						<span class="light">To:</span>
						<input id="emp_to_6" type="date" class="validate" name="emp_to_6" maxlength="100" value="{!! $details->to6 !!}">
					</div>
				</div>

				<p style="text-align: center;">
					<button id="show_more" class="teal darken-1 btn waves-effect waves-light center">Show More</button>
					<button id="show_less" class="teal darken-1 btn waves-effect waves-light center">Show Less</button>
				</p>
			</div>
		</fieldset>

		<div class="row center">
			<div class="upload_container">
				<span class="light">Sponsorship Certificate: </span>
				<input type="file" name="form1"/><br>
			</div>	
		</div>
		<br>

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
				{{ 
					// ugly hack to declare variables and not put it in html :P

					($modifiedRegistrationNumber = str_replace('/', '-', $details->registrationNumber)) && 
					($tmp = explode(',', $details->imagePath)) && 
					($signExtension = count($tmp) == 2 ? $tmp[1] : '') &&
					""
				}}
				@if ($signExtension)
				<img src="/uploads/MS/{!! $modifiedRegistrationNumber . '/sign.' . $signExtension !!}" id="signImg" />
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
			<div class="space-medium"></div>
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
	var bannerImage = document.getElementById('bannerImg');
	imgData = getBase64Image(bannerImage);
	localStorage.setItem("imgData", imgData);

	var signImage = document.getElementById('signImg');
	signData = getBase64Image(signImage);
	localStorage.setItem("signData", signData);
	
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

        var a = '{!! escape_new_line($details->exam); !!}';
        var b = '{!! escape_new_line($details->validity); !!}';
        var c = '{!! escape_new_line($details->rank); !!}';
        var d = '{!! escape_new_line($details->score); !!}';
        var e = '{!! escape_new_line($details->discipline); !!}';

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

        $("textarea#addr_for_commn").val('{!! escape_new_line($details->addrforcomm) !!}');
        $("textarea#permanent_addr").val('{!! escape_new_line($details->permanentaddr) !!}');
        $("textarea#employer_details_1").val('{!! escape_new_line($details->proexp1) !!}');
        $("textarea#employer_details_2").val('{!! escape_new_line($details->proexp2) !!}');
        $("textarea#employer_details_3").val('{!! escape_new_line($details->proexp3) !!}');
        $("textarea#employer_details_4").val('{!! escape_new_line($details->proexp4) !!}');
        $("textarea#employer_details_5").val('{!! escape_new_line($details->proexp5) !!}');
        $("textarea#employer_details_6").val('{!! escape_new_line($details->proexp6) !!}');

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
        if(t.toLowerCase() =='male'){
        	$('.sexCheck .select-wrapper input').val(t);
        	$('.sexCheck .select-wrapper ul>li:eq(1)').click();
        }
        else{
        	$('.sexCheck .select-wrapper input').val(t);
        	$('.sexCheck .select-wrapper ul>li:eq(2)').click();
        }

        t='{!! $details->applicationCategory !!}';
        if(t.toLowerCase() =='part time'){
        	$('.applCheck .select-wrapper input').val(t);
        	$('.applCheck .select-wrapper ul>li:eq(1)').click();
        }
        else if(t.toLowerCase() == 'full time'){
        	$('.applCheck .select-wrapper input').val(t);
        	$('.applCheck .select-wrapper ul>li:eq(2)').click();
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

        t='{!! $details->ugclass !!}';
        if(t.toLowerCase()=='honours'){
        	$('.ugclassCheck .select-wrapper input').val(t);
        	$('.ugclassCheck .select-wrapper ul>li:eq(1)').click();
        }
        else if(t.toLowerCase() == 'distinction'){
        	$('.ugclassCheck .select-wrapper input').val(t);
        	$('.ugclassCheck .select-wrapper ul>li:eq(2)').click();
        }
        else if(t.toLowerCase()=='first')
        {
        	$('.ugclassCheck .select-wrapper input').val(t);
        	$('.ugclassCheck .select-wrapper ul>li:eq(3)').click();
        }
        else if(t.toLowerCase() =='second')
        {
        	$('.ugclassCheck .select-wrapper input').val(t);
        	$('.ugclassCheck .select-wrapper ul>li:eq(4)').click();
        }
        $('.categCheck .select-wrapper ul>li:eq(1)').click();
        $('#department1_disp').val(department('{!! $details->dept1 !!}'));
        $('#department2_disp').val(department('{!! $details->dept2 !!}'));
        $('#department3_disp').val(department('{!! $details->dept3 !!}'));

        $("#yearly_results").change(function() {
        	if(this.checked == false)
			{
				$("#ug_results_table th:nth-child(2)").show();
				$("#ug_results_table td:nth-child(2)").show();
				$("#ug_results_table tr:odd").show().find("input").attr("required", true);
			}
			else {
				$("#ug_results_table th:nth-child(2)").hide();
	        	$("#ug_results_table td:nth-child(2)").hide();
	        	$("#ug_results_table tr:odd").hide().find("input").attr("required", false);
			}
        });

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