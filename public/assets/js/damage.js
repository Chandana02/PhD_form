$(document).ready(function(){
	$('.button').click(function(){
		var data = $('#regNo').val();
		var a = window.confirm("Are you sure?");
		if(!a){

		}
		else{
		$.ajaxSetup(
	    {
	        headers:
	        {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
		
		$.ajax(
	    {
	        type: "POST",
	        url: '/dmgctrl',
	        data: data,
	        dataType: "json",
	        success: function(data){
	        	location.reload();
	        },
	        error: function(jqXHR,testStatus,errorThrown){
	        	console.log(errorThrown);
	        }
		});
		}
	});

	$('.button1').click(function(){
		var data = {};
		data.regNo = $('.button1').data('reg');
		var a = window.confirm("Are you sure?");
		if(!a){

		}
		else{
		$.ajaxSetup(
	    {
	        headers:
	        {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
		// console.log(data);
		$.ajax(
	    {
	        type: "POST",
	        url: '/dmgctrl',
	        data: data,
	        dataType: "json",
	        success: function(data){
	        	location.reload();
	        },
	        error: function(jqXHR,testStatus,errorThrown){
	        	console.log(errorThrown);
	        }
		});
		}
	});

	$('.exportAll').click(function(){
		
		var data = $('.exportAll').data('reg');
		
		$.ajaxSetup(
	    {
	        headers:
	        {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
		$.ajax(
	    {
	        type: "POST",
	        url: '/',
	        data: data,
	        dataType: "json",
	        success: function(data){
	        	location.reload();
	        },
	        error: function(jqXHR,testStatus,errorThrown){
	        	console.log(errorThrown);
	        }
		});
		
	});

});