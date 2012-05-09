<div class="editcate_top">
		    <h2>Add New Slide:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/add-new-slider" method="post" id="add-slide-form" enctype="multipart/form-data">
			<div class="article_ct">
				<ul class="metatags">
			    	<li>
			        	<span class="left"><b>Name* : </b></span>
			            <span class="right"><input type="text" name="name" value="" style="width:100%;" id="add-name-page" /></span>
			        </li>
			        <li>
			        	<span class="left"><b>Source* :</b><i style="font-size: 10px; color:green;">(Required: jpg, png, jpeg, gif & maximum 2MB)</i></span>
			            <span class="right"><input type="file" name="slide"  value="" style="width: 100%;"/></span>
			        </li>
		            <li>
			        	<span class="left"><b>Description : </b></span>
			            <span class="right"><textarea name="description" id="add-des-page" style="width: 100%; height: 100px;"></textarea></span>
			        </li>
		            <li>
		                <span class="left"><b>Order* : </b></span>
		                <span class="right">
		                	<select name="order" class="add-order" style="width: 150px;">
		                		<?php for($i=1; $i<=20; $i++){?>
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
			    </ul>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn add-new-page" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#add-slide-form').iframer({
    onComplete: function(msg){
    	if(msg == 'yes') {
    		$('#light_adct').hide();$('#fade_adct').hide();
    		alert('Add successfully!');
            window.location	=	admin_url+'slider';
    	}
    	else show_error('div_message', msg)
    }
});
</script>