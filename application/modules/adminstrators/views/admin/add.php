<div class="editcate_top">
		    <h2>Add New Adminstrator:</h2>
		    <a href = "javascript:void(0)" onclick ="document.getElementById('light_adct').style.display='none';document.getElementById('fade_adct').style.display='none'"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  base_url();?>home_admin/add-new-adminstrator" method="post" id="user_form">
			<div class="article_ct">
				<ul class="metatags">
			    	<li>
			        	<span class="left"><b>Fullname : </b></span>
			            <span class="right"><input type="text" name="fullname" value="" style="width:98%;" id="add-fullname" /></span>
			        </li>
			        <li>
			        	<span class="left"><b>Username* : </b></span>
			            <span class="right"><input type="text"  name="username" value="" style="width:98%;" id="add-fullname" /></span>
			        </li>
			        <li>
		                <span class="left"><b>Password* : </b></span>
		                <span class="right"><input name="password" type="password"  style="width:100%;" id="add-password"></span>
		            </li>
		            <li>
		                <span class="left"><b>Email* : </b></span>
		                <span class="right"><input name="email" type="text"  style="width:100%;" id="add-email" /></span>
		            </li>
		            <li>
		                <span class="left"><b>Status* : </b></span>
		                <span class="right">
		                	<select name="status" class="add-status" style="width: 150px;">
		                		<option value="yes" selected="selected">Active</option>
		                		<option value="no">Suspend</option>
		                	</select>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>Group* : </b></span>
		                <span class="right">
		                	<select name="add-group" class="change_group" style="width: 150px;">
		                		<option value="support">Support</option>
		                		<option value="admin">Admin</option>
		                	</select>
		                </span>
		            </li>               
			    </ul>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn add-new-adminstator" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#user_form').iframer({
    onComplete: function(msg){
    	if(msg == 'yes') {
    		$('#light_adct').hide();$('#fade_adct').hide();
    		alert('Add successfully!');
            window.location	=	admin_url+'adminstrators-management';
    	}
    	else show_error('div_message', msg)
    }
});
</script>