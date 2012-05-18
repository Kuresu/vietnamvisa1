
	<h1>Country Manager</h1>
	<form action="<?php echo admin_url();?>/country/" method="post" id="list-country-form">
    <div class="toppage">
    	<span class="left">
        	<select style="width: 130px;" id="action">
            	<option value="">Choose action</option>                               
                <option value="active">Activate</option>
                <option value="suspend">Deactivate</option>
                <option value="delete">Delete</option>
            </select>
            <input onclick="$('[name=action]').val($('#action').val()); $('#action_country_form').submit()" value="Apply" class="btn" type="button">
            	<select name="continent_filter" class="" style="width: 150px;" >
                	<option value="-1">List all</option>
                	<option value="Africa" <?php echo ($current_filter == 'Africa')?'selected':'';?>>Africa</option>
                	<option value="America" <?php echo ($current_filter == 'America')?'selected':'';?>>America</option>
                	<option value="Asia" <?php echo ($current_filter == 'Asia')?'selected':'';?>>Asia</option>
                	<option value="Europe" <?php echo ($current_filter == 'Europe')?'selected':'';?>>Europe</option>
                	<option value="Oceania" <?php echo ($current_filter == 'Oceania')?'selected':'';?>>Oceania</option>
                </select>
        	<input type="submit" name="" value="Filter by continent" class="btn" />
        </span>
       
        <span class="btnadd">
        	<a onclick="open_form('<?php echo admin_url(); ?>/add-new-country')" href="javascript:void(0)">Add New Country</a>
        </span>
    </div>
    
    <div class="topart">
    	<span class="left">
    		<?php 
    			$total_amount	=	count($this->country_model->get_all());
    			$active			=	$this->country_model->count_active();
    		?>
    		<font class="number">(<?php if ($total_amount >0) {echo $total_amount;}else {echo "0";}?>)</font> <a href="javascript:;">All</a><font class="line">|</font><font class="number">(<?php if (count($active)>0) {echo $active;}else {echo "0";}?>)</font> <a href="javascript:;"><font color="#0b9901">Active</font></a><font class="line">|</font><font class="number">(<?php echo $total_amount - $active;?>)</font> <a href="javascript:;"><font color="#c60001">Pending</font></a>
        </span>
        <span class="right1">
        	<select style="width:50px;" name="perpage" id="perpage" onchange="changecountryNumber()">
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
    	<form action="<?php echo admin_url();?>/country/do-action" method="post" id="action_country_form">
			<div class="title1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all('.check_all')" type="checkbox"></div>
	            <div class="column" style="width: 4%;">No.</div>
	            <div class="column" style="width: 30%;">Name</div>
	            <div class="column" style="width: 30%;">Continent</div>
	            <div class="column" style="width: 25%;">Flag Icon</div>
	            <div class="column" style="width: 5%;">Status</div>
	        </div>
	        <?php if(count($country_list[0])>0){?>
	        <?php foreach ($country_list as $k => $v){?>
	        <div class="linecate2">
	        	<div class="column" style="width: 2%;"><input name="id[]" value="<?php echo $v->id;?>" type="checkbox" /></div>
	            <div class="column" style="width:4%;"><?php $pagin	=	$this->uri->segment(3); if(isset($pagin)){echo $k+1+$pagin;}?></div>
	            
	            <div id="row_<?php echo $v->id;?>">
		            <div class="column" style="width:30%;" onmouseover="Hovercat('<?php echo $v->id;?>')" onmouseout="Outcat('<?php echo $v->id;?>')">
		            	<a href="javascript:;" class="art "><?php echo $v->name;?></a><br />
		                <div class="action" id="neocat-<?php echo $v->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-country/<?php echo $v->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-country/<?php echo $v->id;?>" onclick="return confirm('Do you want delete this country?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:30%;">
		            	<span style="color: green;"><?php echo $v->continent;?></span>
		            </div>
		            <div class="column " style="width:25%;">
		            	<img style="margin: 5px 0 0 0;" title="<?php echo $v->name;?>" src="<?php if(file_exists($v->flag_icon)){echo base_url().$v->flag_icon;}else{echo base_url().'uploads/flag/noflag.png';} ?>" />
		            </div>
		            <div class="column" style="width:5%;">
		            <?php if($v->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="country_status('<?php echo $v->id;?>', 'no', '<?php echo $url_status_country;?>')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="country_status('<?php echo $v->id;?>', 'yes', '<?php echo $url_status_country;?>')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
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
	function changecountryNumber() {
		$("#list-country-form").submit();
	}

	var inform	=	'<?php echo $inform;?>';
	
	if(inform == 'delete country success') {alert("Delete Successfully !");}

	$('#action_country_form').iframer({
	    onComplete: function(msg){
	    	if(msg == 'yes') {
	    		alert('The Action have been successfully executed!');
	    		window.location	=	'<?php echo $url_status_country;?>';
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
	            var country_order = $(this).val(); 
	            var country_id = $(this).attr('id');
	            $('input[name="country_id"]').val(country_id);
	            $('input[name="country_order"]').val(country_order);
	            $('#change_order_country').submit();
        	}
        });
	})
</script>
<?php
    echo form_open(admin_url('country/change-order'), array('id' => 'change_order_country'), array('country_id' => 0, 'country_order' => 0));
    echo form_close();
?>

	