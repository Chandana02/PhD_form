$(document).ready(function(){
	$('.main.container').on('click', '.button1', function(){
		var data = {};
		data.regNo = $(this).data('reg');
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

	$('.main.container').on('click', '.exportAll', function(){
		
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