<div class="editcate_top">
		    <h2>Add New Faq:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/edit-faqs/<?php echo $faq_id; ?>" method="post" id="edit-faqs-form">
			<div class="article_ct">
				<div class="btarticle">
			        <input type="submit" value="Save & Continute" class="btn add-faq-page" />
		    	</div>
				<ul class="metatags">
		            <li>
			        	<span class="left"><b>Question* : </b></span>
			            <span class="right"><textarea name="question" id="question" style="width: 100%; height: 100px;"><?php echo $faq_info->question;?></textarea></span>
			        </li>
			        <li>
			        	<span class="left"><b>Answer* : </b></span>
			            <span style="padding: 25px 5px 5px 5px;"><textarea name="answer" id="answer"><?php echo $faq_info->answers;?></textarea></span>
			        </li>
			        <li>
		                <span class="left"><b>Category* : </b></span>
		                <span class="right">
		                	<?php if(count($cate_info[0])>0){?>
			                	<select name="category" class="" style="width: 150px;" >
			                		<?php foreach($cate_info as $leaf) {?>
										<option value="<?php echo $leaf->id;?>" <?php if($leaf->id == $faq_info->cate_id){echo "selected"; }?>>
											<?php
												echo $leaf->name;
											?>
										</option>
									<?php }?>
			                	</select>
		                	<?php }?>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>Order* : </b></span>
		                <span class="right">
		                	<select name="order" class="add-order" style="width: 150px;">
		                		<?php for($i=1; $i<=100; $i++){?>
		                		<option value="<?php echo $i;?>" <?php if($faq_info->order == $i){echo "selected";}?>><?php echo $i;?></option>
		                		<?php }?>
		                	</select>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>Status* : </b></span>
		                <span class="right">
		                	<select name="status" class="add-status" style="width: 150px;">
		                		<option value="yes" <?php if($faq_info->active == 'yes'){echo "selected";}?>>Active</option>
		                		<option value="no" <?php if($faq_info->active == 'no'){echo "selected";}?>>Suspend</option>
		                	</select>
		                </span>
		            </li>
			    </ul>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn add-faq-page" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#edit-faqs-form').iframer({
    onComplete: function(msg){
    	if(msg == 'yes') {
    		$('#light_adct').hide();$('#fade_adct').hide();
    		alert('Edit successfully!');
            window.location	=	'<?php echo $current_url;?>';
    	}
    	else show_error('div_message', msg)
    }
});
	if(CKEDITOR.instances['answer']) {						
		CKEDITOR.remove(CKEDITOR.instances['answer']);
	}
	CKEDITOR.replace( 'answer', {
    filebrowserBrowseUrl : '<?php echo base_url()."public/ckfinder/ckfinder.html"; ?>',
    filebrowserImageBrowseUrl : '<?php echo base_url()."public/ckfinder/ckfinder.html?Type=Images";?>',
    filebrowserFlashBrowseUrl : '<?php echo base_url()."public/ckfinder/ckfinder.html?Type=Flash" ?>',
    filebrowserUploadUrl : '<?php echo base_url()."public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files"?>',
    filebrowserImageUploadUrl : '<?php echo base_url()."public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";?>',
    filebrowserFlashUploadUrl : '<?php echo base_url()."ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash";?>',
} );
CKFinder.SetupCKEditor( editor, "<?php echo base_url().'public/ckfinder/' ?> " );
</script>