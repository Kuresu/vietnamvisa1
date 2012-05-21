					
					
					<div class="column" style="width:20%;" onmouseover="Hovercat('<?php echo $testimonials->id;?>')" onmouseout="Outcat('<?php echo $testimonials->id;?>')">
		            	<a href="javascript:;" class="art ">
		            		<?php echo $testimonials->name;?>
		            	</a><br />
		                <div class="action" id="neocat-<?php echo $testimonials->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-testimonials/<?php echo $testimonials->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-testimonials/<?php echo $testimonials->id;?>" onclick="return confirm('Do you want delete this testimonials?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:30%;">
		            	<span style="color: green; font-family:inherit; font-style: italic; ">
		            		<?php 
		            			$content = $testimonials->content;
		            			$content = strip_tags($content);
		            			if(strlen($content) > 60){
		            				$content = substr($content,0,60);
		            				$posw=strrpos($content," ");
		            				if($posw > 0)$content = substr($content,0,$posw);
		            				echo $content.'...';
		            			}else {
		            				echo $content;
		            			}
		            		?>
	            		</span>
		            </div>
		            <div class="column " style="width:13%; color: grey;"><?php echo $testimonials->country;?></div>
		            <div class="column " style="width:10%; padding: 5px 0 0 0;">
		            	<?php for($i =1; $i <= 5; $i ++){ if($testimonials->rating == $i){?>
		            		<img alt="" src="<?php echo base_url();?>public/admin/img/<?php echo $i.'_star_small.gif';?>">
		            	<?php }}?>
		            </div>
		            <div class="column " style="width:16%; color: grey;"><?php echo $testimonials->time;?></div>
		            <div class="column" style="width:5%;">
		            <?php if($testimonials->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="testimonials_status('<?php echo $testimonials->id;?>', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="testimonials_status('<?php echo $testimonials->id;?>', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
		            <?php }?>
		            </div>