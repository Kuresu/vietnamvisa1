
	<h1>Menu Manager</h1>
	<form action="<?php echo admin_url();?>/menu" method="post" id="list_menu_form">
	    <div class="toppage">
	    	<span class="left">
	        	<select style="width: 130px;" id="action">
	            	<option value="">Choose action</option>                               
	                <option value="active">Activate</option>
	                <option value="suspend">Deactivate</option>
	            </select>
	            <input onclick="$('[name=action]').val($('#action').val()); $('#menu_form').submit()" value="Apply" class="btn" type="button">
	       		<?php if(count($cate_info)>0){?>
                	<select name="item_parent" class="" style="width: 150px;" >
                		<option value="-1" <?php echo ($current_filter_parent==-1)?'selected':0;?>>List all</option>
                		<option value="0" <?php echo ($current_filter_parent==0)?'selected':'';?>>Parents</option>
                		<?php foreach($cate_info as $leaf) {?>
						<option value="<?php echo $leaf->id;?>" <?php echo ($current_filter_parent==$leaf->id)?'selected':'';?>>
							<?php
								for($i=0; $i<$leaf->level-1; $i++) {
									echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
								} 
								if($leaf->level>0) echo '&nbsp&nbsp&nbsp&nbsp|__ ';
								echo $leaf->name;
							?>
						</option>
					<?php }?>
                	</select>
            	<?php }?>
	        	<input type="submit" name="" value="Filter by parents" class="btn" />
	        	
	        </span>
	       
	        <span class="btnadd">
	        	<a onclick="open_form('<?php echo admin_url(); ?>/add-new-menu')" href="javascript:void(0)">Add new menu</a>
	        </span>
	    </div>
	    <div class="topart">
	    	<span class="left">
	    		<?php 
	    			$total_amount	=	count($this->menu_model->get_all());
	    			$active			=	$this->menu_model->count_active();
	    		?>
	    		<font class="number">(<?php echo $total_amount;?>)</font> <a href="javascript:;">All</a><font class="line">|</font><font class="number">(<?php echo $active;?>)</font> <a href="javascript:;"><font color="#0b9901">Active</font></a><font class="line">|</font><font class="number">(<?php echo $total_amount - $active;?>)</font> <a href="javascript:;"><font color="#c60001">Pending</font></a>
	        </span>
	        <span class="right1">
	        	<select style="width:50px;" name="perpage" id="perpage" onchange="changeItemNumber()">
	            	<option value="6" <?php echo ($current_perpage==6)?'selected':'';?>>6</option>
	                <option value="12" <?php echo ($current_perpage==12)?'selected':'';?>>12</option>
	                <option value="24" <?php echo ($current_perpage==24)?'selected':'';?>>24</option>
	                <option value="all" <?php echo ($current_perpage=='all')?'selected':'';?>>All</option>
	            </select>
	            <div class="pagination">
	                <?php if(isset($pagination)){echo $pagination;}?>
	            </div>
	        </span>
	        
	    </div>
	</form>
    <div class="tableout">
    	<form action="<?php echo admin_url();?>/menu/do-action" method="post" id="menu_form">
			<div class="title1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all('.check_all')" type="checkbox"></div>
	            <div class="column" style="width: 4%;">No.</div>
	            <div class="column" style="width: 25%;">Name</div>
	            <div class="column" style="width: 30%;">Url</div>
	            <div class="column" style="width: 25%;">Parent</div>
	            <div class="column" style="width: 8%;">Order</div>
	            <div class="column" style="width: 5%;">Status</div>
	        </div>
	        <?php if(isset($menu_list[0])){?>
		        <?php foreach ($menu_list as $k => $v){?>
		        <div class="linecate2">
		        	<div class="column" style="width: 2%;"><input name="id[]" value="<?php echo $v->id;?>" type="checkbox" /></div>
		            <div class="column" style="width:4%;"><?php $pagin	=	$this->uri->segment(3); if(isset($pagin)){echo $k+1+$pagin;}?></div>
		            
		            <div id="row_<?php echo $v->id;?>">
			            <div class="column" style="width:25%;" onmouseover="Hovercat('<?php echo $v->id;?>')" onmouseout="Outcat('<?php echo $v->id;?>')">
			            	<a href="javascript:;" class="art cate_name_<?php echo $v->id;?>"><?php echo $v->name;?></a><br />
			                <div class="action" id="neocat-<?php echo $v->id;?>">
			                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-menu/<?php echo $v->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-menu/<?php echo $v->id;?>" onclick="return confirm('Do you want delete this menu?');"><font color="#be0000">Delete</font></a>
			                </div>
			            </div>
			            <div class="column" style="width:30%;"><span style="color: green;"><?php echo $v->url;?></span></div>
			            <div class="column" style="width:25%;"><span style="color: grey; font-weight: bold;"><?php if($v->parent_name == ""){echo " _ _ ";}else {echo $v->parent_name;}?></span></div>
			            <div class="column" style="width:8%;">
			            	<input type="text" name="order" id="<?php echo $v->id;?>" class="order" value="<?php echo $v->order;?>" maxlength="2" style="width:45px; float:left;" />
			            </div>
			            <div class="column" style="width:5%;">
			            <?php if($v->active == 'yes'){?>
			            	<a href="javascript:void(0);" onclick="menu_status('<?php echo $v->id;?>', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
			            <?php }else{?>	
			            	<a href="javascript:void(0);" onclick="menu_status('<?php echo $v->id;?>', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
			            <?php }?>
			            </div>
		            </div>
		        </div>
		        <?php }?>
	        <?php } else {?>
	        	<p style="padding: 10px;font-size: 16px; font-style: italic; color: green;" >There are no results match !</p>
	        <?php }?>
	        <div class="bottom1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all(this)" type="checkbox"></div>
	            <div class="column" style="width:50%;">
	            	<select style="width:130px;" name="action">
	                   	<option value="">Choose action</option>                               
                		<option value="active">Activate</option>
                		<option value="suspend">Deactivate</option>
	                </select>
	                <input type="submit" name="" value="Apply" class="btn" />
	            </div>
	            <span class="right1">
	                <div class="pagination">
	                <?php if(isset($pagination)){echo $pagination;}?>
	            </div>
	            </span>
	        </div>
        </form>
	</div>
	
<script type="text/javascript">
	function changeItemNumber() {
		$("#list_menu_form").submit();
	}


	var inform	=	'<?php echo $inform;?>';
	if(inform == 'delete menu success'){alert("Delete Successfully !");}

	$('#menu_form').iframer({
	    onComplete: function(msg){
	    	if(msg == 'yes') {
		    	alert('The Action has been successfully executed!');
	    		window.location	=	'<?php echo $current_url;?>';
	    	}
	    	else show_error('div_message', msg)
	    }
	});

	$(function(){
		$('.order').keydown(function(event){
        	if ( event.keyCode == 46 || event.keyCode == 8 ) {
                // let it happen, don't do anything
            }else{
                // Ensure that it is a number and stop the keypress
                if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                    event.preventDefault(); 
                }   
            }
			
            if(event.keyCode == 13) { // Enter pressed
	            var menu_order = $(this).val();
	            var menu_id = $(this).attr('id');
	            $('input[name="menu_id"]').val(menu_id);
	            $('input[name="menu_order"]').val(menu_order);
	            $('#change_order_menu').submit();
        	}
        });
	})
</script>
<?php
    echo form_open(admin_url('menu/change-order'), array('id' => 'change_order_menu'), array('menu_id' => 0, 'menu_order' => 0));
    echo form_close();
?>

	