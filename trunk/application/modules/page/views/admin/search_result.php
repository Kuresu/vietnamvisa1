
	<h1>Page Manager</h1>
	<form action="<?php echo admin_url();?>/page/search-results" method="post" >
    <div class="toppage">
    	<span class="left">
        	<select style="width: 130px;" id="action">
            	<option value="">Choose action</option>                               
                <option value="active">Activate</option>
                <option value="suspend">Deactivate</option>
                <option value="delete">Delete</option>
            </select>
            <input onclick="$('[name=action]').val($('#action').val()); $('#action_page_form').submit()" value="Apply" class="btn" type="button">
       		<?php if(count($cate_info)>0){?>
                	<select name="category" class="" style="width: 150px;" >
                		<option value="all">List all</option>
                		<?php foreach($cate_info as $leaf) {?>
						<option value="<?php echo $leaf->id;?>" <?php if($cate_id == $leaf->id){echo "selected";}?>>
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
       		<input type="text" name="search" onfocus="if (this.value == 'Keyword') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Keyword';}"  value="<?php if(isset($keyword)){echo $keyword;}else{echo "Keyword";}?>" style="width:165px; padding:3px;" />
        	<input type="submit" name="" value="Filter" class="btn" />
        </span>
       
        <span class="btnadd">
        	<a onclick="open_form('<?php echo admin_url(); ?>/add-new-page')" href="javascript:void(0)">Add new page</a>
        </span>
    </div>
    </form>
    <form action="<?php echo admin_url();?>/page/" method="post" id="list-page-form">
	    <div class="topart">
	    	<span class="left">
	    		<?php 
	    			$total_amount	=	count($this->page_model->get_all_page());
	    			$active			=	$this->page_model->count_active();
	    		?>
	    		<font class="number">(<?php echo $total_amount;?>)</font> <a href="javascript:;">All</a><font class="line">|</font><font class="number">(<?php echo $active;?>)</font> <a href="javascript:;"><font color="#0b9901">Active</font></a><font class="line">|</font><font class="number">(<?php echo $total_amount - $active;?>)</font> <a href="javascript:;"><font color="#c60001">Pending</font></a>
	        </span>
	    </div>
	</form>
    <div class="tableout">
    	<form action="<?php echo admin_url();?>/page/do-action" method="post" id="action_page_form">
			<div class="title1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all('.check_all')" type="checkbox"></div>
	            <div class="column" style="width: 4%;">No.</div>
	            <div class="column" style="width: 25%;">Name</div>
	            <div class="column" style="width: 20%;">Url</div>
	            <div class="column" style="width: 20%;">Description</div>
	            <div class="column" style="width: 15%;">Category</div>
	            <div class="column" style="width: 8%;">Order</div>
	            <div class="column" style="width: 5%;">Status</div>
	        </div>
	        <?php if(count($search_list[0])>0){?>
	        <?php foreach ($search_list as $k => $v){?>
	        <div class="linecate2">
	        	<div class="column" style="width: 2%;"><input name="id[]" value="<?php echo $v->id;?>" type="checkbox" /></div>
	            <div class="column" style="width:4%;"><?php $pagin	=	$this->uri->segment(3); if(isset($pagin)){echo $k+1+$pagin;}?></div>
	            
	            <div id="row_<?php echo $v->id;?>">
		            <div class="column" style="width:25%;" onmouseover="Hovercat('<?php echo $v->id;?>')" onmouseout="Outcat('<?php echo $v->id;?>')">
		            	<a href="javascript:;" class="art "><?php echo $v->name;?></a><br />
		                <div class="action" id="neocat-<?php echo $v->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-page/<?php echo $v->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/icon_view.png" class="png" /><a href="#">View</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/page/delete-page/<?php echo $v->id;?>" onclick="return confirm('Do you want delete this page?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:20%">
		            	<?php echo $v->url;?>
		            </div>
		            <div class="column" style="width:20%;">
		            	<span style="color: grey;">
		            		<?php 
		            			$content = $v->description;
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
		            <div class="column " style="width:15%;color: navy;"><?php echo $v->cate_name;?></div>
		            <div class="column" style="width:8%;">
		            	<input type="text" name="order" class="order" id="<?php echo $v->id;?>" value="<?php echo $v->order;?>" style="width:45px; float:left;" />
		            </div>
		            <div class="column" style="width:5%;">
		            <?php if($v->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="page_status('<?php echo $v->id;?>', 'no', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="page_status('<?php echo $v->id;?>', 'yes', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
		            <?php }?>
		            </div>
	            </div>
	        </div>
	        <?php }?>
	        <?php }else{?>
	        	<p style="padding: 10px;font-size: 16px; font-style: italic; color: green;" >There are no results match !</p>
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
	function changePageNumber() {
		$("#list-page-form").submit();
	}


	$('#action_page_form').iframer({
	    onComplete: function(msg){
	    	if(msg == 'yes') {
	    		alert('The Action have been successfully executed!');
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
	            var page_order = $(this).val(); 
	            var page_id = $(this).attr('id');
	            $('input[name="page_id"]').val(page_id);
	            $('input[name="page_order"]').val(page_order);
	            $('#change_order_page').submit();
        	}
        });
	})
</script>
<?php
    echo form_open(admin_url('page/change-order'), array('id' => 'change_order_page'), array('page_id' => 0, 'page_order' => 0));
    echo form_close();
?>

	