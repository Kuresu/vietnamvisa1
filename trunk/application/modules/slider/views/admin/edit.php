<div class="editcate_top">
		    <h2>Edit Slide:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/edit-slider/<?php echo $slide_id; ?>" method="post" id="edit-slide-form" enctype="multipart/form-data">
			<div class="article_ct">
				<div class="btarticle">
			        <input type="submit" value="Save & Continute" class="btn edit-slide" />
		    	</div>
				<ul class="metatags">
			    	<li>
			        	<span class="left"><b>Name* : </b></span>
			            <span class="right"><input type="text" name="name" value="<?php echo $slide_info->name;?>" style="width:100%;" id="add-name-page" /></span>
			        </li>
			        <li>
			        	<span class="left"><b>Source* :</b><i style="font-size: 10px; color:green;">(Required: jpg, png, jpeg, gif & maximum 2MB)</i></span>
			            <span class="right"><input type="file" name="slide"  value="" style="width: 100%;"/></span>
			            <img src="<?php echo base_url().$slide_info->source;?>" width="150px" />
			        </li>
		            <li>
			        	<span class="left"><b>Description : </b></span>
			            <span class="right"><textarea name="description" id="add-des-page" style="width: 100%; height: 100px;"><?php echo $slide_info->description;?></textarea></span>
			        </li>
		            <li>
		                <span class="left"><b>Order* : </b></span>
		                <span class="right">
		                	<select name="order" class="add-order" style="width: 150px;">
		                		<?php for($i=1; $i<=20; $i++){?>
		                		<option value="<?php echo $i;?>" <?php if($i == $slide_info->order){echo "selected";}?>><?php echo $i;?></option>
		                		<?php }?>
		                	</select>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>Status* : </b></span>
		                <span class="right">
		                	<select name="status" class="add-status" style="width: 150px;">
		                		<option value="yes" <?php if($slide_info->active == 'yes'){echo "selected";}?>>Active</option>
		                		<option value="no" <?php if($slide_info->active == 'no'){echo "selected";}?>>Suspend</option>
		                	</select>
		                </span>
		            </li>
			    </ul>
			    <div style="display: none;">
			    	<input type="text" value="<?php echo $slide_info->source;?>" name="slide_hidden" />
			    	<input type="text" value="<?php echo $slide_info->thumbnail;?>" name="thumb_hidden" />
			    </div>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn edit-slide" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#edit-slide-form').iframer({
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