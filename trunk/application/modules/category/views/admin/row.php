	
			<div class="column" style="width:15%;" onmouseover="Hovercat('<?php echo $cate->id;?>')" onmouseout="Outcat('<?php echo $cate->id;?>')">
            	<a href="javascript:;" class="art admin_name_<?php echo $cate->id;?>"><?php echo $cate->username;?></a><br />
                <div class="action" id="neocat-<?php echo $cate->id;?>">
                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" class="change-adminstrator" id="<?php echo $cate->id;?>" onclick ="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo base_url();?>home_admin/delete-adminstrator/<?php echo $cate->id;?>" onclick="return confirm('Do you want delete this account?');"><font color="#be0000">Delete</font></a>
                </div>
            </div>
            <div class="column" style="width:20%;"><span class="art admin_fullname_<?php echo $cate->id;?>"><?php echo $cate->fullname;?></span></div>
            <div class="column" style="width:20%;">
            	<a href="mailto:<?php echo $cate->email;?>" target="blank" class="art admin_email_<?php echo $cate->id;?>"><?php echo $cate->email;?></a>
            </div>
            <div class="column admin_group_<?php echo $cate->id;?>" style="width:13%;"><?php echo $cate->group;?></div>
            <div class="column" style="width:15%;"><font color="#FF0000"><?php echo $cate->time;?></div>
            <div class="column" style="width:8%;">
            	<?php if($cate->status == 'yes'){?>
            		<a href="javascript:void(0);" onclick="user_status('<?php echo $cate->id; ?>', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
            	<?php }else {?>
            		<a href="javascript:void(0);" onclick="user_status('<?php echo $cate->id; ?>', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
            	<?php }?>
           </div>