					
					
					
					<div class="column" style="width:25%;" onmouseover="Hovercat('<?php echo $email->id;?>')" onmouseout="Outcat('<?php echo $email->id;?>')">
		            	<a href="javascript:;" class="art ">
		            		<?php 
		            			$content = $email->name;
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
		            	</a><br />
		                <div class="action" id="neocat-<?php echo $email->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-email/<?php echo $email->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-email/<?php echo $email->id;?>" onclick="return confirm('Do you want delete this email?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:25%;">
		            	<span style="color: green; font-family:inherit; font-style: italic; ">
		            		<?php 
		            			$content = $email->subject;
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
	            		</span>
		            </div>
		            <div class="column " style="width:38%; color: grey;">
		            	<?php 
				            	$content = $email->content;
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
		            </div>
		            <div class="column" style="width:5%;">
		            <?php if($email->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="email_status('<?php echo $email->id;?>', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="email_status('<?php echo $email->id;?>', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
		            <?php }?>
		            </div>