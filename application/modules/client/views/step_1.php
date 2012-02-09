<html>
<head>
	<script type="text/javascript" src="<?php echo js_link('jquery-1.6.1.min.js');?>" ></script>
	<script type="text/javascript" src="<?php echo js_link('jquery-1.5.min.js');?>" ></script>
	<script type="text/javascript" src="<?php echo js_link('jquery-1.4.3.min.js');?>" ></script>
	<script type="text/javascript" src="<?php echo js_link('step1.js');?>" ></script>
	<script type="text/javascript">
		var base_url	=	'<?php echo base_url();?>';
	</script>
	 <link href="<?php echo css_link('style.css');?>" type="text/css" rel="stylesheet" />
	
</head>

<body>
	<h1 align="center" style="color: green;">APLLY ONLINE - STEP 1</h1>
	<div style="display: inline; width: 100%; " >
		<div id="left" style="width: 50%;float: left;">
			<form action="<?php echo base_url().'apply/step_1';?>" method="post">
				<table border="0">
					<tr>
						<td width="250px">Number of visa</td>
						<td>
							<select name ="number_visa" style="width: 200;"  id="number_of_visa" class="number_of_visa change_price" >
								<?php for($i = 1; $i<=10; $i++){?>
									<option value="<?php echo $i?>"><?php echo ($i >1)?($i." Applicants"):($i." Applicant");?></option>
								<?php }?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Type of visa</td>
						<td>
							<?php if(isset($type_of_visa)) {?>
								<select name ="type_visa" style="width: 200;"  id="type_of_visa" class="type_of_visa change_price" >
									<?php foreach ($type_of_visa as $k => $v){?>
										<option value="<?php echo $v->type_visa;?>"><?php echo $v->type_visa.' entry';?></option>
									<?php }?>
								</select>
							<?php }?>
						</td>
					</tr>
					<tr>
						<td>Processing time</td>
						<td></td>
					</tr>
					<tr>
						<td>
							<ul class="services">
								<li > <input value="normal" name="processing_time" type="radio" checked="checked" class="change_price_click" />Normal (2 working days)</li>
								<li ><input value="urgent" name="processing_time" type="radio" class="change_price_click" />Urgent (1 working day)</li>
								<li ><input value="super_urgent" name="processing_time" type="radio" class="change_price_click" />Super Urgent (4 - 8 hours)</li>
							</ul>
						</td>
						<td>
							<div id = "show_note" >
								<p class="note">Please be kindly noted that this service is just provided from 8:00AM to 3:00 PM- Vietnam time/ GMT+7,
								 and thus the service fee will not be paid automatically here, 
								 but only be paid after you have confirmed for this service via phone. 
								 So, if you decide to order Rush Service, 
								 please call us at <b>+84.946.583.583</b> now for confirmation and payment guidelines.</p>
							</div>
						</td>
					</tr>
					<tr>
						<td><input type="submit" value="Next step" /></td>
					</tr>
				</table>
			</form>
		</div>
		<div id="right" style="width:50%;float: left;">
			<table>
				<tr>
					<td>Number of visa : </td>
					<td>
						<div id = "show_number_of_visa">
							<p>show the number of visa...</p>
						</div>
					</td>
				</tr>
				<tr>
					<td>Type of visa : </td>
					<td>
						<div id = "show_type_of_visa">
							<input type="button" value=""  />
						 	<p>show the type of visa....</p>
						 </div>
					</td>
				</tr>
				<tr>
					<td>Total price : </td>
					<td>
						<div id = "show_total_price">calculate price here...</div>
					</td>
				</tr>

			</table>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo js_link('step1.js');?>" ></script>
</body>
</html>



