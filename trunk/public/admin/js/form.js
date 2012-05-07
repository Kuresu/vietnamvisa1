
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
	

