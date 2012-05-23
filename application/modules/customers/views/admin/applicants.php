<script type="text/javascript">
	$(document).ready(function(){

		$('#scrollbar1').tinyscrollbar();

	});
</script>

<div class="editcate_top" style="background: white; border-bottom: none;">
		<a href = "javascript:void(0)" onclick ="$('#light_adct').hide();$('#fade_adct').hide()"><img src="<?php echo base_url();?>public/admin/img/close.png" class="png" /></a>
</div>
<div id="scrollbar1">
	<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
	<div class="viewport">
		<div class="overview">
			<div class="editcate_top" style="background: #FF33FF;">
					    <h2 style="color: white;">General Informations:</h2>
			</div>
			<div id="div_message"></div>
			
						<?php if(count($customer_info) >0) {?>
						<div class="article_ct">
							<ul class="metatags">
								<li>
						        	<span class="left" style="color: blue;"><b>Customer ID : </b></span>
						            <span class="right" style="font-weight: bold; color: red;"><?php echo $customer_info->cat."-".$customer_info->id;?></span>
						        </li>
					            <li>
						        	<span class="left" style="color: blue;"><b>Order Date : </b></span>
						            <span class="right"><input type="text" value="<?php echo $customer_info->time;?>" readonly="readonly" style="width: 100%; color: green;" /></span>
						        </li>
						        <li>
						        	<span class="left" style="color: blue;"><b>Purpose : </b></span>
						            <span class="right"><input type="text" value="<?php echo $customer_info->purpose;?>" readonly="readonly" style="width: 100%; color: green;" /></span>
						        </li>
						        <li>
						        	<span class="left" style="color: blue;"><b>Date of arrival : </b></span>
						            <span class="right"><input type="text" value="<?php if(isset($customer_info->date_arrival))echo convert_type_date($customer_info->date_arrival);?>" readonly="readonly" style="width: 100%; color: green;" /></span>
						        </li>
						        <li>
						        	<span class="left" style="color: blue;"><b>Date of exit : </b></span>
						            <span class="right"><input type="text" value="<?php  if(isset($customer_info->date_exit))echo convert_type_date($customer_info->date_exit);?>" readonly="readonly" style="width: 100%; color: green;" /></span>
						        </li>
						        <li>
						        	<span class="left" style="color: blue;"><b>Port of arrival : </b></span>
						            <span class="right"><input type="text" value="<?php echo $customer_info->arrival_port;?>" readonly="readonly" style="width: 100%; color: green;" /></span>
						        </li>
						        <li>
						        	<span class="left" style="color: blue;"><b>Rush Services : </b></span>
						            <span class="right"><input type="text" value="<?php echo $customer_info->services;?>" readonly="readonly" style="width: 100%; color: green;" /></span>
						        </li>
						        <li>
						        	<span class="left" style="color: blue;"><b>Flight Number : </b></span>
						            <span class="right"><input type="text" value="<?php echo $customer_info->flight_number;?>" readonly="readonly" style="width: 100%; color: green;" /></span>
						        </li>
						    </ul>
					</div>
					<?php }?>
					
					<div class="editcate_top" style="background: white;">
					    <h2 style="color: Green;"></h2>
					</div>
					<?php if(count($applicants_info[0])>0 && isset($applicants_info)) {?>
					<?php foreach ($applicants_info as $k => $v) {?>
					<div class="editcate_top" style="background: green;">
					    <h2 style="color: white;">Applicant <?php echo $k+1;?>:</h2>
					</div>
					<div class="article_ct">
							<ul class="metatags">
								<li>
						        	<span class="left" style="color: blue;"><b>Fullname : </b></span>
						            <span class="right" style="font-weight: bold; color: red;"><?php echo $v->full_name;?></span>
						        </li>
					            <li>
						        	<span class="left" style="color: blue;"><b>Passport Number : </b></span>
						            <span class="right"><input type="text" value="<?php echo $v->passport;?>" readonly="readonly" style="width: 100%; color: green;" /></span>
						        </li>
						        <li>
						        	<span class="left" style="color: blue;"><b>Passport Expiration : </b></span>
						            <span class="right"><input type="text" value="<?php echo convert_type_date($v->expiration);?>" readonly="readonly" style="width: 100%; color: green;" /></span>
						        </li>
						        <li>
						        	<span class="left" style="color: blue;"><b>Date of birth : </b></span>
						            <span class="right"><input type="text" value="<?php echo convert_type_date($v->birth_date);?>" readonly="readonly" style="width: 100%; color: green;" /></span>
						        </li>
						        <li>
						        	<span class="left" style="color: blue;"><b>Nationality : </b></span>
						            <span class="right"><input type="text" value="<?php echo $v->nationality;?>" readonly="readonly" style="width: 100%; color: green;" /></span>
						        </li>
						        <li>
						        	<span class="left" style="color: blue;"><b>Gender : </b></span>
						            <span class="right"><input type="text" value="<?php echo $v->gender;?>" readonly="readonly" style="width: 100%; color: green;" /></span>
						        </li>
						    </ul>
					</div>
					<?php }?>
					<?php }?>
					<div class="btarticle">
						<input type="button" value="Cancel" class="btn" onclick="$('#light_adct').hide();$('#fade_adct').hide();" />
					</div>
		    </div>
	</div>
</div>