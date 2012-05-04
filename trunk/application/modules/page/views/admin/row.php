


			<div class="linecate2">
	        	<div class="column" style="width: 2%;"><input name="id[]" value="<?php echo $page->id;?>" type="checkbox" /></div>
	            <div class="column" style="width:4%;"><?php echo $k;?></div>
	            
	            <div id="row_<?php echo $page->id;?>">
		            <div class="column" style="width:25%;" onmouseover="Hovercat('<?php echo $page->id;?>')" onmouseout="Outcat('<?php echo $page->id;?>')">
		            	<a href="javascript:;" class="art "><?php echo $page->name;?></a><br />
		                <div class="action" id="neocat-<?php echo $page->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick ="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/icon_view.png" class="png" /><a href="#">View</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="#"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:40%;">
		            	<a href="#" target="blank" class="art">
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
		            	</a>
		            </div>
		            <div class="column " style="width:15%;"><?php echo $page->cate_name;?></div>
		            <div class="column" style="width:8%;">
		            	<input type="text" name="order" value="<?php echo $page->order;?>" style="width:45px; float:left;" />
		            </div>
		            <div class="column" style="width:5%;">
		            <?php if($page->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="page_status('<?php echo $page->id;?>', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="page_status('<?php echo $page->id;?>', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
		            <?php }?>
		            </div>
	            </div>
	        </div>