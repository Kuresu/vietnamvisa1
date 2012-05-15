

					<div class="column" style="width:60%;" onmouseover="Hovercat('<?php echo $qcate->id;?>')" onmouseout="Outcat('<?php echo $qcate->id;?>')">
		            	<a href="javascript:;" class="art ">
		            		<?php 
		            			$content = $qcate->name;
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
		                <div class="action" id="neocat-<?php echo $qcate->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-qcate/<?php echo $qcate->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-qcate/<?php echo $qcate->id;?>" onclick="return confirm('Do you want delete this category?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:15%;">
		            	<input type="text" name="order" class="order" id="<?php echo $qcate->id;?>" value="<?php echo $qcate->order;?>" style="width:45px; float:left;" />
		            </div>
		            <div class="column" style="width:5%;">
		            <?php if($qcate->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="qcate_status('<?php echo $qcate->id;?>', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="qcate_status('<?php echo $qcate->id;?>', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
		            <?php }?>
		            </div>