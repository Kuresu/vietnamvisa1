
	function changeType(){
		var path = base_url;
		$.post(path+'apply/change_type/',{type_id:$(".type_of_visa :selected").val()},function(data){
			$("#show_type_of_visa").html(data);
		});
	}
	
	
	$(document).ready(function(){
		var path	=	base_url;
		var services = '';
		
		$.post(path+'apply/change_type/',{type_id:$("#type_of_visa :selected").val()},function(data){
			$("#show_type_of_visa").html(data);
		});
		
		$('#type_of_visa').change(function(){
			$.post(path+'apply/change_type/',{type_id:$("#type_of_visa :selected").val()},function(data){
				$("#show_type_of_visa").html(data);
			});
		});
		
		$.post(
				path+'apply/change_number/',
				{number_id:$("#number_of_visa :selected").val()},
				function(data){
					$("#show_number_of_visa").html(data);
				}
		);
		
		$('#number_of_visa').change(function(){
			$.post(
					path+'apply/change_number/',
					{number_id:$("#number_of_visa :selected").val()},
					function(data){
						$("#show_number_of_visa").html(data);
					}
			);
		});
		
		$(".change_price_click").each(function(index) {
			if($(this).attr("checked") == true)
				services = $(this).val();
		});

		$.post(
				path+'apply/get_price_ajax/',
				{number_visa:$(".number_of_visa :selected").val(),type_visa:$(".type_of_visa :selected").val(),service:services},
				function (data){
					$("#show_total_price").html(data);
				}
		);
		
		$(".change_price").change(function(){
			$("#show_total_price").html("Loading ...");
			
			$(".change_price_click").each(function(index) {
				if($(this).attr("checked") == true)
					services = $(this).val();
			});
			$.post(
					path+'apply/get_price_ajax/',
					{number_visa:$(".number_of_visa :selected").val(),type_visa:$(".type_of_visa :selected").val(),service:services},
					function (data){
						$("#show_total_price").html(data);
					}
			);
		});
		
		$(".change_price_click").change(function(){
			$("#show_total_price").html("Loading ...");
			
			if($(this).attr("checked") == true && $(this).val() == "super_urgent"){
				$("#show_note").show();
			}else{
				$('#show_note').hide();
			} 
			$.post(
					base_url+'apply/get_price_ajax/',
					{number_visa:$(".number_of_visa :selected").val(),type_visa:$(".type_of_visa :selected").val(),service:$(this).val()},
					function (data){
						$("#show_total_price").html(data);
					}
			);
		});
	
	
	});
	

	