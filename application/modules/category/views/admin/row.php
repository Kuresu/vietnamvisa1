	
						<div class="column" style="width:25%;" onmouseover="Hovercat('<?php echo $cate->id;?>')" onmouseout="Outcat('<?php echo $cate->id;?>')">
			            	<a href="javascript:;" class="art cate_name_<?php echo $cate->id;?>"><?php echo $cate->name;?></a><br />
			                <div class="action" id="neocat-<?php echo $cate->id;?>">
			                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-category/<?php echo $cate->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-category/<?php echo $cate->id;?>" onclick="return confirm('Do you want delete this category?');"><font color="#be0000">Delete</font></a>
			                </div>
			            </div>
			            <div class="column" style="width:30%;"><span style="color: green;"><?php echo $cate->url;?></span></div>
			            <div class="column" style="width:15%;"><span style="color: grey; font-weight: bold;"><?php if($cate->parent_id == 0){echo " _ _ ";}else {$parent = $this->category_model->get_match_parent($cate->parent_id); echo $parent['name'];}?></span></div>
			            <div class="column" style="width:15%;">
			            	<input type="text" name="order" id="<?php echo $cate->id;?>" class="order" value="<?php echo $cate->order;?>" maxlength="2" style="width:45px; float:left;" />
			            </div>
			            <div class="column" style="width:5%;">
			            <?php if($cate->status == 'yes'){?>
			            	<a href="javascript:void(0);" onclick="category_status('<?php echo $cate->id;?>', 'no', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
			            <?php }else{?>	
			            	<a href="javascript:void(0);" onclick="category_status('<?php echo $cate->id;?>', 'yes', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
			            <?php }?>
			            </div>
			            <div id="hidd" style="display: none;"><a href="#" class="admin_status"></a></div>