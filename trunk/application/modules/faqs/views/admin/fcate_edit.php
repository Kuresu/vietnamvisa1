<div class="editcate_top">
		    <h2>Edit Faq's Category:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/edit-fcate/<?php echo $fcate_info->id; ?>" method="post" id="edit-fcate-form">
			<div class="article_ct">
				<ul class="metatags">
		            <li>
			        	<span class="left"><b>Name* : </b></span>
			            <span class="right"><input type="text" value="<?php echo $fcate_info->name;?>" name="name" id="name" style="width: 100%;"></span>
			        </li>
		            <li>
		                <span class="left"><b>Order* : </b></span>
		                <span class="right">
		                	<select name="order" class="edit-order" style="width: 150px;">
		                		<?php for($i=1; $i<=15; $i++){?>
		                		<option value="<?php echo $i;?>" <?php if($fcate_info->order == $i){echo "selected";}?>><?php echo $i;?></option>
		                		<?php }?>
		                	</select>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>Status* : </b></span>
		                <span class="right">
		                	<select name="status" class="edit-status" style="width: 150px;">
		                		<option value="yes" <?php if($fcate_info->active == 'yes'){echo "selected";}?>>Active</option>
		                		<option value="no" <?php if($fcate_info->active == 'no'){echo "selected";}?>>Suspend</option>
		                	</select>
		                </span>
		            </li>
			    </ul>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn edit-fcate" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#edit-fcate-form').iframer({
    onComplete: function(msg){
    	if(msg == 'yes') {
    		$('#light_adct').hide();$('#fade_adct').hide();
    		alert('Edit successfully!');
            window.location	=	admin_url+'faqs-category';
    	}
    	else show_error('div_message', msg)
    }
});
</script>