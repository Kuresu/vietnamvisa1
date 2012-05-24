<div class="editcate_top">
		    <h2>Add New Email Template:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/add-new-email" method="post" id="add-email-form">
			<div class="article_ct">
				<div class="btarticle">
			        <input type="submit" value="Save & Continute" class="btn add-new-email" />
		    	</div>
				<ul class="metatags">
			    	<li>
			        	<span class="left"><b>Name* : </b></span>
			            <span class="right"><input type="text" name="name" value="" style="width:100%;" id="add-name-page" /></span>
			        </li>
		            <li>
			        	<span class="left"><b>Subject* : </b></span>
			            <span class="right"><textarea name="subject" id="add-sub-page" style="width: 100%; height: 100px;"></textarea></span>
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
			        	<span class="left"><b>Content* : </b></span>
			            <span style="padding: 25px 5px 5px 5px;"><textarea name="content" id="content"></textarea></span>
			        </li>               
			    </ul>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn add-new-page" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#add-email-form').iframer({
    onComplete: function(msg){
    	if(msg == 'yes') {
    		$('#light_adct').hide();$('#fade_adct').hide();
    		alert('Add successfully!');
            window.location	=	admin_url+'email';
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