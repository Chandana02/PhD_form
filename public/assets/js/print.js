$(document).ready(function(){
	$('.print').click(function(e){
		// e.preventDefault();
		var regNo = $(this).attr('data-reg');
		var dept = regNo.split('/');
		var department = '';
		for(var i = 0; i < dept.length-1; i++)
		{
			department += dept[i] + '-';
		}
		department += dept[dept.length-1];
		var categ = dept[0];
		window.location = 'http://localhost:8000/print/' + categ + '/' + department;
	}); 
	$('.admit').click(function(e){
		// e.preventDefault();
		var regNo = $(this).attr('data-reg');
		var dept = regNo.split('/');
		var department = '';
		for(var i = 0; i < dept.length-1; i++)
		{
			department += dept[i] + '-';
		}
		department += dept[dept.length-1];
		var categ = dept[0];
		window.location = 'http://localhost:8000/admit/' + categ + '/' + department + '/' + $('#heading').attr("data-reg");
	}); 
 });