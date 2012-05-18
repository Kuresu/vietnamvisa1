<div class="editcate_top">
		    <h2>Add New Embassy:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/add-new-embassy" method="post" id="add-embassy-form">
			<div class="article_ct">
				<div class="btarticle">
			        <input type="submit" value="Save & Continute" class="btn add-new-embassy" />
		    	</div>
				<ul class="metatags">
					<li>
			        	<span class="left"><b>Address* : </b></span>
			            <span class="right"><input type="text" name="address" value="" style="width: 100%;"></span>
			        </li>
		            <li>
			        	<span class="left"><b>City : </b></span>
			            <span class="right"><input type="text" name="city" value="" style="width: 100%;"></span>
			        </li>
			        <li>
			        	<span class="left"><b>Phone* : </b></span>
			            <span class="right"><input type="text" name="phone" value="" style="width: 100%;"></span>
			        </li>
			        <li>
			        	<span class="left"><b>Fax : </b></span>
			            <span class="right"><input type="text" name="fax" value="" style="width: 100%;"></span>
			        </li>
			        <li>
			        	<span class="left"><b>Email : </b></span>
			            <span class="right"><input type="text" name="email" value="" style="width: 100%;"></span>
			        </li>
			        <li>
			        	<span class="left"><b>Note : </b></span>
			            <span class="right"><textarea name="note" id="note" style="width: 100%; height: 100px;"></textarea></span>
			        </li>
		            <li>
		                <span class="left"><b>Country* : </b></span>
		                <span class="right">
		                	<?php if(count($country[0])>0) {?>
			                	<select name="country" class="add-order" style="width: 150px;">
			                		<?php foreach ($country as $k => $v){?>
			                			<option value="<?php echo $v->id;?>"><?php echo $v->name;?></option>
			                		<?php }?>
			                	</select>
		                	<?php }?>
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
			        <input type="submit" value="Save & Continute" class="btn add-new-embassy" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#add-embassy-form').iframer({
    onComplete: function(msg){
    	if(msg == 'yes') {
    		$('#light_adct').hide();$('#fade_adct').hide();
    		alert('Add successfully!');
            window.location	=	admin_url+'embassy';
    	}
    	else show_error('div_message', msg)
    }
});
</script>