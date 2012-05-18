			
			
			
					<div class="column" style="width:30%;" onmouseover="Hovercat('<?php echo $question->id;?>')" onmouseout="Outcat('<?php echo $question->id;?>')">
		            	<a href="javascript:;" class="art ">
		            		<?php 
		            			$content = $question->detail;
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
		                <div class="action" id="neocat-<?php echo $question->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-question/<?php echo $question->id;?>')">Answer</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-question/<?php echo $question->id;?>" onclick="return confirm('Do you want delete this question?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:40%;">
		            	<?php if(isset($answer_match['answer'])){?>
		            	<span style="color: green;">
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
		            <div class="column " style="width:15%; color: grey;"><?php echo $question->cate_name;?></div>
		            <div class="column" style="width:5%;">
		            <?php if($question->active == 'yes'){?>
		            	<a href="javascript:void(0);" onclick="question_status('<?php echo $question->id;?>', 'no', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/active.png" title="Active" alt="Yes" class="icon png" /></a>
					<?php }else{?>		            	
		            	<a href="javascript:void(0);" onclick="question_status('<?php echo $question->id;?>', 'yes', '<?php echo $current_url;?>')"><img src="<?php echo base_url();?>public/admin/img/pending.png" title="Suspend" alt="No" class="icon png" /></a>
		            <?php }?>
		            </div>