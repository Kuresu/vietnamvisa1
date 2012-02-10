
	
	$(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery("#formID").validationEngine();

		// binds form submission and fields to the validation engine

		$( ".datepicker" ).datepicker({
			numberOfMonths: 3,
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
		});
		
	});

	$(function(){ $("label").inFieldLabels(); });


