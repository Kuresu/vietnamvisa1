
	<h1>Categories Manager</h1>
	<form action="<?php echo admin_url(); ?>/category/search-results" method="post" id="cate-search">
	    <div class="toppage">
	    	<span class="left">
	        	<select style="width: 130px;" id="action">
	            	<option value="">Choose action</option>                               
	                <option value="active">Activate</option>
	                <option value="suspend">Deactivate</option>
	                <option value="delete">Delete</option>
	            </select>
	            <input onclick="$('[name=action]').val($('#action').val()); $('#cate_form').submit()" value="Apply" class="btn" type="button">
	       		<input type="text" name="search" onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}"  value="Search..." style="width:165px; padding:3px;" />
	        	<input type="submit" name="" value="Search" class="btn" />
	        	
	        </span>
	       
	        <span class="btnadd">
	        	<a onclick="open_form('<?php echo admin_url(); ?>/add-new-category')" href="javascript:void(0)">Add new category</a>
	        </span>
	    </div>
    </form>
    <form action="<?php echo admin_url();?>/category" method="post" id="list_categories_form">
	    <div class="topart">
	    	<span class="left">
	    		<?php 
	    			$total_amount	=	count($this->category_model->get_all_cate());
	    			$active			=	$this->category_model->count_active();
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
    	<form action="<?php echo admin_url();?>/category/do-action" method="post" id="cate_form">
			<div class="title1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all('.check_all')" type="checkbox"></div>
	            <div class="column" style="width: 4%;">No.</div>
	            <div class="column" style="width: 25%;">Name</div>
	            <div class="column" style="width: 30%;">Url</div>
	            <div class="column" style="width: 15%;">Parent</div>
	            <div class="column" style="width: 15%;">Order</div>
	            <div class="column" style="width: 5%;">Status</div>
	        </div>
	        <?php if(isset($cate_list)){?>
		        <?php foreach ($cate_list as $k => $v){?>
		        <div class="linecate2">
		        	<div class="column" style="width: 2%;"><input name="id[]" value="<?php echo $v->id;?>" type="checkbox" /></div>
		            <div class="column" style="width:4%;"><?php $pagin	=	$this->uri->segment(3); if(isset($pagin)){echo $k+1+$pagin;}?></div>
		            
		            <div id="row_<?php echo $v->id;?>">
			            <div class="column" style="width:25%;" onmouseover="Hovercat('<?php echo $v->id;?>')" onmouseout="Outcat('<?php echo $v->id;?>')">
			            	<a href="javascript:;" class="art cate_name_<?php echo $v->id;?>"><?php echo $v->name;?></a><br />
			                <div class="action" id="neocat-<?php echo $v->id;?>">
			                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-category/<?php echo $v->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-category/<?php echo $v->id;?>" onclick="return confirm('Do you want delete this category?');"><font color="#be0000">Delete</font></a>
			                </div>
			            </div>
			            <div class="column" style="width:30%;"><span style="color: green;"><?php echo $v->url;?></span></div>
			            <div class="column" style="width:15%;"><span style="color: grey; font-weight: bold;"><?php if($v->parent_id == 0){echo " _ _ ";}else {$parent = $this->category_model->get_match_parent($v->parent_id); echo $parent['name'];}?></span></div>
			            <div class="column" style="width:15%;">
			            	<input type="text" name="order" id="<?php echo $v->id;?>" class="order" value="<?php echo $v->order;?>" maxlength="2" style="width:45px; float:left;" />
			            </div>
			            <div class="column" style="width:5%;">
			            <?php if($v->status == 'yes'){?>
			            	<a href="javascript:void(0);" onclick="category_status('<?php echo $v->id;?>', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
			            <?php }else{?>	
			            	<a href="javascript:void(0);" onclick="category_status('<?php echo $v->id;?>', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
			            <?php }?>
			            </div>
			            <div id="hidd" style="display: none;"><a href="#" class="admin_status"></a></div>
		            </div>
		        </div>
		        <?php }?>
	        <?php } else {?>
	        	<div class="column" style="width: 2%;"><span>There are no match result</span></div>
	        <?php }?>
	        <div class="bottom1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all(this)" type="checkbox"></div>
	            <div class="column" style="width:50%;">
	            	<select style="width:130px;" name="action">
	                   	<option value="">Choose action</option>                               
                		<option value="active">Activate</option>
                		<option value="suspend">Deactivate</option>
                		<option value="delete">Delete</option>
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
		$("#list_categories_form").submit();
	}


	var inform	=	'no';
	if(inform == 'edit cate success'){alert("Edit Successfully !");}

	$('#cate_form').iframer({
	    onComplete: function(msg){
	    	if(msg == 'yes') {
	    		window.location	=	admin_url+'category';
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
	            var cate_order = $(this).val();
	            var cate_id = $(this).attr('id');
	            $('input[name="category_id"]').val(cate_id);
	            $('input[name="category_order"]').val(cate_order);
	            $('#change_order_cate').submit();
        	}
        });
	})
</script>
<?php
    echo form_open(admin_url('category/change-order'), array('id' => 'change_order_cate'), array('category_id' => 0, 'category_order' => 0));
    echo form_close();
?>

	