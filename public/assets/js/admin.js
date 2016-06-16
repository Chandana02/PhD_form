$(document).ready(function(){
	$('#search').keyup(function(e){
		$.get("/admin/search", {
				ajax: 1,
				phdorms: $("#phdorms").val(),
				_token: $("#hidden_token").val(),
				search: $("#search").val()
			}, function(html) {
				$("div.container.main").html(html)
			},
			"html"
		);
	});
	$('.main.container').on('change', '.paid', function() {
		var applNo = $(this).attr('data-reg');
        $.ajaxSetup(
	    {
	        headers:
	        {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
 		var data = {};
 		data.regNo = applNo;
 		data.paid = $(this).prop('checked');
 		console.log(data.paid);
		$.ajax(
	    {
	        type: "POST",
	        url: '/paidornot',
	        data: data,
	        dataType: "json",
	        success: function(data){

	        },
	        error: function(jqXHR,testStatus,errorThrown){
	        	console.log(errorThrown);
	        }
		});     
    });
	$('.exportphd').on('click', function(){
		var dept = $(this).attr('data-reg');
		window.location = '/exportphd/' + dept;
	});
	$('.exportms').on('click', function(){
		var dept = $(this).attr('data-reg');
		window.location = '/exportms/' + dept;
	});
	$('.main.container').on('click', '.exportselphd', function(){
		var dept = $(this).attr('data-reg');
		window.location = '/exportselphd/' + dept;
	});
	$('.main.container').on('click', '.exportselms', function(){
		var dept = $(this).attr('data-reg');
		window.location = '/exportselms/' + dept;
	});
	$('.main.container').on('click', '.exportunselphd', function(){
		var dept = $(this).attr('data-reg');
		window.location = '/exportunselphd/' + dept;
	});
	$('.main.container').on('click', '.exportunselms', function(){
		var dept = $(this).attr('data-reg');
		window.location = '/exportunselms/' + dept;
	});
	$('.main.container').on('click', '.discard', function(e){
		var applNo = $(this).attr('data-reg');
		ajaxCall(applNo, 'delete');
	}); 

	$('.main.container').on('click', '.accept', function(e){
		var applNo = $(this).attr('data-reg');
		ajaxCall(applNo, 'accept')
 	});

 	$('.main.container').on('click', '.verify', function(e){
 		var desel = !/-yes$/.test(this.id); //($(this).html().indexOf("Deselect") > -1);
 		var applNo = $(this).attr('data-reg');
 		var categ = $(this).attr('categ');
 		var reason = "";
 		if(desel == true)
 		{
 			reason = prompt("Please enter the reason:", "");
 		}
		if (reason != null) 
		{
			$.ajaxSetup(
		    {
		        headers:
		        {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
	 		var data = {};
	 		data.regNo = applNo;
	 		data.phdorms = categ;
	 		data.reason = reason;
	 		// console.log(data);
			$.ajax(
		    {
		        type: "POST",
		        url: '/verify',
		        data: data,
		        dataType: "json",
		        success: function(data){
		        	// console.log("helo");
		        	//location.reload();
		        },
		        error: function(jqXHR,testStatus,errorThrown){
		        	console.log(errorThrown);
		        }
			});
		}
		//return false;
 	});

 	$('.main.container').on('click', '.phdExcel', function(){
		var regNo = $(this).attr('data-reg');
		var dept = regNo.split('/');
		var department = '';
		for(var i = 0; i < dept.length-1; i++)
		{
			department += dept[i] + '-';
		}
		department += dept[dept.length-1];
		var categ = dept[0];
		window.location = '/exportphdSingle/' + department;
	});

	$('.main.container').on('click', '.msExcel', function(){
		var regNo = $(this).attr('data-reg');
		var dept = regNo.split('/');
		var department = '';
		for(var i = 0; i < dept.length-1; i++)
		{
			department += dept[i] + '-';
		}
		department += dept[dept.length-1];
		var categ = dept[0];
		window.location = '/exportmsSingle/' + department;
	});
});

function ajaxCall(x,y){
	$.ajaxSetup(
	    {
	        headers:
	        {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
		var data = {};
		data.applNo = x;
		var url = '/'+y;
		$.ajax(
	    {
	        type: "POST",
	        url: url,
	        data: data,
	        dataType: "json",
	        success: function(data){
	        	// console.log("helo");
	        	location.reload();
	        },
	        error: function(jqXHR,testStatus,errorThrown){
	        	console.log(errorThrown);
	        }
		});
}


