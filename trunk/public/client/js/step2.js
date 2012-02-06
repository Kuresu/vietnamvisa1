	function send_info() {
			var valid = true;
			if($('#arrival_port').val() == "") { $('#arrival_port').css('background','#fff3a0'); valid = false; }
			else { $('#arrival_port').css('background','#fff'); }
			
			if($('#fullname_contact').val() == "") { $('#fullname_contact').css('background','#fff3a0'); valid = false; }
			else { $('#fullname_contact').css('background','#fff'); }
			
			if($('#email_contact').val() == "") { $('#email_contact').css('background','#fff3a0'); valid = false; }
			else { $('#email_contact').css('background','#fff'); }
			
			if($('#confirm_email_contact').val() == "") { $('#confirm_email_contact').css('background','#fff3a0'); valid = false; }
			else { $('#confirm_email_contact').css('background','#fff'); }
			
			if($('#phone_contact').val() == "") { $('#phone_contact').css('background','#fff3a0'); valid = false; }
			else { $('#phone_contact').css('background','#fff'); }
			
			if($('#purpose_arrival').val() == "") { $('#purpose_arrival').css('background','#fff3a0'); valid = false; }
			else { $('#purpose_arrival').css('background','#fff'); }
			
			
			for ( var j = 1; j <= number_visa; j++) {
				var	full_name	=	'#full_name_'+j;
				var	passport_number	=	'#passport_number_'+j;
				
				if($(full_name).val() == "") { $(full_name).css('background','#fff3a0'); valid = false; }
				else { $(full_name).css('background','#fff'); }
				
				if($(passport_number).val() == "") { $(passport_number).css('background','#fff3a0'); valid = false; }
				else { $(passport_number).css('background','#fff'); }
			}
			
			if (valid) {alert('no way');
				document.step2Form.submit();
			}
	}
	
	
	


