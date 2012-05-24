<div class="editcate_top">
		    <h2>Add New Country:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/add-new-country" method="post" id="add-country-form" enctype="multipart/form-data">
			<div class="article_ct">
				<div class="btarticle">
			        <input type="submit" value="Save & Continute" class="btn add-country-page" />
		    	</div>
				<ul class="metatags">
		            <li>
			        	<span class="left"><b>Country* : </b></span>
			            <span class="right"><input type="text" name="name" id="country" style="width: 100%;" /></span>
			        </li>
			        <li>
			        	<span class="left"><b>Flag Icon* :</b><i style="font-size: 10px; color:green;">(Required: png & size 16 X 11 px or 5KB)</i></span>
			            <span class="right"><input type="file" name="flag_icon"  value="" style="width: 100%;"/></span>
			        </li>
			        <li>
		                <span class="left"><b>Continent* : </b></span>
		                <span class="right">
		                	<select name="continent" class="" style="width: 150px;" >
			                	<option value="africa">Africa</option>
			                	<option value="america">America</option>
			                	<option value="asia">Asia</option>
			                	<option value="europe">Europe</option>
			                	<option value="oceania">Oceania</option>
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
		                <span class="left"><b>Visa Required* : </b></span>
		                <span class="right">
		                	<select name="visa_required" class="add-status" style="width: 150px;">
		                		<option value="yes" selected="selected">Yes</option>
		                		<option value="no">No</option>
		                	</select>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>Allow To Vietnam* : </b></span>
		                <span class="right">
		                	<select name="show_off" class="add-status" style="width: 150px;">
		                		<option value="yes" selected="selected">Yes</option>
		                		<option value="no">No</option>
		                	</select>
		                </span>
		            </li>
			    </ul>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn add-country-page" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#add-country-form').iframer({
    onComplete: function(msg){
    	if(msg == 'yes') {
    		$('#light_adct').hide();$('#fade_adct').hide();
    		alert('Add successfully!');
            window.location	=	admin_url+'country';
    	}
    	else show_error('div_message', msg)
    }
});
</script>