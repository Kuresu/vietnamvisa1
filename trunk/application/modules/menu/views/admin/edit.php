<div class="editcate_top">
		    <h2>Edit Menu:</h2>
		    <a href = "javascript:void(0)" onclick ="document.getElementById('light_adct').style.display='none';document.getElementById('fade_adct').style.display='none'"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/edit-menu/<?php echo $menu_info->id; ?>" method="post" id="user_form">
			<div class="article_ct">
				<ul class="metatags">
			    	<li>
			        	<span class="left"><b>Name* : </b></span>
			            <span class="right"><input type="text" name="name" value="<?php echo $menu_info->name;?>" style="width:98%;" id="add-name-cate" /></span>
			        </li>
			        <li>
			        	<span class="left"><b>Url : </b></span>
			            <span class="right"><input type="text" name="url" value="<?php echo $menu_info->url;?>" style="width:98%;" id="add-url" /></span>
			        </li>
			        <li>
		                <span class="left"><b>Parent* : </b></span>
		                <span class="right">
		                	<select name="parent" class="add-parent" style="width: 150px;">
		                	<option value="0">Parent</option>
		                	<?php if(count($tree_cate)>0){?>
		                		<?php foreach($tree_cate as $leaf) {?>
									<option value="<?php echo $leaf->id;?>" <?php if($leaf->id == $menu_info->parent_id){echo "selected";}?>>
										<?php
											for($i=0; $i<$leaf->level-1; $i++) {
												echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
											} 
											if($leaf->level>0) echo '&nbsp&nbsp&nbsp&nbsp|__ ';
											echo $leaf->name;
										?>
									</option>
								<?php }?>
		                	<?php }?>	
		                	</select>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>Order* : </b></span>
		                <span class="right">
		                	<select name="order" class="add-status" style="width: 150px;">
		                		<?php for($i=1; $i<=100; $i++){?>
		                		<option value="<?php echo $i;?>" <?php if($menu_info->order == $i){echo "selected";}?> ><?php echo $i;?></option>
		                		<?php }?>
		                	</select>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>Status* : </b></span>
		                <span class="right">
		                	<select name="status" class="add-status" style="width: 150px;">
		                		<option value="yes" <?php if($menu_info->active == 'yes'){echo "selected";}?>>Active</option>
		                		<option value="no" <?php if($menu_info->active == 'no'){echo "selected";}?>>Suspend</option>
		                	</select>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>On Header* : </b></span>
		                <span class="right">
		                	<select name="on_top" class="add-status" style="width: 150px;">
		                		<option value="yes" <?php if($menu_info->on_top == 'yes'){echo "selected";}?>>Yes</option>
		                		<option value="no" <?php if($menu_info->on_top == 'no'){echo "selected";}?>>No</option>
		                	</select>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>On Menubar* : </b></span>
		                <span class="right">
		                	<select name="on_menubar" class="add-status" style="width: 150px;">
		                		<option value="yes" <?php if($menu_info->on_menubar == 'yes'){echo "selected";}?>>Yes</option>
		                		<option value="no" <?php if($menu_info->on_menubar == 'no'){echo "selected";}?>>No</option>
		                	</select>
		                </span>
		            </li>
		            <li>
		                <span class="left"><b>At Bottom* : </b></span>
		                <span class="right">
		                	<select name="at_bottom" class="add-status" style="width: 150px;">
		                		<option value="yes" <?php if($menu_info->at_bottom == 'yes'){echo "selected";}?>>Yes</option>
		                		<option value="no" <?php if($menu_info->at_bottom == 'no'){echo "selected";}?>>No</option>
		                	</select>
		                </span>
		            </li>              
			    </ul>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
			        <input type="submit" value="Save & Continute" class="btn add-new-category" />
		    	</div>
			</div>
		</form>
<script type="text/javascript">
$('#user_form').iframer({
    onComplete: function(msg){
    	if(msg == 'yes') {
    		$('#light_adct').hide();$('#fade_adct').hide();
    		alert('Edit successfully!');
            window.location	=	'<?php echo $current_url;?>';
    	}
    	else show_error('div_message', msg)
    }
});
</script>