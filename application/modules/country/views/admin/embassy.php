
	<h1>Embassy Manager</h1>
    <form action="<?php echo admin_url(); ?>/embassy/search-results" method="post" id="embassy-search">
    <div class="toppage">
    	<span class="left">
        	<select style="width: 130px;" id="action">
            	<option value="">Choose action</option>                               
                <option value="active">Activate</option>
                <option value="suspend">Deactivate</option>
                <option value="delete">Delete</option>
            </select>
            <input onclick="$('[name=action]').val($('#action').val()); $('#action_embassy_form').submit()" value="Apply" class="btn" type="button">
            <input type="text" name="search" onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}"  value="Search..." style="width:165px; padding:3px;" />
            <input type="submit" name="" value="Search" class="btn" />
        </span>
       
        <span class="btnadd">
        	<a onclick="open_form('<?php echo admin_url(); ?>/add-new-embassy')" href="javascript:void(0)">Add New Embassy</a>
        </span>
    </div>
    </form>
    <form action="<?php echo admin_url();?>/embassy/" method="post" id="list-embassy-form">
    <div class="topart">
    	<span class="left">
    		<?php 
    			$total_amount	=	count($this->embassy_model->get_all());
    			$active			=	$this->embassy_model->count_active();
    		?>
    		<font class="number">(<?php if ($total_amount >0) {echo $total_amount;}else {echo "0";}?>)</font> <a href="javascript:;">All</a><font class="line">|</font><font class="number">(<?php if (count($active)>0) {echo $active;}else {echo "0";}?>)</font> <a href="javascript:;"><font color="#0b9901">Active</font></a><font class="line">|</font><font class="number">(<?php echo $total_amount - $active;?>)</font> <a href="javascript:;"><font color="#c60001">Pending</font></a>
        </span>
        <span class="right1">
        	<select style="width:50px;" name="perpage" id="perpage" onchange="changeEmbassyNumber()">
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
    	<form action="<?php echo admin_url();?>/embassy/do-action" method="post" id="action_embassy_form">
			<div class="title1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all('.check_all')" type="checkbox"></div>
	            <div class="column" style="width: 5%;">No.</div>
	            <div class="column" style="width: 13%;">Country</div>
	            <div class="column" style="width: 30%;">Address</div>
	            <div class="column" style="width: 20%;">Phone</div>
	            <div class="column" style="width: 25%;">Email</div>
	            <div class="column" style="width: 5%;">Status</div>
	        </div>
	        <?php if(count($embassy_list[0])>0){?>
	        <?php foreach ($embassy_list as $k => $v){?>
	        <div class="linecate2">
	        	<div class="column" style="width: 2%;"><input name="id[]" value="<?php echo $v->id;?>" type="checkbox" /></div>
	            <div class="column" style="width:5%;"><?php $pagin	=	$this->uri->segment(3); if(isset($pagin)){echo $k+1+$pagin;}?></div>
	            
	            <div id="row_<?php echo $v->id;?>">
		            <div class="column" style="width:13%;" onmouseover="Hovercat('<?php echo $v->id;?>')" onmouseout="Outcat('<?php echo $v->id;?>')">
		            	<a href="javascript:;" class="art ">
		            		<?php 
		            			$country = $this->embassy_model->get_match_country($v->id_country);
		            			echo $country['name'];
		            		?>
		            	</a><br />
		                <div class="action" id="neocat-<?php echo $v->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-embassy/<?php echo $v->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-embassy/<?php echo $v->id;?>" onclick="return confirm('Do you want delete this embassy?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:30%;color:green;">
		            	<span>
		            	<?php 
			            	$content = $v->address;
			            	$content = strip_tags($content);
			            	if(strlen($content) > 50){
			            		$content = substr($content,0,50);
			            		$posw=strrpos($content," ");
			            		if($posw > 0)$content = substr($content,0,$posw);
			            		echo $content.'...';
			            	}else {
			            		echo $content;
			            	}
		            	?>
		            	</span>
		            </div>
		            <div class="column" style="width:20%;color: grey;">
		            	<span><?php echo $v->phone;?></span>
		            </div>
		            <div class="column" style="width:25%;color: navy;">
		            	<span><?php echo $v->email;?></span>
		            </div>
		            <div class="column" style="width:5%;">
		            <?php if($v->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="embassy_status('<?php echo $v->id;?>', 'no', '<?php echo $current_url_status_embass; ?>')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="embassy_status('<?php echo $v->id;?>', 'yes', '<?php echo $current_url_status_embass; ?>')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
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
	function changeEmbassyNumber() {
		$("#list-embassy-form").submit();
	}

	var inform	=	'<?php echo $inform;?>';
	
	if(inform == 'delete embassy success') {alert("Delete Successfully !");}

	$('#action_embassy_form').iframer({
	    onComplete: function(msg){
	    	if(msg == 'yes') {
	    		alert('The Action have been successfully executed!');
	    		window.location	=	'<?php echo $current_url_status_embass;?>';
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
	            var embassy_order = $(this).val();
	            var embassy_id = $(this).attr('id');
	            $('input[name="embassy_id"]').val(embassy_id);
	            $('input[name="embassy_order"]').val(embassy_order);
	            $('#change_order_embassy').submit();
        	}
        });
	})
</script>
<?php
    echo form_open(admin_url('embassy/change-order'), array('id' => 'change_order_embassy'), array('embassy_id' => 0, 'embassy_order' => 0));
    echo form_close();
?>

	