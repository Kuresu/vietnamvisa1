
	<h1>Adminstrators Manager</h1>
    <div class="toppage">
    	<span class="left">
        	<select style="width: 130px;" id="action">
            	<option value="">Choose action</option>                               
                <option value="active">Activate</option>
                <option value="suspend">Deactivate</option>
                <option value="delete">Delete</option>
            </select>
            <input onclick="$('[name=action]').val($('#action').val()); $('#action_form').submit()" value="Apply" class="btn" type="button">
        </span>
        <span class="btnadd">
        	<a onclick="open_form('<?php echo admin_url(); ?>/add-new-adminstrator')" href="javascript:void(0)">Add new adminstrator</a>
        </span>
    </div>
    <form action="<?php echo admin_url();?>/adminstrators-management" method="post" id="list_adminstrators_form">
	    <div class="topart">
	    	<span class="left">
	    		<?php $total_amount	=	count($this->adminstrators_model->get_all_acc());
	    			  $active		=	$this->adminstrators_model->count_active();		
	    		?>
	    		<font class="number">(<?php echo $total_amount;?>)</font> <a href="javascript:;">All</a><font class="line">|</font><font class="number">(<?php echo $active;?>)</font> <a href="javascript:;"><font color="#0b9901">Active</font></a><font class="line">|</font><font class="number">(<?php $inactive = $total_amount - $active; echo $inactive;?>)</font> <a href="javascript:;"><font color="#c60001">Pending</font></a>
	        </span>
	        <span class="right1">
	        	<select style="width:50px;" name="perpage" id="perpage" onchange="changeItemNumber()">
	            	<option value="6" <?php echo ($current_perpage==6)?'selected':'';?>>6</option>
	                <option value="12" <?php echo ($current_perpage==12)?'selected':'';?>>12</option>
	                <option value="24" <?php echo ($current_perpage==24)?'selected':'';?>>24</option>
	                <option value="all" <?php echo ($current_perpage=='all')?'selected':'';?>>All</option>
	            </select>
	            <div class="pagination">
	                <?php if(isset($pagination)){echo $pagination;}?>
	            </div>
	        </span>
	        
	    </div>
	</form>
    <div class="tableout">
    	<form action="<?php echo admin_url();?>/adminstrator/do-action" method="post" id="action_form">
			<div class="title1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all('.check_all')" type="checkbox"></div>
	            <div class="column" style="width: 4%;">STT</div>
	            <div class="column" style="width: 15%;">Username</div>
	            <div class="column" style="width: 20%;">Fullname</div>
	            <div class="column" style="width: 20%;">Email</div>
	            <div class="column" style="width: 13%;">Group</div>
	            <div class="column" style="width: 15%;">Created Date</div>
	            <div class="column" style="width: 8%;">Status</div>
	        </div>
	        <?php if(count($accs_list)>0) {?>
	        <?php foreach ($accs_list as $k => $v){?>
	        <div class="linecate2">
	        	<div class="column" style="width: 2%;"><input name="id[]" value="<?php echo $v->id; ?>" type="checkbox" /></div>
	            <div class="column" style="width:4%;"><?php $pagin	=	$this->uri->segment(3); if(isset($pagin)){echo $k+1+$pagin;}?></div>
	            
	            <div id="row_<?php echo $v->id;?>">
		            <div class="column" style="width:15%;" onmouseover="Hovercat('<?php echo $v->id;?>')" onmouseout="Outcat('<?php echo $v->id;?>')">
		            	<a href="javascript:;" class="art admin_name_<?php echo $v->id;?>"><?php echo $v->username;?></a><br />
		                <div class="action" id="neocat-<?php echo $v->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" class="change-adminstrator" id="<?php echo $v->id;?>" onclick ="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-adminstrator/<?php echo $v->id;?>" onclick="return confirm('Do you want delete this account?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:20%;"><span class="art admin_fullname_<?php echo $v->id;?>"><?php echo $v->fullname;?></span></div>
		            <div class="column" style="width:20%;">
		            	<a href="mailto:<?php echo $v->email;?>" target="blank" class="art admin_email_<?php echo $v->id;?>"><?php echo $v->email;?></a>
		            </div>
		            <div class="column admin_group_<?php echo $v->id;?>" style="width:13%;"><?php echo $v->group;?></div>
		            <div class="column" style="width:15%;"><font color="#FF0000"><?php echo $v->time;?></div>
		            <div class="column" style="width:8%;">
		            	<?php if($v->active != 'no'){?>
		            		<a href="javascript:void(0);" onclick="user_status('<?php echo $v->id; ?>', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
		            	<?php }else {?>
		            		<a href="javascript:void(0);" onclick="user_status('<?php echo $v->id; ?>', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
		            	<?php }?>
		            </div>
		            <div id="hidd" style="display: none;"><a href="#" class="admin_status_<?php echo $v->id;?>"><?php echo $v->active;?></a></div>
	            </div>
	        </div>
	        <?php }?>
			<?php }?>
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

	var inform	=	'<?php echo $inform;?>';
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


	