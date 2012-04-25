<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#change_pass_admin").validationEngine();
	});

</script>

<div class="mainright">
	<h1>Change Password</h1>
	<div id="user_list">
		<?php if(isset($error)) {?>
			<div id="div_message" class="error"><?php echo validation_errors();?></div>
		<?php }?>
		<?php if(isset($success)){?>
			<span style="color: green; font-size: 16px;"><?php echo $success;?></span>
		<?php }?>
		<form  method="post" action="<?php base_url(); ?>change-password" id="change_pass_admin" class="change-pass-form">
			<div class="editcate_ct">
				<div class="boxadd">
			    	<ul class="linect">
			            <li>
			                <span class="left"><b>Username :</b></span>
			                <span class="right"><?php $user = $this->session->userdata('user'); echo $user['username'];?></span>
			            </li>
			            <li>
			                <span class="left"><b>Old Password: </b></span>
			                <span class="right"><input name="old_password" type="password" class="validate[required] text-input" style="width:80%;" id="old_password"></span>
			            </li>
			            <li>
			                <span class="left"><b>New Password: </b></span>
			                <span class="right"><input name="new_password" type="password" class="validate[required, minSize[6], maxSize[15]] text-input" style="width:80%;" id="new_password"></span>
			            </li>
			            <li>
			                <span class="left"><b>Confirm Password: </b></span>
			                <span class="right"><input name="conf_password" type="password" class="validate[required,equals[new_password]] text-input" style="width:80%;" id="conf_password"></span>
			            </li>
			       
			        </ul>
			    </div>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn" class="submit" />
			
			    </div>
			</div>
		</form>
	</div>
</div>