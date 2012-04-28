			
			<div class="column" style="width:15%;" onmouseover="Hovercat('<?php echo $admin->id;?>')" onmouseout="Outcat('<?php echo $admin->id;?>')">
            	<a href="javascript:;" class="art admin_name_<?php echo $admin->id;?>"><?php echo $admin->username;?></a><br />
                <div class="action" id="neocat-<?php echo $admin->id;?>">
                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" class="change-adminstrator" id="<?php echo $admin->id;?>" onclick ="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo base_url();?>home_admin/delete-adminstrator/<?php echo $admin->id;?>" onclick="return confirm('Do you want delete this account?');"><font color="#be0000">Delete</font></a>
                </div>
            </div>
            <div class="column" style="width:20%;"><span class="art admin_fullname_<?php echo $admin->id;?>"><?php echo $admin->fullname;?></span></div>
            <div class="column" style="width:20%;">
            	<a href="mailto:<?php echo $admin->email;?>" target="blank" class="art admin_email_<?php echo $admin->id;?>"><?php echo $admin->email;?></a>
            </div>
            <div class="column admin_group_<?php echo $admin->id;?>" style="width:13%;"><?php echo $admin->group;?></div>
            <div class="column" style="width:15%;"><font color="#FF0000"><?php echo $admin->time;?></div>
            <div class="column" style="width:8%;">
            	<?php if($admin->active == 'yes'){?>
            		<a href="javascript:void(0);" onclick="user_status('<?php echo $admin->id; ?>', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
            	<?php }else {?>
            		<a href="javascript:void(0);" onclick="user_status('<?php echo $admin->id; ?>', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
            	<?php }?>
           </div>