$(document).ready(function(){
	$('.exam').hide();

	$('#announced').click(function()
	{
		if($('.exams').has('.add'))
			$('.add').remove();
		
		if($('#announced').is(':checked'))
			$('.exams').append('<div class="add"><div class="col l3 s6 examCheck"> <span class="light">Examination:</span> <select id="exam" class="exam_select" required name="exam"> <option value="" selected>Choose your Exam</option> <option value="GATE">GATE</option> <option value="NET">NET</option> <option value="SLET">SLET</option> <option value="CSIR">CSIR</option> <option value="CAT">CAT</option> <option value="UGC">UGC</option> </select> </div> <div class="col l3 s6"> <span class="light">Enter Score:</span> <input placeholder="Enter Score" id="score" type="number" class="validate" name="score"> </div> <div class="col l3 s6"> <span class="light">Enter Rank:</span> <input placeholder="Enter Rank" id="rank" type="number" class="validate" name="rank" min="0"> </div> <div class="col l3 s6"> <span class="light">Valid Till:</span> <input id="validity" type="date" class="validate" name="validity"> </div> <!-- disipline needs to be added--> <div class="col l12 s12"> <span class="light">Discipline:</span> <input type="text" id="discipline" class="validate" name="discipline" required /> </div> <div class="space-small"></div></div><script>$("select").material_select();</script>');
	});
	

	$('.discard1').click(function(){
		$('#discard').openModal();
	});

	var count = 0;
	//validating via front end 
	$('.valid').click(function(){
		
		
		var data={};
		data.department1 = $('#department1 option:selected').val();
		data.department2 = $('#department2 option:selected').val();
		data.department3 = $('#department3 option:selected').val();
		data.category = $('#category option:selected').val();
		data.sex = $('#sex option:selected').val();
		data.ph = $('#ph option:selected').val();
		data.marital_status = $('#marital_status option:selected').val();
		data.name = $('#name').val();
		data.email = $('#email').val();
		data.area_of_research = $('#area_of_research').val();
		data.father_name = $('#father_name').val();
		data.dob = $('#dob').val();
		data.nationality = $('#nationality').val();
		data.addr_for_commn = $('#addr_for_commn').val();
		data.permanent_addr = $('#permanent_addr').val();
		data.mobile = $('#mobile').val();
		data.landline = $('#landline').val();
		data.age = $('#age').val();
		data.checker = $('.checker').val();

		data.email = $('#email').val();
		data.name = $('#name').val();
		data.father_name = $('#father_name').val();
		data.dob = $('#dob').val();
		data.age = $('#age').val();
		data.nationality = $('#nationality').val();
		data.addr_for_commn = $('#addr_for_commn').val();
		data.permanent_addr = $('#permanent_addr').val();

		// console.log(data);

		var ch = 1;
		if(data.email == ''){
			var error = "Please fill the email field";
			$('#error .modal-content .error').remove();
			var dived = '<div class="error"></div>';
			$('#error .modal-content').append(dived);
				$('#error .modal-content .error').append('<p>'+error+'</p>');
			$('#error').openModal();
			
			return false;
		}

		if(data.area_of_research == ''){
			var error = "Please fill the area of research field";
			$('#error .modal-content .error').remove();
			var dived = '<div class="error"></div>';
			$('#error .modal-content').append(dived);
				$('#error .modal-content .error').append('<p>'+error+'</p>');
			$('#error').openModal();
			
			return false;
		}
		if(data.name == ''){
			var error = "Please fill the name field";
			$('#error .modal-content .error').remove();
			var dived = '<div class="error"></div>';
			$('#error .modal-content').append(dived);
				$('#error .modal-content .error').append('<p>'+error+'</p>');
			$('#error').openModal();
			
			return false;
		}
		if(data.father_name == ''){
			var error = "Please fill the father's name field";
			$('#error .modal-content .error').remove();
			var dived = '<div class="error"></div>';
			$('#error .modal-content').append(dived);
				$('#error .modal-content .error').append('<p>'+error+'</p>');
			$('#error').openModal();
			
			return false;
		}
		if(data.dob == ''){
			var error = "Please fill the date of birth field";
			$('#error .modal-content .error').remove();
			var dived = '<div class="error"></div>';
			$('#error .modal-content').append(dived);
				$('#error .modal-content .error').append('<p>'+error+'</p>');
			$('#error').openModal();
			
			return false;
		}
		if(data.age == ''){
			var error = "Please fill the age field";
			$('#error .modal-content .error').remove();
			var dived = '<div class="error"></div>';
			$('#error .modal-content').append(dived);
				$('#error .modal-content .error').append('<p>'+error+'</p>');
			$('#error').openModal();
			
			return false;
		}
		if(data.nationality == ''){
			var error = "Please fill the nationality field";
			$('#error .modal-content .error').remove();
			var dived = '<div class="error"></div>';
			$('#error .modal-content').append(dived);
				$('#error .modal-content .error').append('<p>'+error+'</p>');
			$('#error').openModal();
			
			return false;
		}
		if(data.permanent_addr == ''){
			var error = "Please fill the permanent address field";
			$('#error .modal-content .error').remove();
			var dived = '<div class="error"></div>';
			$('#error .modal-content').append(dived);
				$('#error .modal-content .error').append('<p>'+error+'</p>');
			$('#error').openModal();
			
			return false;
		}
		if(data.addr_for_commn == ''){
			var error = "Please fill the address field";
			$('#error .modal-content .error').remove();
			var dived = '<div class="error"></div>';
			$('#error .modal-content').append(dived);
				$('#error .modal-content .error').append('<p>'+error+'</p>');
			$('#error').openModal();
			
			return false;
		}
		

		// console.log($('#dob').val());
		var a = $('#mobile').val();
		// console.log(a);
		var filter = /^[0-9-+]+$/;
		// console.log(filter.test(a));
		var len = a.length;
		if(filter.test(a) && a.length == 10){
			
		}	
		else{
			alert('Enter a valid 10 digit mobile number');
			return false;
		}
		var b = $('#landline').val();
		// console.log(b);
		var filter = /^[0-9-+]+$/;
		// console.log(filter.test(b));
		var len = b.length;
		if(filter.test(b) && b.length >= 9){
			
		}	
		else if(b.length == 0)
		{

		}
		else{
			alert('Enter a valid landline number');
			return false;
		}
		count++;
		if(data.department1 == '' || data.marital_status == '' || data.sex == '' || data.category == '' || data.ph == ''){
			var error = "Please select all the dropdowns";
			if(count==1)
				$('#error .modal-content .error').append('<p>'+error+'</p>');
			$('#error').openModal();
			
			return false;
		}

			
		$.ajaxSetup(
	    {
	        headers:
	        {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		var url = '/save' + data.checker;//route to the controller goes here

		$('.valid').hide();
		$('.blur').addClass('activated');
		$('.preloader').show();

		$.ajax(
	    {
	        type: "POST",
	        url: url,
	        data: data,
	        dataType: "json",
	        success: function(data){
	        	$('.blur').removeClass('activated');

				$('.preloader').hide();

	        	if(data==0){
	        		alert('User already exists!');
	        	}
	        	else{

	        		alert('Your Registration Number is ' + data + '. Check your Mail Inbox');
	        			var dept = data.split('/');
						var categ = dept[0];
						var applNo = '';

						for(i = 0; i < dept.length - 1; i++)
						{
							applNo = applNo + dept[i] + '-';
						}
						applNo = applNo + dept[dept.length - 1];

						var dob = $('#dob').val();

						window.location = '/fetch/'+ categ + '/' + applNo + '/' + dob;
	        		

	        	}
	        },
	        error: function(jqXHR,testStatus,errorThrown){
	        	console.log(errorThrown);
	        }
		});
	});

	$('.redirect1').click(function()
	{
		var regNo = $('#regNo').val();
		var dept = regNo.split('/');
		var categ = dept[0];
		var applNo = '';

		for(i = 0; i < dept.length - 1; i++)
		{
			applNo = applNo + dept[i] + '-';
		}
		applNo = applNo + dept[dept.length - 1];

		var dob = $('#dob').val();
		window.location = '/fetch/'+ categ + '/' + applNo + '/' + dob;
	});
	//validating front-end in form 3
	$('.valid1').click(function(){
		var data={};
		data.appl_categ = $('.applicationCateg option:selected').text();
		data.category = $('#category option:selected').text();
		data.sex = $('#sex').val();
		data.ph = $('#ph option:selected').text();
		data.marital_status = $('#marital_status').val();
		data.checker = $('.checker').val();
		data.ug_class = $('#ug_class option:selected').text();
		if(data.checker == 'phd'){
		data.pg_class = $('#pg_class option:selected').text();
		if($('#announced').prop('checked',true)){
				data.exam = data.pg_class = $('#exam option:selected').text();
		}
		if($('#agree').propertyIsEnumerable(prop)('checked',false)){
			alert('Please select the agree checkbox');
			return false;
		}
		count++;
		var a = $('#mobile').val();
		var filter = /^[0-9-+]+$/;
		var len = a.length;
		if(filter.test(a) && a.length == 10){
			
		}	
		else{
			alert('Enter a valid 10 digit mobile number');
			return false;
		}
		var b = $('#landline').val();
		var filter = /^[0-9-+]+$/;
		if(filter.test(b) && b.length >= 9){
			
		}	
		else{
			alert('Enter a valid landline number');
			return false;
		}


		if(data.appl_categ == '' ||  data.marital_status == '' || data.sex == '' || data.category == '' || data.ph == '' || data.ug_class == '' || data.pg_class == ''){
			var error = "Please select all the dropdowns";
			if(count==1)
				$('#error .modal-content .error').append('<p>'+error+'</p>');
			$('#error').openModal();
			
			return false;
		}
		}
		else{
		count++;
		if(data.appl_categ == '' || data.marital_status == '' || data.sex == '' || data.category == '' || data.ph == '' || data.ug_class == ''){
			var error = "Please select all the dropdowns";
			if(count==1)
				$('#error .modal-content .error').append('<p>'+error+'</p>');
			$('#error').openModal();
			
			return false;
		}	
		}

		
	});	

	$('.applicationCateg').change(function()
	{
		var p=$('.applicationCateg option:selected').text();
		if(p=='On Campus'){
			if($('.upload_container').has('.ext'))
				$('.ext').remove();
				// console.log($('.upload_container').has('.ext'));
			$('.upload_container').append('<div class="ext"><input type="file" name="form3"/></div>');

		}
		else if(p=='External'){
			if($('.upload_container').has('.oc'))
				$('.oc').remove();
			
			$('.upload_container').append('<div class="oc"><input type="file" name="form1"/><br><input type="file" name="form2" /></div>');
		}
		else{
			if($('.upload_container').has('.ext'))
				$('.ext').remove();
			if($('.upload_container').has('.oc'))
				$('.oc').remove();
			
		}
	});
	

	

	var x=$('.exam_select');
	x.change(function()
	{
		//if gate is selected then
		$('#valid').prop('required',true);
	});
	
		function requiredCheck(x){
		var error = "Please fill the "+x+" field";
		if(count==1)
				$('#error .modal-content .error').append('<p>'+error+'</p>');
			$('#error').openModal();
			
			return false;
	}
	
});
