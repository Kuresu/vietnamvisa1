			
			
			
					<div class="column" style="width:30%;" onmouseover="Hovercat('<?php echo $country->id;?>')" onmouseout="Outcat('<?php echo $country->id;?>')">
		            	<a href="javascript:;" class="art "><?php echo $country->name;?></a><br />
		                <div class="action" id="neocat-<?php echo $country->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-country/<?php echo $country->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-country/<?php echo $country->id;?>" onclick="return confirm('Do you want delete this country?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:30%;">
		            	<span style="color: green;"><?php echo $country->continent;?></span>
		            </div>
		            <div class="column " style="width:25%;">
		            	<img style="margin: 5px 0 0 0;" title="<?php echo $country->name;?>" src="<?php if(file_exists($country->flag_icon)){echo base_url().$country->flag_icon;}else{echo base_url().'uploads/flag/noflag.png';} ?>" />
		            </div>
		            <div class="column" style="width:5%;">
		            <?php if($country->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="country_status('<?php echo $country->id;?>', 'no', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="country_status('<?php echo $country->id;?>', 'yes', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
		            <?php }?>
		            </div>