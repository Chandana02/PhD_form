$(document).ready(function(){
	$('#search').keyup(function(){
		var searchVal = $(this).val().toLowerCase();
		// console.log(searchVal);
		if(searchVal == ''){
			$('.candidates > div').show();
		}
		else{
			$('.candidates > div').each(function(){
				var text = $(this).attr('data-reg');
				text = text.toLowerCase();
				// console.log("text is-"+text);
				(text.indexOf(searchVal) >= 0) ? $(this).show("slow") : $(this).hide("slow");
			});

		}
	});
	$('.export').click(function(){
		var applNo = $(this).attr('data-reg');
		window.location = '/exportphd/' + applNo;
	});
	$('.discard').click(function(e){
		var applNo = $(this).attr('data-reg');
		ajaxCall(applNo, 'delete');
	}); 

	$('.accept').click(function(e){
		var applNo = $(this).attr('data-reg');
		ajaxCall(applNo, 'accept')
 	});

 	$('.phdExcel').click(function(){
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

	$('.msExcel').click(function(){
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


