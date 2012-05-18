<div class="editcate_top">
		    <h2>Edit Country:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/edit-country/<?php echo $country_info->id;?>" method="post" id="edit-country-form" enctype="multipart/form-data">
			<div class="article_ct">
				<div class="btarticle">
			        <input type="submit" value="Save & Continute" class="btn edit-country-page" />
		    	</div>
				<ul class="metatags">
		            <li>
			        	<span class="left"><b>Country* : </b></span>
			            <span class="right"><input type="text" name="name" id="country" value="<?php echo $country_info->name;?>" style="width: 100%;" /></span>
			        </li>
			        <li>
			        	<span class="left"><b>Flag Icon* :</b><i style="font-size: 10px; color:green;">(Required: png & size 16 X 11 px or 5KB)</i></span>
			            <span class="right"><input type="file" name="flag_icon"  value="" style="width: 100%;"/></span>
			            <img style="padding: 0 0 0 10px;" title="<?php echo $country_info->name;?>" alt="" src="<?php echo base_url().$country_info->flag_icon;?>">
			        </li>
			        <li>
		                <span class="left"><b>Continent* : </b></span>
		                <span class="right">
		                	<select name="continent" class="" style="width: 150px;" >
			                	<option value="Africa" <?php if($country_info->continent == '"Africa'){echo "selected";}?>>Africa</option>
			                	<option value="America" <?php if($country_info->continent == 'America'){echo "selected";}?>>America</option>
			                	<option value="Asia" <?php if($country_info->continent == 'Asia'){echo "selected";}?>>Asia</option>
			                	<option value="Europe" <?php if($country_info->continent == 'Europe'){echo "selected";}?>>Europe</option>
			                	<option value="Oceania" <?php if($country_info->continent == 'Oceania'){echo "selected";}?>>Oceania</option>
			                </select>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>Status* : </b></span>
		                <span class="right">
		                	<select name="status" class="edit-status" style="width: 150px;">
		                		<option value="yes" <?php if($country_info->active == 'yes'){echo "selected";}?>>Active</option>
		                		<option value="no" <?php if($country_info->active == 'no'){echo "selected";}?>>Suspend</option>
		                	</select>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>Visa Required* : </b></span>
		                <span class="right">
		                	<select name="visa_required" class="edit-status" style="width: 150px;">
		                		<option value="yes" <?php if($country_info->required == 'yes'){echo "selected";}?>>Yes</option>
		                		<option value="no" <?php if($country_info->required == 'no'){echo "selected";}?>>No</option>
		                	</select>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>Show Off* : </b></span>
		                <span class="right">
		                	<select name="show_off" class="edit-status" style="width: 150px;">
		                		<option value="yes" <?php if($country_info->show_off == 'yes'){echo "selected";}?>>Yes</option>
		                		<option value="no" <?php if($country_info->show_off == 'no'){echo "selected";}?>>No</option>
		                	</select>
		                </span>
		            </li>
			    </ul>
			    <div style="display: none;">
			    	<input type="text" value="<?php echo $country_info->flag_icon;?>" name="flag_hidden" />
			    </div>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn edit-country-page" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#edit-country-form').iframer({
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