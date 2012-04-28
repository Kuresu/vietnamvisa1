
	<h1>Page Manager</h1>
    <div class="toppage">
    	<span class="left">
        	<select style="width: 130px;" id="action">
            	<option value="">Choose action</option>                               
                <option value="active">Activate</option>
                <option value="suspend">Deactivate</option>
                <option value="delete">Delete</option>
            </select>
            <input onclick="$('[name=action]').val($('#action').val()); $('#action_form').submit()" value="Apply" class="btn" type="button">
       		 <input type="text" name="" value="Keyword" style="width:165px; padding:3px;" />
        	<input type="submit" name="" value="Search" class="btn" />
        </span>
       
        <span class="btnadd">
        	<a onclick="open_form('<?php echo admin_url(); ?>/add-new-adminstrator')" href="javascript:void(0)">Add new adminstrator</a>
        </span>
    </div>
    <form action="<?php echo base_url();?>home_admin/adminstrators-management" method="post" id="list_adminstrators_form">
	    <div class="topart">
	    	<span class="left">
	    		<font class="number">(<?php echo '5';?>)</font> <a href="javascript:;">All</a><font class="line">|</font><font class="number">(<?php echo '6';?>)</font> <a href="javascript:;"><font color="#0b9901">Active</font></a><font class="line">|</font><font class="number">(<?php echo '7';?>)</font> <a href="javascript:;"><font color="#c60001">Pending</font></a>
	        </span>
	        <span class="right1">
	        	<select style="width:50px;" name="perpage" id="perpage" onchange="changeItemNumber()">
	            	<option value="6" <?php //echo ($current_perpage==6)?'selected':'';?>>6</option>
	                <option value="12" <?php //echo ($current_perpage==12)?'selected':'';?>>12</option>
	                <option value="24" <?php //echo ($current_perpage==24)?'selected':'';?>>24</option>
	                <option value="all" <?php //echo ($current_perpage=='all')?'selected':'';?>>All</option>
	            </select>
	            <div class="pagination">
	                <?php if(isset($pagination)){echo $pagination;}?>
	            </div>
	        </span>
	        
	    </div>
	</form>
    <div class="tableout">
    	<form action="<?php echo admin_url();?>/do-action" method="post" id="action_form">
			<div class="title1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all('.check_all')" type="checkbox"></div>
	            <div class="column" style="width: 4%;">STT</div>
	            <div class="column" style="width: 12%;">Name</div>
	            <div class="column" style="width: 25%;">Url</div>
	            <div class="column" style="width: 25%;">Title</div>
	            <div class="column" style="width: 13%;">Category</div>
	            <div class="column" style="width: 10%;">Order</div>
	            <div class="column" style="width: 5%;">Status</div>
	        </div>
	        <div class="linecate2">
	        	<div class="column" style="width: 2%;"><input name="id[]" value="" type="checkbox" /></div>
	            <div class="column" style="width:4%;">23</div>
	            
	            <div id="row_">
		            <div class="column" style="width:12%;" onmouseover="Hovercat('3')" onmouseout="Outcat('3')">
		            	<a href="javascript:;" class="art admin_name_">Tony</a><br />
		                <div class="action" id="neocat-3">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick ="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/icon_view.png" class="png" /><a href="#">View</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="#"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:25%;"><span class="art admin_fullname">asdfadfad</span></div>
		            <div class="column" style="width:25%;">
		            	<a href="#" target="blank" class="art admin_email_">asdfadfad</a>
		            </div>
		            <div class="column admin_group_" style="width:13%;">asdfsdf</div>
		            <div class="column" style="width:10%;">
		            	<input type="text" name="" value="1" style="width:45px; float:left;" />
		            </div>
		            <div class="column" style="width:5%;">
		            	
		            	<a href="javascript:void(0);" onclick="user_status('6', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
		            	
		            		<!-- <a href="javascript:void(0);" onclick="user_status('4', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>  -->
		            </div>
		            <div id="hidd" style="display: none;"><a href="#" class="admin_status">asdfdf</a></div>
	            </div>
	        </div>
	        <div class="bottom1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all(this)" type="checkbox"></div>
	            <div class="column" style="width:50%;">
	            	<select style="width:130px;" name="action">
	                   	<option value="">Choose action</option>                               
                		<option value="active">Activate</option>
                		<option value="suspend">Deactivate</option>
                		<option value="delete">Delete</option>
	                </select>
	                <input type="submit" name="" value="Apply" class="btn" />
	            </div>
	            <span class="right1">
	                <div class="pagination">
	                <?php if(isset($pagination)){echo $pagination;}?>
	            </div>
	            </span>
	        </div>
        </form>
	</div>
	
<script type="text/javascript">
	function changeItemNumber() {
		$("#list_adminstrators_form").submit();
	}

	jQuery(document).ready(function(){
		jQuery("#edit-adminstrator-form").validationEngine();
	});

	var inform	=	'no';
	if(inform == 'edit success'){alert("Edit Successfully !");}
	
	if(inform == 'delete success') {alert("Delete Successfully !");}

	$('#action_form').iframer({
	    onComplete: function(msg){
	    	if(msg == 'yes') {
	    		window.location	=	admin_url+'adminstrators-management';
	    	}
	    	else show_error('div_message', msg)
	    }
	});
</script>


	