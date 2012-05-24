<div class="editcate_top">
		    <h2>Edit Email Template:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/edit-email/<?php echo $email_info->id; ?>" method="post" id="edit-email-form">
			<div class="article_ct">
				<div class="btarticle">
			        <input type="submit" value="Save & Continute" class="btn edit-email" />
		    	</div>
				<ul class="metatags">
			    	<li>
			        	<span class="left"><b>Name* : </b></span>
			            <span class="right"><input type="text" name="name" value="<?php echo $email_info->name;?>" style="width:100%;" id="edit-name-page" /></span>
			        </li>
		            <li>
			        	<span class="left"><b>Subject* : </b></span>
			            <span class="right"><textarea name="subject" id="edit-sub-page" style="width: 100%; height: 100px;"><?php echo $email_info->subject;?></textarea></span>
			        </li>
		            <li>
		                <span class="left"><b>Status* : </b></span>
		                <span class="right">
		                	<select name="status" class="edit-status" style="width: 150px;">
		                		<option value="yes" <?php if($email_info->active == 'yes'){echo "selected";}?>>Active</option>
		                		<option value="no" <?php if($email_info->active == 'no'){echo "selected";}?>>Suspend</option>
		                	</select>
		                </span>
		            </li>
			        <li>
			        	<span class="left"><b>Content* : </b></span>
			            <span style="padding: 25px 5px 5px 5px;"><textarea name="content" id="content"><?php echo $email_info->content;?></textarea></span>
			        </li>                
			    </ul>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn edit-new-page" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#edit-email-form').iframer({
    onComplete: function(msg){
    	if(msg == 'yes') {
    		$('#light_adct').hide();$('#fade_adct').hide();
    		alert('Edit successfully!');
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
    filebrowserWindowWidth : '800',
    filebrowserWindowHeight : '480'
} );
CKFinder.SetupCKEditor( editor, "<?php echo base_url().'public/ckfinder/' ?> " );
</script>