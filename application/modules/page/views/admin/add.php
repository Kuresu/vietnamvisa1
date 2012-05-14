<div class="editcate_top">
		    <h2>Add New Page:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/add-new-page" method="post" id="add-page-form">
			<div class="article_ct">
				<div class="btarticle">
			        <input type="submit" value="Save & Continute" class="btn add-new-page" />
		    	</div>
				<ul class="metatags">
			    	<li>
			        	<span class="left"><b>Name* : </b></span>
			            <span class="right"><input type="text" name="name" value="" style="width:100%;" id="add-name-page" /></span>
			        </li>
			        <li>
			        	<span class="left"><b>Title : </b></span>
			            <span class="right"><input type="text" name="title" value="" style="width:100%;" id="add-title-page" /></span>
			        </li>
			        <li>
			        	<span class="left"><b>Keyword : </b></span>
			            <span class="right"><input type="text" name="keyword" value="" style="width:100%;" id="add-keyword-page" /></span>
			        </li>
		            <li>
			        	<span class="left"><b>Description : </b></span>
			            <span class="right"><textarea name="description" id="add-des-page" style="width: 100%; height: 100px;"></textarea></span>
			        </li>
			        <?php if(count($cate_info)>0){?>
			        <li>
		                <span class="left"><b>Category : </b></span>
		                <span class="right">
			                	<select name="category[]" class="" style="width: 150px;" multiple="multiple" >
			                		<?php foreach($cate_info as $leaf) {?>
										<option value="<?php echo $leaf->id;?>">
											<?php
												for($i=0; $i<$leaf->level-1; $i++) {
													echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
												} 
												if($leaf->level>0) echo '&nbsp&nbsp&nbsp&nbsp|__ ';
												echo $leaf->name;
											?>
										</option>
									<?php }?>
			                	</select>
		                </span>
		            </li>
		            <?php }?>
		            <li>
		                <span class="left"><b>Order* : </b></span>
		                <span class="right">
		                	<select name="order" class="add-status" style="width: 150px;">
		                		<?php for($i=1; $i<=100; $i++){?>
		                		<option value="<?php echo $i;?>"><?php echo $i;?></option>
		                		<?php }?>
		                	</select>
		                </span>
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
		                <span class="left"><b>Hit : </b></span>
		                <span class="right">
		                	<select name="hit" class="add-hit" style="width: 150px;">
		                		<option value="yes" >Yes</option>
		                		<option value="no" selected="selected">No</option>
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
$('#add-page-form').iframer({
    onComplete: function(msg){
    	if(msg == 'yes') {
    		$('#light_adct').hide();$('#fade_adct').hide();
    		alert('Add successfully!');
            window.location	=	admin_url+'page';
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