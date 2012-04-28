


$(document).ready(function(){
	$(".change-adminstrator").click(function(){
		var id = $(this).attr("id");
		
		$(".change_username").val($(".admin_name_"+$(this).attr("id")).html());
		$(".change_fullname").val($(".admin_fullname_"+$(this).attr("id")).html());
		$(".change_email").val($(".admin_email_"+$(this).attr("id")).html());
		$(".change_group").val($(".admin_group_"+$(this).attr("id")).html());
		$(".change_status").val($(".admin_status_"+$(this).attr("id")).html());
		$(".change-id-hidden").html('<input type="hidden" value="'+id+'" name="acc_id" />');
		
	});
	
	
	$(".paymethod").change(function(){
		if( $(this).val() == "western" && $(this).attr('checked') == 'checked')
		{
			$("#tip_note4").show();
			return false;
		}
	});
	
	
});