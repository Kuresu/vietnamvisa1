				<div class="column" style="width:25%;" onmouseover="Hovercat('<?php echo $page->id;?>')" onmouseout="Outcat('<?php echo $page->id;?>')">
		            	<a href="javascript:;" class="art "><?php echo $page->name;?></a><br />
		                <div class="action" id="neocat-<?php echo $page->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-page/<?php echo $page->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/icon_view.png" class="png" /><a href="#">View</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/page/delete-page/<?php echo $page->id;?>" onclick="return confirm('Do you want delete this page?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:20%">
		            	<?php echo $page->url;?>
		            </div>
		            <div class="column" style="width:20%;">
		            	<span style="color: grey;">
		            		<?php 
		            			$content = $page->description;
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
		            <div class="column " style="width:15%;color: navy;"><?php echo $page->cate_name;?></div>
		            <div class="column" style="width:8%;">
		            	<input type="text" name="order" class="order" id="<?php echo $page->id;?>" value="<?php echo $page->order;?>" style="width:45px; float:left;" />
		            </div>
		            <div class="column" style="width:5%;">
		            <?php if($page->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="page_status('<?php echo $page->id;?>', 'no', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="page_status('<?php echo $page->id;?>', 'yes', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
		            <?php }?>
		            </div>