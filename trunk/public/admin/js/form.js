
	// Function load_content().
	function load_content(div_return, url){	
		var waiting = false;
		if(arguments[2] == true) waiting = true;
		if(waiting == true) $('#waiting').show();
		
		$("#"+div_return).load(url, function() {
	    	$('#waiting').fadeOut();
		});
	}


	function open_form(url){
		$('#light_adct').html('').show();
		load_content('light_adct', url);
		$('#fade_adct').show();
	}
	
	
	//Function help changing status.
	function user_status(user_id, status){
		$.post(
				admin_url+'adminstrator/change-status/',
				{acc_id: user_id, acc_status: status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+user_id, admin_url+'adminstrator/load-row/'+user_id);
			            $('.linecate2').has('#row_'+user_id).css('background-color', '#FFFFE0');
			            alert('Status have been successfully set!');
			            //window.location	=	admin_url+'adminstrators-management';
					}
				}
		);
	}
	
	
	
	function category_status(cate_id, status, url_status){
		$.post(
				admin_url+'category/change-status/',
				{category_id: cate_id, category_status: status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+cate_id, admin_url+'category/load-row/'+cate_id);
			            $('.linecate2').has('#row_'+cate_id).css('background-color', '#FFFFE0');
			            alert('The Status has been successfully set!');
			            //window.location	=	url_status;
					}
				}
		);
	}
	
	
	function page_status(page_id, page_status, status_url){
		$.post(
				admin_url+'page/change-status/',
				{id: page_id, status: page_status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+page_id, admin_url+'page/load-row/'+page_id);
			            $('.linecate2').has('#row_'+page_id).css('background-color', '#FFFFE0');
			            alert('Status have been successfully set!');
			            //window.location	=	status_url;
					}
				}
		);
	}
	
	
	
	function slider_status(slide_id, slide_status){
		$.post(
				admin_url+'slider/change-status/',
				{id: slide_id, status: slide_status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+slide_id, admin_url+'slider/load-row/'+slide_id);
			            $('.linecate2').has('#row_'+slide_id).css('background-color', '#FFFFE0');
			            alert('Status have been successfully set!');
			            //window.location	=	status_url;
					}
				}
		);
	}
	
	
	function fcate_status(fcate_id, fcate_status){
		$.post(
				admin_url+'fcate/change-status/',
				{id: fcate_id, status: fcate_status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+fcate_id, admin_url+'fcate/load-row/'+fcate_id);
			            $('.linecate2').has('#row_'+fcate_id).css('background-color', '#FFFFE0');
			            alert('Status have been successfully set!');
			            //window.location	=	admin_url+'faqs-category';
					}
				}
		);
	}
	
	
	function faqs_status(faq_id, faq_status, status_url){
		$.post(
				admin_url+'faqs/change-status/',
				{id: faq_id, status: faq_status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+faq_id, admin_url+'faqs/load-row/'+faq_id);
			            $('.linecate2').has('#row_'+faq_id).css('background-color', '#FFFFE0');
			            alert('Status have been successfully set!');
			           // window.location	=	status_url;
					}
				}
		);
	}
	
	
	function menu_status(menu_id, menu_status){
		$.post(
				admin_url+'menu/change-status/',
				{id: menu_id, status: menu_status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+menu_id, admin_url+'menu/load-row/'+menu_id);
			            $('.linecate2').has('#row_'+menu_id).css('background-color', '#FFFFE0');
			            alert('Status have been successfully set!');
			            //window.location	=	status_url;
					}
				}
		);
	}
	
	
	function qcate_status(qcate_id, qcate_status, status_url){
		$.post(
				admin_url+'qcate/change-status/',
				{id: qcate_id, status: qcate_status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+qcate_id, admin_url+'qcate/load-row/'+qcate_id);
			            $('.linecate2').has('#row_'+qcate_id).css('background-color', '#FFFFE0');
			            alert('Status have been successfully set!');
			            //window.location	=	status_url;
					}
				}
		);
	}
	
	
	function question_status(quest_id, quest_status, status_url){
		$.post(
				admin_url+'question/change-status/',
				{id: quest_id, status: quest_status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+quest_id, admin_url+'question/load-row/'+quest_id);
			            $('.linecate2').has('#row_'+quest_id).css('background-color', '#FFFFE0');
			            alert('Status have been successfully set!');
			            //window.location	=	status_url;
					}
				}
		);
	}
	
	function country_status(country_id, country_status, status_url){
		$.post(
				admin_url+'country/change-status/',
				{id: country_id, status: country_status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+country_id, admin_url+'country/load-row/'+country_id);
			            $('.linecate2').has('#row_'+country_id).css('background-color', '#FFFFE0');
			            alert('Status have been successfully set!');
			           //window.location	=	status_url;
					}
				}
		);
	}
	
	
	function embassy_status(embassy_id, embassy_status, status_url){
		$.post(
				admin_url+'embassy/change-status/',
				{id: embassy_id, status: embassy_status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+embassy_id, admin_url+'embassy/load-row/'+embassy_id);
			            $('.linecate2').has('#row_'+embassy_id).css('background-color', '#FFFFE0');
			            alert('Status have been successfully set!');
			            //window.location	=	status_url;
					}
				}
		);
	}
	
	
	function testimonials_status(testimonials_id, testimonials_status){
		$.post(
				admin_url+'testimonials/change-status/',
				{id: testimonials_id, status: testimonials_status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+testimonials_id, admin_url+'testimonials/load-row/'+testimonials_id);
			            $('.linecate2').has('#row_'+testimonials_id).css('background-color', '#FFFFE0');
			            alert('Status have been successfully set!');
			            //window.location	=	status_url;
					}
				}
		);
	}
	
	
	
	function email_status(email_id, email_status){
		$.post(
				admin_url+'email/change-status/',
				{id: email_id, status: email_status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+email_id, admin_url+'email/load-row/'+email_id);
			            $('.linecate2').has('#row_'+email_id).css('background-color', '#FFFFE0');
			            alert('Status have been successfully set!');
			            //window.location	=	status_url;
					}
				}
		);
	}
	

