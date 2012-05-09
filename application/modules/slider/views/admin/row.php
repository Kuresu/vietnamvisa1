
		            <div class="column" style="width:25%;" onmouseover="Hovercat('<?php echo $slider->id;?>')" onmouseout="Outcat('<?php echo $slider->id;?>')">
		            	<a href="javascript:;" class="art "><?php echo $slider->name;?></a><br />
		                <div class="action" id="neocat-<?php echo $slider->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-slide/<?php echo $slider->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-slide/<?php echo $slider->id;?>" onclick="return confirm('Do you want delete this slide?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column small_thumb " style="width:15%; padding: 5px 0px 0px 0px;">
		            	<img src="<?php if(file_exists($slider->thumbnail)){echo base_url().$slider->thumbnail;}else{echo img_link('no-image.jpg','admin');}?>" width="50"  />
		            	
		            		<div class="fullsize_thumb">
								<img  src="<?php if(file_exists($slider->source)){echo base_url().$slider->source;}else{echo img_link('no-image.jpg','admin');}?>"  style="border:0px; width: 150px;"  alt="" title=""/>
							</div>
		            	
		            </div>
		            <div class="column" style="width:40%;">
		            	<span style="color: green;">
		            		<?php 
		            			$content = $slider->description;
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
		            <div class="column" style="width:8%;">
		            	<input type="text" name="order" class="order" id="<?php echo $slider->id;?>" value="<?php echo $slider->order;?>" style="width:45px; float:left;" />
		            </div>
		            <div class="column" style="width:5%;">
		            <?php if($slider->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="slider_status('<?php echo $slider->id;?>', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="slider_status('<?php echo $slider->id;?>', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
		            <?php }?>
		            </div>