$(document).ready(function(){
	
	$('.applicationCateg').change(function()
	{
		var p=$('.applicationCateg option:selected').text();
		// console.log(p);
		if(p=='Part Time'){
			
			$('.upload_container').append('<div class="spon"><input type="file" name="form1"/></div>');

		}
		
		else{
			if($('.upload_container').has('.spon'))
				$('.spon').remove();
			
		}
	});
	$('#ra3').click(function()
	{
		if($('#ra3').is(':checked')){
		$('.eight').val('');
		$('.eight').prop('disabled',true);
		}
		else{
			$('.eight').prop('disabled',false);	
		}
	});
	$('.annn').click(function()
	{
		if($('.exams').has('.add'))
			$('.add').remove();
		
		if($('.annn').is(':checked'))
			$('.exams').append('<div class="add"><div class="col l3 s6 examCheck"> <span class="light">Examination:</span> <select id="exam" class="exam_select" required name="exam"> <option value="" selected>Choose your Exam</option> <option value="GATE">GATE</option> 	 </select> </div> <div class="col l3 s6"> <span class="light">Enter Score:</span> <input placeholder="Enter Score" id="score" type="number" class="validate" name="score" > </div> <div class="col l3 s6"> <span class="light">Enter Rank:</span> <input placeholder="Enter Rank" id="rank" type="number" class="validate" name="rank" max="1000000" min="0"> </div> <div class="col l3 s6"> <span class="light">Valid Till:</span> <input id="validity" type="date" class="validate" name="validity" max="2018" min="2010"> </div> <!-- disipline needs to be added--> <div class="col l12 s12"> <span class="light">Discipline:</span> <input type="text" id="discipline" class="validate" name="discipline" required /> </div> <div class="space-small"></div></div><script>$("select").material_select();</script>');

	});
	// $('.annn').prop('checked',true);

});