
	<h1>Faqs Category Manager</h1>
    <div class="toppage">
    	<span class="left">
        	<select style="width: 130px;" id="action">
            	<option value="">Choose action</option>                               
                <option value="active">Activate</option>
                <option value="suspend">Deactivate</option>
            </select>
            <input onclick="$('[name=action]').val($('#action').val()); $('#action_fcate_form').submit()" value="Apply" class="btn" type="button">
        </span>
       
        <span class="btnadd">
        	<a onclick="open_form('<?php echo admin_url(); ?>/add-new-fcate')" href="javascript:void(0)">Add New</a>
        </span>
    </div>
    <div class="topart">
    	<span class="left">
    		<?php 
    			$total_amount	=	count($this->fcate_model->get_all());
    			$active			=	$this->fcate_model->count_active();
    		?>
    		<font class="number">(<?php if ($total_amount >0) {echo $total_amount;}else {echo "0";}?>)</font> <a href="javascript:;">All</a><font class="line">|</font><font class="number">(<?php if (count($active)>0) {echo $active;}else {echo "0";}?>)</font> <a href="javascript:;"><font color="#0b9901">Active</font></a><font class="line">|</font><font class="number">(<?php echo $total_amount - $active;?>)</font> <a href="javascript:;"><font color="#c60001">Pending</font></a>
        </span>
    </div>
    <div class="tableout">
    	<form action="<?php echo admin_url();?>/fcate/do-action" method="post" id="action_fcate_form">
			<div class="title1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all('.check_all')" type="checkbox"></div>
	            <div class="column" style="width: 10%;">No.</div>
	            <div class="column" style="width: 60%;">Name</div>
	            <div class="column" style="width: 15%;">Order</div>
	            <div class="column" style="width: 5%;">Status</div>
	        </div>
	        <?php if(count($fcate_list[0])>0){?>
	        <?php foreach ($fcate_list as $k => $v){?>
	        <div class="linecate2">
	        	<div class="column" style="width: 2%;"><input name="id[]" value="<?php echo $v->id;?>" type="checkbox" /></div>
	            <div class="column" style="width:10%;"><?php $pagin	=	$this->uri->segment(3); if(isset($pagin)){echo $k+1+$pagin;}?></div>
	            
	            <div id="row_<?php echo $v->id;?>">
		            <div class="column" style="width:60%;" onmouseover="Hovercat('<?php echo $v->id;?>')" onmouseout="Outcat('<?php echo $v->id;?>')">
		            	<a href="javascript:;" class="art ">
		            		<?php 
		            			$content = $v->name;
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
		            	</a><br />
		                <div class="action" id="neocat-<?php echo $v->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-fcate/<?php echo $v->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-fcate/<?php echo $v->id;?>" onclick="return confirm('Do you want delete this category?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:15%;">
		            	<input type="text" name="order" class="order" id="<?php echo $v->id;?>" value="<?php echo $v->order;?>" style="width:45px; float:left;" />
		            </div>
		            <div class="column" style="width:5%;">
		            <?php if($v->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="fcate_status('<?php echo $v->id;?>', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="fcate_status('<?php echo $v->id;?>', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
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
	                </select>
	                <input type="submit" name="" value="Apply" class="btn" />
	            </div>
	        </div>
        </form>
	</div>
	
<script type="text/javascript">
	function changeFcatesNumber() {
		$("#list-fcate-form").submit();
	}

	var inform	=	'<?php echo $inform;?>';
	
	if(inform == 'delete fcate success') {alert("Delete Successfully !");}

	$('#action_fcate_form').iframer({
	    onComplete: function(msg){
	    	if(msg == 'yes') {
	    		window.location	=	admin_url+'faqs-category';
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
	            var fcate_order = $(this).val();
	            var fcate_id = $(this).attr('id');
	            $('input[name="fcate_id"]').val(fcate_id);
	            $('input[name="fcate_order"]').val(fcate_order);
	            $('#change_order_fcate').submit();
        	}
        });
	})
</script>
<?php
    echo form_open(admin_url('fcate/change-order'), array('id' => 'change_order_fcate'), array('fcate_id' => 0, 'fcate_order' => 0));
    echo form_close();
?>

	