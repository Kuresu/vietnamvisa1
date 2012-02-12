
	
	$(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery("#formID").validationEngine();

		// binds form submission and fields to the validation engine

		$( ".datepicker" ).datepicker({
			numberOfMonths: 3,
			stepMonths: 3,
			changeYear: true,
			}).unbind('blur');

		jQuery("#formID").validationEngine();
		
		
		$('#date_arrival').change(function(){
			$.post(
					base_url+'apply/validate_date_exit_ceiling/',
					{date_arrival:$("#date_arrival").val(), type_of_visa: type_visa},
					function(data){
						$("#exit_max").html(data);
					}
			);
			
			$.post(
					base_url+'apply/validate_date_exit_floor/',
					{date_arrival:$("#date_arrival").val()},
					function(data){
						$("#exit_min").html(data);
					}
			);
			
			$.post(
					base_url+'apply/validate_passport_expiration_1/',
					{date_arrival:$("#date_arrival").val()},
					function(data){
						$("#pass_expire_1").html(data);
					}
			);
			
			$.post(
					base_url+'apply/validate_passport_expiration_2/',
					{date_arrival:$("#date_arrival").val()},
					function(data){
						$("#pass_expire_2").html(data);
					}
			);
			
			$.post(
					base_url+'apply/validate_passport_expiration_3/',
					{date_arrival:$("#date_arrival").val()},
					function(data){
						$("#pass_expire_3").html(data);
					}
			);
			
			$.post(
					base_url+'apply/validate_passport_expiration_4/',
					{date_arrival:$("#date_arrival").val()},
					function(data){
						$("#pass_expire_4").html(data);
					}
			);
			
			$.post(
					base_url+'apply/validate_passport_expiration_5/',
					{date_arrival:$("#date_arrival").val()},
					function(data){
						$("#pass_expire_5").html(data);
					}
			);

			
			$.post(
					base_url+'apply/validate_passport_expiration_6/',
					{date_arrival:$("#date_arrival").val()},
					function(data){
						$("#pass_expire_6").html(data);
					}
			);
			
			$.post(
					base_url+'apply/validate_passport_expiration_7/',
					{date_arrival:$("#date_arrival").val()},
					function(data){
						$("#pass_expire_7").html(data);
					}
			);
			
			$.post(
					base_url+'apply/validate_passport_expiration_8/',
					{date_arrival:$("#date_arrival").val()},
					function(data){
						$("#pass_expire_8").html(data);
					}
			);
			
			
			$.post(
					base_url+'apply/validate_passport_expiration_9/',
					{date_arrival:$("#date_arrival").val()},
					function(data){
						$("#pass_expire_9").html(data);
					}
			);
			
			$.post(
					base_url+'apply/validate_passport_expiration_10/',
					{date_arrival:$("#date_arrival").val()},
					function(data){
						$("#pass_expire_10").html(data);
					}
			);
		});
		
	});

	$(function(){ $("label").inFieldLabels(); });


