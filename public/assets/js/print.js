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
		// window.location = '/print/' + categ + '/' + department;
		var route = '/print/' + categ + '/' + department;
		window.open(route,'_blank');
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
		var route = '/admit/' + categ + '/' + department + '/' + $('.heading').attr("data-reg");
		// window.location = '/admit/' + categ + '/' + department + '/' + $('.heading').attr("data-reg");
		window.open(route,'_blank');
	}); 
 });