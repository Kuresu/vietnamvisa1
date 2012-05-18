
	<h1>Questions Manager</h1>
	<form action="<?php echo admin_url();?>/question/" method="post" id="list-question-form">
	    <div class="toppage">
	    	<span class="left">
	        	<select style="width: 130px;" id="action">
	            	<option value="">Choose action</option>                               
	                <option value="active">Activate</option>
	                <option value="suspend">Deactivate</option>
	                <option value="delete">Delete</option>
	            </select>
	            <input onclick="$('[name=action]').val($('#action').val()); $('#action_question_form').submit()" value="Apply" class="btn" type="button">
	       		<?php if(count($qcate_info[0])>0){?>
	                	<select name="item_parent" class="" style="width: 150px;" >
	                		<option value="-1">List all</option>
	                		<?php foreach($qcate_info as $leaf) {?>
							<option value="<?php echo $leaf->id;?>" <?php echo ($current_filter_parent == $leaf->id)?'selected':'';?>>
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
	    		<?php 
	    			$total_amount	=	count($this->question_model->get_all());
	    			$active			=	$this->question_model->count_active();
	    			$not_answered	=	$this->question_model->count_not_answered();
	    		?>
	    		<font class="number">(<?php if ($total_amount >0) {echo $total_amount;}else {echo "0";}?>)</font> <a href="javascript:;">All</a><font class="line">|</font><font class="number">(<?php if (count($active)>0) {echo $active;}else {echo "0";}?>)</font> <a href="javascript:;"><font color="#0b9901">Active</font></a><font class="line">|</font><font class="number">(<?php echo $total_amount - $active;?>)</font> <a href="javascript:;"><font color="#c60001">Pending</font></a><font class="line">|</font><font class="number">(<?php echo $total_amount - $not_answered;?>)</font> <a href="javascript:;"><font color="#c60001">Not yet answered</font></a>
	        </span>
	        <span class="right1">
	        	<select style="width:50px;" name="perpage" id="perpage" onchange="changeQuestionNumber()">
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
    	<form action="<?php echo admin_url();?>/question/do-action" method="post" id="action_question_form">
			<div class="title1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all('.check_all')" type="checkbox"></div>
	            <div class="column" style="width: 4%;">No.</div>
	            <div class="column" style="width: 30%;">Question</div>
	            <div class="column" style="width: 40%;">Answer</div>
	            <div class="column" style="width: 15%;">Category</div>
	            <div class="column" style="width: 5%;">Status</div>
	        </div>
	        <?php if(count($quest_list[0])>0){?>
	        <?php foreach ($quest_list as $k => $v){?>
	        <div class="linecate2">
	        	<div class="column" style="width: 2%;"><input name="id[]" value="<?php echo $v->id;?>" type="checkbox" /></div>
	            <div class="column" style="width:4%;"><?php $pagin	=	$this->uri->segment(3); if(isset($pagin)){echo $k+1+$pagin;}?></div>
	            <?php $answer_match	=	$this->question_model->get_match_answer($v->id);?>
	            <div id="row_<?php echo $v->id;?>">
		            <div class="column" style="width:30%;" onmouseover="Hovercat('<?php echo $v->id;?>')" onmouseout="Outcat('<?php echo $v->id;?>')">
		            	<a href="javascript:;" class="art ">
		            		<?php 
		            			$content = $v->detail;
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
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-question/<?php echo $v->id;?>')">Answer</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-question/<?php echo $v->id;?>" onclick="return confirm('Do you want delete this question?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:40%;">
		            	<?php if(isset($answer_match['answer'])){?>
		            	<span style="color: green; font-family:inherit; font-style: italic; ">
		            		<?php 
		            			$content = $answer_match['answer'];
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
	            		<?php }else {?>
	            			<span style="color: red; font-weight: bold;">
	            				Not yet answered
	            			</span>
	            		<?php }?>
		            </div>
		            <div class="column " style="width:15%; color: grey;"><?php echo $v->cate_name;?></div>
		            <div class="column" style="width:5%;">
		            <?php if($v->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="question_status('<?php echo $v->id;?>', 'no', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="question_status('<?php echo $v->id;?>', 'yes', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
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
	function changeQuestionNumber(){
		$("#list-question-form").submit();
	}

	var inform	=	'<?php echo $inform;?>';
	
	if(inform == 'delete question success') {alert("Delete Successfully !");}

	$('#action_question_form').iframer({
	    onComplete: function(msg){
	    	if(msg == 'yes') {
		    	alert('The Action has been successfully executed!');
	    		window.location	=	'<?php echo $current_url;?>';
	    	}
	    	else show_error('div_message', msg)
	    }
	});
</script>


	