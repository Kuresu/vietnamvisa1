<div class="editcate_top">
		    <h2>Edit Adminstrator's Information:</h2>
		    <a href = "javascript:void(0)" onclick ="document.getElementById('light_adct').style.display='none';document.getElementById('fade_adct').style.display='none'"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/edit-adminstrator/<?php echo $admin->id; ?>" method="post" id="admin_form">
			<div class="article_ct">
				<ul class="metatags">
				            <li>
				                <span class="left"><b>Username* :</b></span>
				                <span class="right"><input type="text" name="username"  class="change_username" value="<?php echo $admin->username;?>" style="width:100%;"  /></span>
				            </li>
				            <li>
				                <span class="left"><b>Fullname : </b></span>
				                <span class="right"><input type="text" name="fullname" class="change_fullname" value="<?php echo $admin->fullname;?>" style="width:100%;"  /></span>
				            </li>
				            <li>
				                <span class="left"><b>Password : </b></span>
				                <span class="right"><input name="password" type="password" class="change_password" value="" style="width:100%;" id="edit-password"></span>
				            </li>
				            <li>
				                <span class="left"><b>Email* : </b></span>
				                <span class="right"><input name="email" type="text" class="change_email" value="<?php echo $admin->email;?>" style="width:100%;" id="email-edit" /></span>
				            </li>
            				<li>
				                <span class="left"><b>Status* : </b></span>
				                <span class="right">
				                	<select name="change_status" class="change_status" style="width: 150px;">
				                		<option value="yes" <?php if($admin->active == 'yes'){echo "selected";}?>>Active</option>
				                		<option value="no" <?php if($admin->active == 'no'){echo "selected";}?>>Suspend</option>
				                	</select>
				                </span>
				            </li>
				            <li>
				                <span class="left"><b>Group* : </b></span>
				                <span class="right">
				                	<select name="change_group" class="change_group" style="width: 150px;">
				                		<option value="support">Support</option>
				                		<option value="admin">Admin</option>
				                	</select>
				                </span>
				            </li>
				        </ul>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn add-new-category" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#admin_form').iframer({
    onComplete: function(msg){
    	if(msg == 'yes') {
    		$('#light_adct').hide();$('#fade_adct').hide();
    		alert('Edit successfully!');
            window.location	=	'<?php echo $current_url;?>';
    	}
    	else show_error('div_message', msg)
    }
});
</script>

