

						<div class="column" style="width:25%;" onmouseover="Hovercat('<?php echo $menu->id;?>')" onmouseout="Outcat('<?php echo $menu->id;?>')">
			            	<a href="javascript:;" class="art cate_name_<?php echo $menu->id;?>"><?php echo $menu->name;?></a><br />
			                <div class="action" id="neocat-<?php echo $menu->id;?>">
			                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-menu/<?php echo $menu->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-category/<?php echo $menu->id;?>" onclick="return confirm('Do you want delete this category?');"><font color="#be0000">Delete</font></a>
			                </div>
			            </div>
			            <div class="column" style="width:30%;"><span style="color: green;"><?php echo $menu->url;?></span></div>
			            <div class="column" style="width:25%;"><span style="color: grey; font-weight: bold;"><?php if($menu->parent_id == 0){echo " _ _ ";}else {$parent = $this->menu_model->get_match_parent($menu->parent_id); echo $parent['name'];}?></span></div>
			            <div class="column" style="width:8%;">
			            	<input type="text" name="order" id="<?php echo $menu->id;?>" class="order" value="<?php echo $menu->order;?>" maxlength="2" style="width:45px; float:left;" />
			            </div>
			            <div class="column" style="width:5%;">
			            <?php if($menu->active == 'yes'){?>
			            	<a href="javascript:void(0);" onclick="menu_status('<?php echo $menu->id;?>', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
			            <?php }else{?>	
			            	<a href="javascript:void(0);" onclick="menu_status('<?php echo $menu->id;?>', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
			            <?php }?>
			            </div>