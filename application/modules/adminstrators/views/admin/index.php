
	<div class="mainright">
		<script src="<?php echo base_url();?>public/admin/js/jquery.iframer.js"></script>
		
		<div id="user_list">
		<?php $this->load->view('admin/adminstrators'); ?>
		</div>
	
	 </div>

    
    <div id="light" class="white_content">
		<form action="<?php echo base_url();?>home_admin/edit-adminstrator" method="post" id="edit-adminstrator-form">
			<div class="editcate_top">
			    <h2>Edit Adminstrator's Information:</h2>
			    <a href = "javascript:void(0)" onclick ="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
			</div>
			<div class="article_ct">
				<div class="editcate_ct">
					<div class="boxadd">
				    	<ul class="linect">
				            <li>
				                <span class="left"><b>Username* :</b></span>
				                <span class="right"><input type="text" name="username" readonly="readonly" class="change_username" value="" style="width:100%;"  /></span>
				            </li>
				            <li>
				                <span class="left"><b>Fullname : </b></span>
				                <span class="right"><input type="text" name="fullname" class="change_fullname" value="" style="width:100%;"  /></span>
				            </li>
				            <li>
				                <span class="left"><b>Password : </b></span>
				                <span class="right"><input name="password" type="password" class="change_password validate[minSize[6], maxSize[15]] text-input" style="width:100%;" id="edit-password"></span>
				            </li>
				            <li>
				                <span class="left"><b>Email* : </b></span>
				                <span class="right"><input name="email" type="text" class="validate[required,custom[email]] text-input change_email" style="width:100%;" id="email-edit" /></span>
				            </li>
            				<li>
				                <span class="left"><b>Status* : </b></span>
				                <span class="right">
				                	<select name="change_status" class="change_status" style="width: 150px;">
				                		<option value="yes">Active</option>
				                		<option value="no">Suspend</option>
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
				    </div>
				    <div class="hid">
				    	<div class="change-id-hidden"></div>
				    </div>
				    <div class="btarticle">
				    	<input type="button" value="Cancel" class="btn" onclick="$('#light').hide();$('#fade').hide();" />
				        <input type="submit" value="Save & Continute"  class="btn submit save_adminstrator" />
				
				    </div>
				</div>
			</div>
		</form>
	</div>
	<div id="fade" class="black_overlay"></div>
    