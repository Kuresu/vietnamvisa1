
	<h1>Faqs Manager</h1>
	<form action="<?php echo admin_url();?>/faqs/search-results" method="post" >
    <div class="toppage">
    	<span class="left">
        	<select style="width: 130px;" id="action">
            	<option value="">Choose action</option>                               
                <option value="active">Activate</option>
                <option value="suspend">Deactivate</option>
                <option value="delete">Delete</option>
            </select>
            <input onclick="$('[name=action]').val($('#action').val()); $('#action_faq_form').submit()" value="Apply" class="btn" type="button">
       		<?php if(count($fcate_info[0])>0){?>
                	<select name="category" class="" style="width: 150px;" >
                		<option value="all">List all</option>
                		<?php foreach($fcate_info as $leaf) {?>
						<option value="<?php echo $leaf->id;?>">
							<?php
								echo $leaf->name;
							?>
						</option>
					<?php }?>
                	</select>
            <?php }?>
       		<input type="text" name="search" onfocus="if (this.value == 'Keyword') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Keyword';}"  value="Keyword" style="width:165px; padding:3px;" />
        	<input type="submit" name="" value="Filter" class="btn" />
        </span>
       
        <span class="btnadd">
        	<a onclick="open_form('<?php echo admin_url(); ?>/add-new-faqs')" href="javascript:void(0)">Add new faq</a>
        </span>
    </div>
    </form>
    <form action="<?php echo admin_url();?>/faqs/" method="post" id="list-faq-form">
	    <div class="topart">
	    	<span class="left">
	    		<?php 
	    			$total_amount	=	count($this->faqs_model->get_all());
	    			$active			=	$this->faqs_model->count_active();
	    		?>
	    		<font class="number">(<?php if ($total_amount >0) {echo $total_amount;}else {echo "0";}?>)</font> <a href="javascript:;">All</a><font class="line">|</font><font class="number">(<?php if (count($active)>0) {echo $active;}else {echo "0";}?>)</font> <a href="javascript:;"><font color="#0b9901">Active</font></a><font class="line">|</font><font class="number">(<?php echo $total_amount - $active;?>)</font> <a href="javascript:;"><font color="#c60001">Pending</font></a>
	        </span>
	        <span class="right1">
	        	<select style="width:50px;" name="perpage" id="perpage" onchange="changeFaqsNumber()">
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
    	<form action="<?php echo admin_url();?>/faqs/do-action" method="post" id="action_faq_form">
			<div class="title1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all('.check_all')" type="checkbox"></div>
	            <div class="column" style="width: 4%;">No.</div>
	            <div class="column" style="width: 30%;">Question</div>
	            <div class="column" style="width: 40%;">Answer</div>
	            <div class="column" style="width: 10%;">Category</div>
	            <div class="column" style="width: 8%;">Order</div>
	            <div class="column" style="width: 5%;">Status</div>
	        </div>
	        <?php if(count($faqs_list[0])>0){?>
	        <?php foreach ($faqs_list as $k => $v){?>
	        <div class="linecate2">
	        	<div class="column" style="width: 2%;"><input name="id[]" value="<?php echo $v->id;?>" type="checkbox" /></div>
	            <div class="column" style="width:4%;"><?php $pagin	=	$this->uri->segment(3); if(isset($pagin)){echo $k+1+$pagin;}?></div>
	            
	            <div id="row_<?php echo $v->id;?>">
		            <div class="column" style="width:30%;" onmouseover="Hovercat('<?php echo $v->id;?>')" onmouseout="Outcat('<?php echo $v->id;?>')">
		            	<a href="javascript:;" class="art ">
		            		<?php 
		            			$content = $v->question;
		            			$content = strip_tags($content);
		            			if(strlen($content) > 60){
		            				$content = substr($content,0,60);
		            				$posw=strrpos($content," ");
		            				if($posw > 0)$content = substr($content,0,$posw);
		            				echo $content.'...';
		            			}else {
		            				echo $content;
		            			}
		            		?>
		            	</a><br />
		                <div class="action" id="neocat-<?php echo $v->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-faqs/<?php echo $v->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-faqs/<?php echo $v->id;?>" onclick="return confirm('Do you want delete this faq?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:40%;">
		            	<span style="color: green;">
		            		<?php 
		            			$content = $v->answers;
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
		            <div class="column " style="width:10%;"><?php echo $v->cate_name;?></div>
		            <div class="column" style="width:8%;">
		            	<input type="text" name="order" class="order" id="<?php echo $v->id;?>" value="<?php echo $v->order;?>" style="width:45px; float:left;" />
		            </div>
		            <div class="column" style="width:5%;">
		            <?php if($v->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="faqs_status('<?php echo $v->id;?>', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="faqs_status('<?php echo $v->id;?>', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
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
	function changeFaqsNumber() {
		$("#list-faq-form").submit();
	}

	var inform	=	'<?php echo $inform;?>';
	
	if(inform == 'delete faq success') {alert("Delete Successfully !");}

	$('#action_faq_form').iframer({
	    onComplete: function(msg){
	    	if(msg == 'yes') {
	    		window.location	=	admin_url+'faqs';
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
	            var faq_order = $(this).val(); 
	            var faq_id = $(this).attr('id');
	            $('input[name="faq_id"]').val(faq_id);
	            $('input[name="faq_order"]').val(faq_order);
	            $('#change_order_faq').submit();
        	}
        });
	})
</script>
<?php
    echo form_open(admin_url('faqs/change-order'), array('id' => 'change_order_faq'), array('faq_id' => 0, 'faq_order' => 0));
    echo form_close();
?>

	