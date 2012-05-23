<div class="editcate_top" style="background: #FF33FF;">
		    <h2 style="color: white;">Customer Information:</h2>
		    <a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>

<div id="div_message"></div>

		<form action="<?php echo  admin_url();?>/edit-question/<?php echo $customer_info->id; ?>" method="post" id="edit-question-form">
			<div class="article_ct">
				<ul class="metatags">
					<li>
			        	<span class="left" style="color: blue;"><b>Customer ID : </b></span>
			            <span class="right" style="font-weight: bold; color: red;"><?php echo $customer_info->cat."-".$customer_info->id;?></span>
			        </li>
		            <li>
			        	<span class="left" style="color: blue;"><b>Name : </b></span>
			            <span class="right"><input type="text" value="<?php echo $customer_info->name;?>" readonly="readonly" style="width: 100%; color: green;" /></span>
			        </li>
			        <li>
			        	<span class="left" style="color: blue;"><b>Email : </b></span>
			            <span class="right"><input type="text" value="<?php echo $customer_info->email;?>" readonly="readonly" style="width: 100%; color: green;" /></span>
			        </li>
			        <li>
			        	<span class="left" style="color: blue;"><b>Phone : </b></span>
			            <span class="right"><input type="text" value="<?php echo $customer_info->phone;?>" readonly="readonly" style="width: 100%; color: green;" /></span>
			        </li>
			        <li>
			        	<span class="left" style="color: blue;"><b>Nationality : </b></span>
			            <span class="right"><input type="text" value="<?php echo $customer_info->nationality;?>" readonly="readonly" style="width: 100%; color: green;" /></span>
			        </li>
			    </ul>
			    <div class="btarticle">
			    	<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
		    	</div>
			</div>
		</form>