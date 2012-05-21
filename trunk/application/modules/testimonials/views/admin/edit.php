<div class="editcate_top">
		    <h2>Edit testimonials:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/edit-testimonials/<?php echo $testimonials_info->id; ?>" method="post" id="edit-testimonials-form">
			<div class="article_ct">
				<div class="btarticle">
			        <input type="submit" value="Save & Continute" class="btn add-faq-page" />
		    	</div>
				<ul class="metatags">
		            <li>
			        	<span class="left"><b>Brief* : </b></span>
			            <span class="right"><textarea name="brief" id="brief" style="width: 100%; height: 50px;"><?php echo $testimonials_info->title;?></textarea></span>
			        </li>
			        <li>
			        	<span class="left"><b>Sender* : </b></span>
			            <span class="right"><input type="text" name="" value="<?php echo $testimonials_info->name;?>"  style="width: 100%;" readonly="readonly" /></span>
			        </li>
			        <li>
			        	<span class="left"><b>Sender Email : </b></span>
			            <span class="right"><input type="text" name="" value="<?php echo $testimonials_info->email;?>"  style="width: 100%;" readonly="readonly" /></span>
			        </li>
		            <li>
		                <span class="left"><b>Status* : </b></span>
		                <span class="right">
		                	<select name="status" class="add-status" style="width: 150px;">
		                		<option value="yes" <?php if($testimonials_info->active == 'yes'){echo "selected";}?>>Active</option>
		                		<option value="no" <?php if($testimonials_info->active == 'no'){echo "selected";}?>>Suspend</option>
		                	</select>
		                </span>
		            </li>
			        <li>
			        	<span class="left"><b>Detail* : </b></span>
			            <span style="padding: 10px;"><textarea name="content" id="content"  style="width: 100%; height: 100px;"><?php echo $testimonials_info->content;?></textarea></span>
			        </li>
			        
			    </ul>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn add-faq-page" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#edit-testimonials-form').iframer({
    onComplete: function(msg){
    	if(msg == 'yes') {
    		$('#light_adct').hide();$('#fade_adct').hide();
    		alert('Edit Successfully!');
            window.location	=	'<?php echo $current_url;?>';
    	}
    	else show_error('div_message', msg)
    }
});
	if(CKEDITOR.instances['content']) {						
		CKEDITOR.remove(CKEDITOR.instances['content']);
	}
	CKEDITOR.replace( 'content', {
    filebrowserBrowseUrl : '<?php echo base_url()."public/ckfinder/ckfinder.html"; ?>',
    filebrowserImageBrowseUrl : '<?php echo base_url()."public/ckfinder/ckfinder.html?Type=Images";?>',
    filebrowserFlashBrowseUrl : '<?php echo base_url()."public/ckfinder/ckfinder.html?Type=Flash" ?>',
    filebrowserUploadUrl : '<?php echo base_url()."public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files"?>',
    filebrowserImageUploadUrl : '<?php echo base_url()."public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";?>',
    filebrowserFlashUploadUrl : '<?php echo base_url()."ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash";?>',
} );
CKFinder.SetupCKEditor( editor, "<?php echo base_url().'public/ckfinder/' ?> " );
</script>