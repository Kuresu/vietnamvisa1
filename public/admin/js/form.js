
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
			            window.location	=	admin_url+'adminstrators-management';
					}
				}
		);
	}
	
	
	
	function category_status(cate_id, status){
		$.post(
				admin_url+'category/change-status/',
				{category_id: cate_id, category_status: status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+cate_id, admin_url+'category/load-row/'+cate_id);
			            $('.linecate2').has('#row_'+cate_id).css('background-color', '#FFFFE0');
			            window.location	=	admin_url+'category';
					}
				}
		);
	}
	
	
	function page_status(page_id, page_status){
		$.post(
				admin_url+'page/change-status/',
				{id: page_id, status: page_status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+page_id, admin_url+'page/load-row/'+page_id);
			            $('.linecate2').has('#row_'+page_id).css('background-color', '#FFFFE0');
			            window.location	=	admin_url+'page';
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
			            window.location	=	admin_url+'slider';
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
			            window.location	=	admin_url+'faqs-category';
					}
				}
		);
	}
	
	
	function faqs_status(faq_id, faq_status){
		$.post(
				admin_url+'faqs/change-status/',
				{id: faq_id, status: faq_status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+faq_id, admin_url+'faqs/load-row/'+faq_id);
			            $('.linecate2').has('#row_'+faq_id).css('background-color', '#FFFFE0');
			            window.location	=	admin_url+'faqs';
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
			            window.location	=	admin_url+'menu';
					}
				}
		);
	}
	
	
	function qcate_status(qcate_id, qcate_status){
		$.post(
				admin_url+'qcate/change-status/',
				{id: qcate_id, status: qcate_status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+qcate_id, admin_url+'qcate/load-row/'+qcate_id);
			            $('.linecate2').has('#row_'+qcate_id).css('background-color', '#FFFFE0');
			            window.location	=	admin_url+'question-category';
					}
				}
		);
	}
	
	
	function question_status(quest_id, quest_status){
		$.post(
				admin_url+'question/change-status/',
				{id: quest_id, status: quest_status},
				function(msg){
					if(msg == "yes") {
						load_content('row_'+quest_id, admin_url+'qcate/load-row/'+quest_id);
			            $('.linecate2').has('#row_'+quest_id).css('background-color', '#FFFFE0');
			            window.location	=	admin_url+'question';
					}
				}
		);
	}
	

