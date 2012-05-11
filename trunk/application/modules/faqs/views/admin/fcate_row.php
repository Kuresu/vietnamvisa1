

					<div class="column" style="width:60%;" onmouseover="Hovercat('<?php echo $fcate->id;?>')" onmouseout="Outcat('<?php echo $fcate->id;?>')">
		            	<a href="javascript:;" class="art ">
		            		<?php 
		            			$content = $fcate->name;
		            			$content = strip_tags($content);
		            			if(strlen($content) > 80){
		            				$content = substr($content,0,80);
		            				$posw=strrpos($content," ");
		            				if($posw > 0)$content = substr($content,0,$posw);
		            				echo $content.'...';
		            			}else {
		            				echo $content;
		            			}
		            		?>
		            	</a><br />
		                <div class="action" id="neocat-<?php echo $fcate->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-fcate/<?php echo $fcate->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-fcate/<?php echo $fcate->id;?>" onclick="return confirm('Do you want delete this category?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:15%;">
		            	<input type="text" name="order" class="order" id="<?php echo $fcate->id;?>" value="<?php echo $fcate->order;?>" style="width:45px; float:left;" />
		            </div>
		            <div class="column" style="width:5%;">
		            <?php if($fcate->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="fcate_status('<?php echo $fcate->id;?>', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="fcate_status('<?php echo $fcate->id;?>', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
		            <?php }?>
		            </div>