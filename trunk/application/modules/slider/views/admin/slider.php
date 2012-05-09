
	<h1>Slide Manager</h1>
    <div class="toppage">
    	<span class="left">
        	<select style="width: 130px;" id="action">
            	<option value="">Choose action</option>                               
                <option value="active">Activate</option>
                <option value="suspend">Deactivate</option>
                <option value="delete">Delete</option>
            </select>
            <input onclick="$('[name=action]').val($('#action').val()); $('#action_slide_form').submit()" value="Apply" class="btn" type="button">
        </span>
       
        <span class="btnadd">
        	<a onclick="open_form('<?php echo admin_url(); ?>/add-new-slider')" href="javascript:void(0)">Add new slide</a>
        </span>
    </div>
    <div class="topart">
    	<span class="left">
    		<?php 
    			$total_amount	=	count($this->slider_model->get_all());
    			$active			=	$this->slider_model->count_active();
    		?>
    		<font class="number">(<?php echo $total_amount;?>)</font> <a href="javascript:;">All</a><font class="line">|</font><font class="number">(<?php echo $active;?>)</font> <a href="javascript:;"><font color="#0b9901">Active</font></a><font class="line">|</font><font class="number">(<?php echo $total_amount - $active;?>)</font> <a href="javascript:;"><font color="#c60001">Pending</font></a>
        </span>
        
    </div>
    <div class="tableout">
    	<form action="<?php echo admin_url();?>/slider/do-action" method="post" id="action_slide_form">
			<div class="title1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all('.check_all')" type="checkbox"></div>
	            <div class="column" style="width: 4%;">No.</div>
	            <div class="column" style="width: 25%;">Name</div>
	            <div class="column" style="width: 15%;">Thumbnail</div>
	            <div class="column" style="width: 40%;">Description</div>
	            <div class="column" style="width: 8%;">Order</div>
	            <div class="column" style="width: 5%;">Status</div>
	        </div>
	        <?php if(count($slide_list[0])>0){?>
	        <?php foreach ($slide_list as $k => $v){?>
	        <div class="linecate2">
	        	<div class="column" style="width: 2%;"><input name="id[]" value="<?php echo $v->id;?>" type="checkbox" /></div>
	            <div class="column" style="width:4%;"><?php echo $k+1;?></div>
	            
	            <div id="row_<?php echo $v->id;?>">
		            <div class="column" style="width:25%;" onmouseover="Hovercat('<?php echo $v->id;?>')" onmouseout="Outcat('<?php echo $v->id;?>')">
		            	<a href="javascript:;" class="art "><?php echo $v->name;?></a><br />
		                <div class="action" id="neocat-<?php echo $v->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-slider/<?php echo $v->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-slider/<?php echo $v->id;?>" onclick="return confirm('Do you want delete this slide?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column small_thumb " style="width:15%; padding: 5px 0px 0px 0px;">
		            	<img src="<?php if(file_exists($v->thumbnail)){echo base_url().$v->thumbnail;}else{echo img_link('no-image.jpg','admin');}?>" width="50"  />
	            		<div class="fullsize_thumb">
							<img  src="<?php if(file_exists($v->source)){echo base_url().$v->source;}else{echo img_link('no-image.jpg','admin');}?>"  style="border:0px; width: 150px;"  alt="" title=""/>
						</div>
		            </div>
		            <div class="column" style="width:40%;">
		            	<span style="color: green;">
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
		            <div class="column" style="width:8%;">
		            	<input type="text" name="order" class="order" id="<?php echo $v->id;?>" value="<?php echo $v->order;?>" style="width:45px; float:left;" />
		            </div>
		            <div class="column" style="width:5%;">
		            <?php if($v->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="slider_status('<?php echo $v->id;?>', 'no')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="slider_status('<?php echo $v->id;?>', 'yes')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
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
	            </span>
	        </div>
        </form>
	</div>
	
<script type="text/javascript">

	var inform	=	'<?php echo $inform;?>';
	if(inform == 'edit slide success'){alert("Edit Successfully !");}
	
	if(inform == 'delete slide success') {alert("Delete Successfully !");}

	$('#action_slide_form').iframer({
	    onComplete: function(msg){
	    	if(msg == 'yes') {
	    		window.location	=	admin_url+'slider';
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
	            var slide_order = $(this).val(); 
	            var slide_id = $(this).attr('id');
	            $('input[name="slide_id"]').val(slide_id);
	            $('input[name="slide_order"]').val(slide_order);
	            $('#change_order_slide').submit();
        	}
        });
	})
</script>
<?php
    echo form_open(admin_url('slider/change-order'), array('id' => 'change_order_slide'), array('slide_id' => 0, 'slide_order' => 0));
    echo form_close();
?>

	