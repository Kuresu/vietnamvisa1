<div class="editcate_top">
		    <h2>Edit Embassy:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/edit-embassy/<?php echo $embassy_info->id; ?>" method="post" id="edit-embassy-form">
			<div class="article_ct">
				<div class="btarticle">
			        <input type="submit" value="Save & Continute" class="btn edit-new-embassy" />
		    	</div>
				<ul class="metatags">
					<li>
			        	<span class="left"><b>Address* : </b></span>
			            <span class="right"><input type="text" name="address" value="<?php echo $embassy_info->address;?>" style="width: 100%;"></span>
			        </li>
		            <li>
			        	<span class="left"><b>City : </b></span>
			            <span class="right"><input type="text" name="city" value="<?php echo $embassy_info->city;?>" style="width: 100%;"></span>
			        </li>
			        <li>
			        	<span class="left"><b>Phone* : </b></span>
			            <span class="right"><input type="text" name="phone" value="<?php echo $embassy_info->phone;?>" style="width: 100%;"></span>
			        </li>
			        <li>
			        	<span class="left"><b>Fax : </b></span>
			            <span class="right"><input type="text" name="fax" value="<?php echo $embassy_info->fax;?>" style="width: 100%;"></span>
			        </li>
			        <li>
			        	<span class="left"><b>Email : </b></span>
			            <span class="right"><input type="text" name="email" value="<?php echo $embassy_info->email;?>" style="width: 100%;"></span>
			        </li>
			        <li>
			        	<span class="left"><b>Note : </b></span>
			            <span class="right"><textarea name="note" id="note" style="width: 100%; height: 100px;"><?php echo $embassy_info->note;?></textarea></span>
			        </li>
		            <li>
		                <span class="left"><b>Country* : </b></span>
		                <span class="right">
		                	<?php if(count($country[0])>0) {?>
			                	<select name="country" class="edit-order" style="width: 150px;">
			                		<?php foreach ($country as $k => $v){?>
			                			<option value="<?php echo $v->id;?>" <?php if($v->id == $embassy_info->id_country){echo "selected";}?>><?php echo $v->name;?></option>
			                		<?php }?>
			                	</select>
		                	<?php }?>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>Status* : </b></span>
		                <span class="right">
		                	<select name="status" class="edit-status" style="width: 150px;">
		                		<option value="yes" <?php if($embassy_info->active == 'yes')echo "selected" ;?>>Active</option>
		                		<option value="no" <?php if($embassy_info->active == 'no')echo "selected" ;?>>Suspend</option>
		                	</select>
		                </span>
		            </li>
			    </ul>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn edit-embassy" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#edit-embassy-form').iframer({
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