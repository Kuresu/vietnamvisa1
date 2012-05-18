			
			
			
			
					<div class="column" style="width:13%;" onmouseover="Hovercat('<?php echo $embassy->id;?>')" onmouseout="Outcat('<?php echo $embassy->id;?>')">
		            	<a href="javascript:;" class="art ">
		            		<?php 
		            			$country = $this->embassy_model->get_match_country($embassy->id_country);
		            			echo $country['name'];
		            		?>
		            	</a><br />
		                <div class="action" id="neocat-<?php echo $embassy->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-embassy/<?php echo $embassy->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-embassy/<?php echo $embassy->id;?>" onclick="return confirm('Do you want delete this embassy?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:30%;color:green;">
		            	<span>
		            	<?php 
			            	$content = $embassy->address;
			            	$content = strip_tags($content);
			            	if(strlen($content) > 50){
			            		$content = substr($content,0,50);
			            		$posw=strrpos($content," ");
			            		if($posw > 0)$content = substr($content,0,$posw);
			            		echo $content.'...';
			            	}else {
			            		echo $content;
			            	}
		            	?>
		            	</span>
		            </div>
		            <div class="column" style="width:20%;color: grey;">
		            	<span><?php echo $embassy->phone;?></span>
		            </div>
		            <div class="column" style="width:25%;color: navy;">
		            	<span><?php echo $embassy->email;?></span>
		            </div>
		            <div class="column" style="width:5%;">
		            <?php if($embassy->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="embassy_status('<?php echo $embassy->id;?>', 'no', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="embassy_status('<?php echo $embassy->id;?>', 'yes', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
		            <?php }?>
		            </div>