<div class="editcate_top">
		    <h2>Edit Question:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/edit-question/<?php echo $quest_info->id; ?>" method="post" id="edit-question-form">
			<div class="article_ct">
				<div class="btarticle">
			        <input type="submit" value="Save & Continute" class="btn add-faq-page" />
		    	</div>
				<ul class="metatags">
		            <li>
			        	<span class="left"><b>Question Brief* : </b></span>
			            <span class="right"><textarea name="brief" id="question" style="width: 100%; height: 50px;"><?php echo $quest_info->brief;?></textarea></span>
			        </li>
			        <li>
			        	<span class="left"><b>Question Detail* : </b></span>
			            <span class="right"><textarea name="question" id="question" readonly="readonly" style="width: 100%; height: 100px;"><?php echo $quest_info->detail;?></textarea></span>
			        </li>
			        <li>
			        	<span class="left"><b>Question Sender : </b></span>
			            <span class="right"><input type="text" name="" value="<?php echo $quest_info->sender;?>"  style="width: 100%;" readonly="readonly" /></span>
			        </li>
			        <li>
			        	<span class="left"><b>Sender Email : </b></span>
			            <span class="right"><input type="text" name="" value="<?php echo $quest_info->sender_email;?>"  style="width: 100%;" readonly="readonly" /></span>
			        </li>
			        <li>
			        	<span class="left"><b>Answer* : </b></span>
			            <span style="padding: 25px 5px 5px 5px;"><textarea name="answer" id="answer"><?php echo $answer_info['answer'];?></textarea></span>
			        </li>
			        <li>
			        	<span class="left"><b>Answer Sender* : </b></span>
			            <span class="right"><input type="text" name="answer_name" value="<?php if(isset($answer_info['sender'])){echo $answer_info['sender']; }?>"  style="width: 100%;"  /></span>
			        </li>
			        <li>
		                <span class="left"><b>Category* : </b></span>
		                <span class="right">
		                	<?php if(count($cate_info[0])>0){?>
			                	<select name="category" class="" style="width: 150px;" >
			                		<?php foreach($cate_info as $leaf) {?>
										<option value="<?php echo $leaf->id;?>" <?php if($leaf->id == $quest_info->cate_id){echo "selected"; }?>>
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
		                <span class="left"><b>Status* : </b></span>
		                <span class="right">
		                	<select name="status" class="add-status" style="width: 150px;">
		                		<option value="yes" <?php if($quest_info->active == 'yes'){echo "selected";}?>>Active</option>
		                		<option value="no" <?php if($quest_info->active == 'no'){echo "selected";}?>>Suspend</option>
		                	</select>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>On Home* : </b></span>
		                <span class="right">
		                	<select name="is_home" class="add-status" style="width: 150px;">
		                		<option value="yes" <?php if($quest_info->is_home == 'yes'){echo "selected";}?>>Yes</option>
		                		<option value="no" <?php if($quest_info->is_home == 'no'){echo "selected";}?>>No</option>
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
$('#edit-question-form').iframer({
    onComplete: function(msg){
    	if(msg == 'yes') {
    		$('#light_adct').hide();$('#fade_adct').hide();
    		alert('Answer Successfully!');
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