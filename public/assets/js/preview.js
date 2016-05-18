$(document).ready(function(){
	$('#preview1').click(function(e){		
		var data = {};
		
		data.name = $('#name').val();
		data.email = $('#email').val();
		data.chalan_no = $('#chalanNo').val();
		data.appl_categ = $('.applicationCateg option:selected').text();
		data.department1 = $('#department1_disp').val();
		data.department2 = $('#department2_disp').val();
		data.department3 = $('#department3_disp').val();
		data.email = $('#email').val();
		data.area_of_research = $('#area_of_research').val();
		data.father_name = $('#father_name').val();
		data.dob = $('#dob').val();
		data.nationality = $('#nationality').val();
		data.addr_for_commn = $('#addr_for_commn').val();
		data.permanent_addr = $('#permanent_addr').val();
		data.mobile = $('#mobile').val();
		data.category = $('#category').val();
		data.sex = $('#sex').val();
		data.marital_status = $('#marital_status').val();
		data.ph = $('#ph').val();
		data.landline = $('#landline').val();
		data.ug_deg = $('#ug_deg').val();
		data.ug_branch = $('#ug_branch').val();
		data.ug_gpa = $('#ug_gpa').val();
		data.ug_class = $('#ug_class option:selected').text();
		data.ug_name_of_inst = $('#ug_name_of_inst').val();
		data.ug_name_of_uni = $('#ug_name_of_uni').val();
		data.ug_yop = $('#ug_yop').val();
		data.pg_deg = $('#pg_deg').val();
		data.pg_branch = $('#pg_branch').val();
		data.pg_gpa = $('#pg_gpa').val();
		data.pg_class = $('#pg_class option:selected').text();
		data.pg_name_of_inst = $('#pg_name_of_inst').val();
		data.pg_name_of_uni = $('#pg_name_of_uni').val();
		data.pg_yop = $('#pg_yop').val();
		data.title_of_project = $('#title_of_project').val();
		data.details_of_pub1 = $('#details_of_pub1').val();
		data.details_of_pub2 = $('#details_of_pub2').val();
		data.details_of_pub3 = $('#details_of_pub3').val();
		data.details_of_pub4 = $('#details_of_pub4').val();
		data.details_of_pub5 = $('#details_of_pub5').val();
		data.details_of_pub6 = $('#details_of_pub6').val();
		data.awards1 = $('#awards1').val();
		data.awards2 = $('#awards2').val();
		data.awards3 = $('#awards3').val();
		data.awards4 = $('#awards4').val();
		data.awards5 = $('#awards5').val();
		data.awards6 = $('#awards6').val();
		data.employer_details_1 = $('#employer_details_1').val();
		data.employer_details_2 = $('#employer_details_2').val();
		data.employer_details_3 = $('#employer_details_3').val();
		data.employer_details_4 = $('#employer_details_4').val();
		data.employer_details_5 = $('#employer_details_5').val();
		data.employer_details_6 = $('#employer_details_6').val();
		data.emp_pos_1 = $('#emp_pos_1').val();
		data.emp_pos_2 = $('#emp_pos_2').val();
		data.emp_pos_3 = $('#emp_pos_3').val();
		data.emp_pos_4 = $('#emp_pos_4').val();
		data.emp_pos_5 = $('#emp_pos_5').val();
		data.emp_pos_6 = $('#emp_pos_6').val();
		data.emp_from_1 = $('#emp_from_1').val();
		data.emp_from_2 = $('#emp_from_2').val();
		data.emp_from_3 = $('#emp_from_3').val();
		data.emp_from_4 = $('#emp_from_4').val();
		data.emp_from_5 = $('#emp_from_5').val();
		data.emp_from_6 = $('#emp_from_6').val();
		data.emp_to_1 = $('#emp_to_1').val();
		data.emp_to_2 = $('#emp_to_2').val();
		data.emp_to_3 = $('#emp_to_3').val();
		data.emp_to_4 = $('#emp_to_4').val();
		data.emp_to_5 = $('#emp_to_5').val();
		data.emp_to_6 = $('#emp_to_6').val();
		data.date = $('#date').val();

		if($('#announced').is(':checked')){
			data.exam = $('#exam option:selected').text();
			data.score = $('#score').val();
			data.rank = $('#rank').val();
			data.validity = $('#validity').val();
			data.discipline = $('#discipline').val();;
		}
		else{
			data.exam ='';
			data.score ='';
			data.rank ='';
			data.validity ='';
			data.discipline ='';
		}

		// localStorage.clear();
    localStorage.setItem('data' , JSON.stringify(data));
		
	}); 

	$('#preview2').click(function(e){		
	    
		var data = {};
		
		data.name = $('#name').val();
		data.email = $('#email').val();
		data.chalan_no = $('#chalanNo').val();
		data.appl_categ = $('.applicationCateg option:selected').text();
		// console.log(data.appl_categ);
		data.department1 = $('#department1_disp').val();
		data.department2 = $('#department2_disp').val();
		data.department3 = $('#department3_disp').val();
		data.email = $('#email').val();
		data.area_of_research = $('#area_of_research').val();
		data.father_name = $('#father_name').val();
		data.dob = $('#dob').val();
		data.nationality = $('#nationality').val();
		data.addr_for_commn = $('#addr_for_commn').val();
		data.permanent_addr = $('#permanent_addr').val();
		data.mobile = $('#mobile').val();
		data.landline = $('#landline').val();
		data.ug_deg = $('#ug_deg').val();
		data.ug_branch = $('#ug_branch').val();
		data.ug_gpa = $('#ug_gpa').val();
		data.ug_class = $('#ug_class option:selected').text();
		data.ug_name_of_inst = $('#ug_name_of_inst').val();
		data.ug_name_of_uni = $('#ug_name_of_uni').val();
		data.ug_yop = $('#ug_yop').val();
		data.category = $('#category').val();
		data.sex = $('#sex').val();
		data.marital_status = $('#marital_status').val();
		data.ph = $('#ph').val();
		data.gpa1 = $('#gpa1').val();
		data.gpa2 = $('#gpa2').val();
		data.gpa3 = $('#gpa3').val();
		data.gpa4 = $('#gpa4').val();
		data.gpa5 = $('#gpa5').val();
		data.gpa6 = $('#gpa6').val();
		data.gpa7 = $('#gpa7').val();
		data.gpa8 = $('#gpa8').val();
		data.max1 = $('#max1').val();
		data.max2 = $('#max2').val();
		data.max3 = $('#max3').val();
		data.max4 = $('#max4').val();
		data.max5 = $('#max5').val();
		data.max6 = $('#max6').val();
		data.max7 = $('#max7').val();
		data.max8 = $('#max8').val();
		data.employer_details_1 = $('#employer_details_1').val();
		data.employer_details_2 = $('#employer_details_2').val();
		data.employer_details_3 = $('#employer_details_3').val();
		data.employer_details_4 = $('#employer_details_4').val();
		data.employer_details_5 = $('#employer_details_5').val();
		data.employer_details_6 = $('#employer_details_6').val();
		data.emp_pos_1 = $('#emp_pos_1').val();
		data.emp_pos_2 = $('#emp_pos_2').val();
		data.emp_pos_3 = $('#emp_pos_3').val();
		data.emp_pos_4 = $('#emp_pos_4').val();
		data.emp_pos_5 = $('#emp_pos_5').val();
		data.emp_pos_6 = $('#emp_pos_6').val();
		data.emp_from_1 = $('#emp_from_1').val();
		data.emp_from_2 = $('#emp_from_2').val();
		data.emp_from_3 = $('#emp_from_3').val();
		data.emp_from_4 = $('#emp_from_4').val();
		data.emp_from_5 = $('#emp_from_5').val();
		data.emp_from_6 = $('#emp_from_6').val();
		data.emp_to_1 = $('#emp_to_1').val();
		data.emp_to_2 = $('#emp_to_2').val();
		data.emp_to_3 = $('#emp_to_3').val();
		data.emp_to_4 = $('#emp_to_4').val();
		data.emp_to_5 = $('#emp_to_5').val();
		data.emp_to_6 = $('#emp_to_6').val();
		data.date = $('#date').val();

		if($('#announced').is(':checked')){
			data.exam = $('#exam option:selected').text();
			data.score = $('#score').val();
			data.rank = $('#rank').val();
			data.validity = $('#validity').val();
			data.discipline = $('#discipline').val();
      // console.log($('#validity').val());
		}
		else{
			data.exam ='';
			data.score ='';
			data.rank ='';
			data.validity ='';
			data.discipline ='';
		}		

		// console.log(data);
    // localStorage.clear();
		localStorage.setItem('data' , JSON.stringify(data));
    // console.log(JSON.parse(localStorage.getItem('data')));
		
	}); 
 });

