
	<h1>Customers Manager</h1>
	<form action="<?php echo admin_url();?>/<?php echo $act; ?>-customers/" method="post" id="list-new-customers-form">
	    <div class="toppage">
	    	<span class="left">
	        	<select style="width: 130px;" id="action">
	            	<option value="">Change status</option>
	            	<?php if($act == 'finish'){?><option value="sendmail">Send Mail</option><?php }?>
	                <?php if($act != 'processing'){?><option value="processing">Processing</option><?php }?>
	                <?php if($act != 'finish'){?><option value="finish">Finish</option><?php }?>
	                <?php if($act != 'refund'){?><option value="refund">Refund</option><?php }?>
	                <?php if($act != 'deleted'){?><option value="delete">Delete</option><?php }?>
	                
	            </select>
	            <input onclick="$('[name=action]').val($('#action').val()); $('#action_new_customers_form').submit()" value="Apply" class="btn" type="button">
	       		<?php if(count($country[0])>0){?>
	                	<select name="item_parent" class="" style="width: 150px;" >
	                		<option value="-1">List all</option>
	                		<?php foreach($country as $leaf) {?>
							<option value="<?php echo $leaf->name;?>" <?php echo ($current_filter_parent == $leaf->name)?'selected':'';?>>
								<?php
									echo $leaf->name;
								?>
							</option>
						<?php }?>
	                	</select>
	            <?php }?>
	        	<input type="submit" name="" value="Filter by category" class="btn" />
	        </span>
	    </div>
	
	    <div class="topart">
	    	<span class="left">
				<?php 	$total_new			= 	$this->customers_model->get_new_all();
						$total_processing	=	$this->customers_model->get_processing_all();
						$total_finish		=	$this->customers_model->get_finish_all();
						$total_refund		=	$this->customers_model->get_refund_all();
				?>
	    		<font class="number">(<?php if ($total_new >0) {echo $total_new;}else {echo "0";}?>)</font> <a href="javascript:;">New Customers</a><font class="line">|</font><font class="number">(<?php if ($total_processing > 0) {echo $total_processing ;}else {echo "0";}?>)</font> <a href="javascript:;"><font color="#0b9901">Processing</font></a><font class="line">|</font><font class="number">(<?php if ($total_finish > 0) {echo $total_finish ;}else {echo "0";}?>)</font> <a href="javascript:;"><font color="#c60001">Finish</font></a><font class="line">|</font><font class="number">(<?php if ($total_refund > 0) {echo $total_refund ;}else {echo "0";}?>)</font> <a href="javascript:;"><font color="blue">Refund</font></a>
	        </span>
	        <span class="right1">
	        	<select style="width:50px;" name="perpage" id="perpage" onchange="changeCustomersNumber()">
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
    	<form action="<?php echo admin_url();?>/customers/do-action" method="post" id="action_new_customers_form">
			<div class="title1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all('.check_all')" type="checkbox"></div>
	            <div class="column" style="width: 6%;">Order ID</div>
	            <div class="column" style="width: 22%;">New Customers</div>
	            <div class="column" style="width: 22%;">Type Of Visa</div>
	            <div class="column" style="width: 5%;">Pax</div>
	            <div class="column" style="width: 20%;">Nationality</div>
	            <div class="column" style="width: 15%;">Order Date</div>
	            <div class="column" style="width: 6%;">Status</div>
	        </div>
	        <?php if(count($customers_list[0])>0){?>
	        <?php foreach ($customers_list as $k => $v){?>
	        <div class="linecate2">
	        	<div class="column" style="width: 2%;"><input name="id[]" value="<?php echo $v->id;?>" type="checkbox" /></div>
	            <div class="column" style="width:6%; font-weight: bold; color: red; "><?php echo $v->cat.'-'.$v->id;?></div>
	            <div id="row_<?php echo $v->id;?>">
		            <div class="column" style="width:22%;" onmouseover="Hovercat('<?php echo $v->id;?>')" onmouseout="Outcat('<?php echo $v->id;?>')">
		            	<a href="javascript:;" class="art ">
		            		<?php echo $v->name; ?>
		            	</a><br />
		                <div class="action" id="neocat-<?php echo $v->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/customer.png" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-customers/<?php echo $v->id;?>')">Details</a>|
		                    <img src="<?php echo base_url();?>public/admin/img/applicants.png" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/applicants-info/<?php echo $v->id;?>')">Applicants</a>
		                    <?php if($act != 'deleted'){?>| <img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-customers/<?php echo $v->id;?>" onclick="return confirm('Do you want delete this customer?');"><font color="#be0000">Delete</font></a><?php }?>
		                </div>
		            </div>
		            <div class="column" style="width:22%;">
		            	<span style="color: green; font-family:inherit; font-style: italic; ">
		            		<?php echo ($v->services == 'normal') ? ($v->type_visa) : ($v->type_visa.' <span style="font-weight:bold;color:blue;">('.$v->services.')</span>'); ?>
		            		<?php if($v->message != ''){?>
		            			<span class="tooltip" title="<?php echo $v->message;?>"><img src="<?php echo base_url();?>public/admin/img/message.png"  height="15px" /></span>
		            		<?php }?>
		            		<?php if($v->airfast_track == 'yes'){?>
		            			<span class="tooltip" title="Including Air Fast Track Service"><img src="<?php echo base_url();?>public/admin/img/airfast_track.png"  height="15px" /></span>
		            		<?php }?>
		            		<?php if($v->carpick_up == 'yes'){?>
		            			<span class="tooltip" title="Including Car Pick Up Service"><img src="<?php echo base_url();?>public/admin/img/car_pickup.png"  height="12px" /></span>
		            		<?php }?>
		            		<?php if($v->tour_booking == 'yes'){?>
		            			<span class="tooltip" title="Including Tour Booking Service"><img src="<?php echo base_url();?>public/admin/img/tour_booking.png"  height="15px" /></span>
		            		<?php }?>
		            		<?php if($v->hotel_booking == 'yes'){?>
		            			<span class="tooltip" title="Including Hotel Booking Service"><img src="<?php echo base_url();?>public/admin/img/hotel_booking.png"  height="17px" /></span>
		            		<?php }?>
	            		</span>
		            </div>
		            <div class="column " style="width:5%; color: navy;"><?php echo $v->amount_visa;?></div>
		            <div class="column " style="width:20%; color: gray;"><?php echo $v->nationality.' | '.$v->ip;?></div>
		            <div class="column " style="width:15%; color: purple;"><?php echo $v->time;?></div>
		            <div class="column" style="width:6%; color: grey; font-style: italic;"><?php echo $v->status;?> </div>
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
	                   	<option value="">Change status</option>
	                   	<?php if($act == 'finish'){?><option value="sendmail">Send Mail</option><?php }?>
		                <?php if($act != 'processing'){?><option value="processing">Processing</option><?php }?>
		                <?php if($act != 'finish'){?><option value="finish">Finish</option><?php }?>
		                <?php if($act != 'refund'){?><option value="refund">Refund</option><?php }?>
		                <?php if($act != 'deleted'){?><option value="delete">Delete</option><?php }?>
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
	function changeCustomersNumber(){
		$("#list-new-customers-form").submit();
	}

	var inform	=	'<?php echo $inform;?>';
	
	if(inform == 'delete customers success') {alert("Delete Successfully !");}

	$('#action_new_customers_form').iframer({
	    onComplete: function(msg){
	    	if(msg == 'yes') {
		    	alert('The Action has been successfully executed!');
	    		window.location	=	'<?php echo $current_url;?>';
	    	}
	    	else show_error('div_message', msg)
	    }
	});

	$(document).ready(function(){	
		$(".tooltip").easyTooltip();
	});
</script>


	