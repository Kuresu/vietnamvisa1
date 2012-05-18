					<div class="column" style="width:30%;" onmouseover="Hovercat('<?php echo $faq->id;?>')" onmouseout="Outcat('<?php echo $faq->id;?>')">
		            	<a href="javascript:;" class="art ">
		            		<?php 
		            			$content = $faq->question;
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
		                <div class="action" id="neocat-<?php echo $faq->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-faqs/<?php echo $faq->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-faqs/<?php echo $faq->id;?>" onclick="return confirm('Do you want delete this faq?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:40%;">
		            	<span style="color: green;">
		            		<?php 
		            			$content = $faq->answers;
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
		            <div class="column " style="width:10%;"><?php echo $faq->cate_name;?></div>
		            <div class="column" style="width:8%;">
		            	<input type="text" name="order" class="order" id="<?php echo $faq->id;?>" value="<?php echo $faq->order;?>" style="width:45px; float:left;" />
		            </div>
		            <div class="column" style="width:5%;">
		            <?php if($faq->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="faqs_status('<?php echo $faq->id;?>', 'no', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="faqs_status('<?php echo $faq->id;?>', 'yes', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
		            <?php }?>
		            </div>