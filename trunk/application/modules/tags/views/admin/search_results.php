
	<h1>Meta Tags Manager</h1>
	<form action="<?php echo admin_url();?>/tags/search-results" method="post" >
    <div class="toppage">
    	<span class="left">
        	<select style="width: 130px;" id="action">
            	<option value="">Choose action</option>                               
                <option value="delete">Delete</option>
            </select>
            <input onclick="$('[name=action]').val($('#action').val()); $('#action_tag_form').submit()" value="Apply" class="btn" type="button">
       		<input type="text" name="search" onfocus="if (this.value == 'Keyword') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Keyword';}"  value="<?php if(isset($keyword)){echo $keyword;}else{echo "Keyword";}?>" style="width:165px; padding:3px;" />
        	<input type="submit" name="" value="Filter" class="btn" />
        </span>
       
        <span class="btnadd">
        	<a onclick="open_form('<?php echo admin_url(); ?>/add-new-tags')" href="javascript:void(0)">Add new meta tag</a>
        </span>
    </div>
    </form>
    <form action="<?php echo admin_url();?>/tags/" method="post" >
	    <div class="topart">
	    	<span class="left">
	    		<?php 
	    			$total_amount	=	count($this->tags_model->get_all());
	    		?>
	    		<font class="number">(<?php echo $total_amount;?>)</font> <a href="javascript:;">All</a>
	        </span>
	    </div>
	</form>
    <div class="tableout">
    	<form action="<?php echo admin_url();?>/tags/do-action" method="post" id="action_tag_form">
			<div class="title1">
	        	<div class="column" style="width: 2%;"><input class="check_all" onclick="check_all('.check_all')" type="checkbox"></div>
	            <div class="column" style="width: 4%;">No.</div>
	            <div class="column" style="width: 20%;">Page name</div>
	            <div class="column" style="width: 25%;">Title</div>
	            <div class="column" style="width: 30%;">Description</div>
	            <div class="column" style="width: 17%;">Keywords</div>
	        </div>
	        <?php if(count($search_list[0])>0){?>
	        <?php foreach ($search_list as $k => $v){?>
	        <div class="linecate2">
	        	<div class="column" style="width: 2%;"><input name="id[]" value="<?php echo $v->id;?>" type="checkbox" /></div>
	            <div class="column" style="width:4%;"><?php $pagin	=	$this->uri->segment(3); if(isset($pagin)){echo $k+1+$pagin;}?></div>
	            
	            <div id="row_<?php echo $v->id;?>">
		            <div class="column" style="width:20%;" onmouseover="Hovercat('<?php echo $v->id;?>')" onmouseout="Outcat('<?php echo $v->id;?>')">
		            	<a href="javascript:;" class="art "><?php echo $v->page;?></a><br />
		                <div class="action" id="neocat-<?php echo $v->id;?>">
		                    <img src="<?php echo base_url();?>public/admin/img/edit.gif" /><a href="javascript:void(0)" onclick="open_form('<?php echo admin_url(); ?>/edit-tags/<?php echo $v->id;?>')">Edit</a>|<img src="<?php echo base_url();?>public/admin/img/icon_view.png" class="png" /><a href="#">View</a>|<img src="<?php echo base_url();?>public/admin/img/delete.gif" /><a href="<?php echo admin_url();?>/delete-tags/<?php echo $v->id;?>" onclick="return confirm('Do you want delete this meta tag?');"><font color="#be0000">Delete</font></a>
		                </div>
		            </div>
		            <div class="column" style="width:25%">
		            	<span style="color: green;">
		            		<?php 
		            			$content = $v->title;
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
	            		</span>
		            </div>
		            <div class="column" style="width:30%;">
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
		            <div class="column " style="width:17%;">
		            	<span style="color: blue;">
		            		<?php 
		            			$content = $v->keywords;
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
	            		</span>
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
                		<option value="delete">Delete</option>
	                </select>
	                <input type="submit" name="" value="Apply" class="btn" />
	            </div>
	        </div>
        </form>
	</div>
	
<script type="text/javascript">

	var inform	=	'<?php echo $inform;?>';
	if(inform == 'delete tag success') {alert("Delete Successfully !");}

	$('#action_tag_form').iframer({
	    onComplete: function(msg){
	    	if(msg == 'yes') {
	    		window.location	=	admin_url+'tags';
	    	}
	    	else alert('damn');
	    }
	});
</script>


	