<div class="editcate_top">
		    <h2>Add New Meta Tag:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/add-new-tags" method="post" id="add-tags-form">
			<div class="article_ct">
				<div class="btarticle">
			        <input type="submit" value="Save & Continute" class="btn" />
		    	</div>
				<ul class="metatags">
			    	<li>
			        	<span class="left"><b>Name* : </b></span>
			            <span class="right"><input type="text" name="name" value="" style="width:100%;"  /></span>
			        </li>
			        <li>
			        	<span class="left"><b>Title* : </b></span>
			            <span class="right"><textarea name="title" id="title" style="width: 100%; height: 100px;"></textarea></span>
			        </li>
			        <li>
			        	<span class="left"><b>Keywords* : </b></span>
			            <span class="right"><textarea name="keywords" id="keywords" style="width: 100%; height: 100px;"></textarea></span>
			        </li>
			        <li>
			        	<span class="left"><b>Description* : </b></span>
			            <span class="right"><textarea name="description" id="description" style="width: 100%; height: 100px;"></textarea></span>
			        </li>               
			    </ul>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn add-new-page" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#add-tags-form').iframer({
    onComplete: function(msg){
    	if(msg == 'yes') {
    		$('#light_adct').hide();$('#fade_adct').hide();
    		alert('Add successfully!');
            window.location	=	admin_url+'tags';
    	}
    	else show_error('div_message', msg)
    }
});
</script>