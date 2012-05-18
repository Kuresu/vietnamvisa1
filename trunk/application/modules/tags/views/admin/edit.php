<div class="editcate_top">
		    <h2>Edit Meta Tag:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/edit-tags/<?php echo $tag_info->id; ?>" method="post" id="edit-tags-form">
			<div class="article_ct">
				<div class="btarticle">
			        <input type="submit" value="Save & Continute" class="btn" />
		    	</div>
				<ul class="metatags">
			    	<li>
			        	<span class="left"><b>Name* : </b></span>
			            <span class="right"><input type="text" name="name" value="<?php echo $tag_info->page;?>" style="width:100%;"  /></span>
			        </li>
			        <li>
			        	<span class="left"><b>Title* : </b></span>
			            <span class="right"><textarea name="title" id="title" style="width: 100%; height: 100px;"><?php echo $tag_info->title;?></textarea></span>
			        </li>
			        <li>
			        	<span class="left"><b>Keywords* : </b></span>
			            <span class="right"><textarea name="keywords" id="keywords" style="width: 100%; height: 100px;"><?php echo $tag_info->keywords;?></textarea></span>
			        </li>
			        <li>
			        	<span class="left"><b>Description* : </b></span>
			            <span class="right"><textarea name="description" id="description" style="width: 100%; height: 100px;"><?php echo $tag_info->description;?></textarea></span>
			        </li>               
			    </ul>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#edit-tags-form').iframer({
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