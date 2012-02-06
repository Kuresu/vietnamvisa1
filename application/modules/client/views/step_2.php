<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo css_link('datepicker.css');?>" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo css_link('layout.css');?>" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo css_link('style.css');?>" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo css_link('template.css');?>" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo css_link('validationEngine.jquery.css');?>" />

<script type="text/javascript" src="<?php echo js_link('jquery-1.6.1.min.js');?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo js_link('jquery-1.6.min.js');?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo js_link('jquery.validationEngine.js');?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo js_link('jquery.validationEngine-en.js');?>" charset="utf-8"></script>


<script type="text/javascript" src="<?php echo js_link('datepicker.js');?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo js_link('eye.js');?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo js_link('utils.js');?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo js_link('layout.js');?>" charset="utf-8"></script>



<script type="text/javascript">
	var	number_visa	=	<?php echo $para_step1['number_visa']; ?>;

	$(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery("#formID").validationEngine();
	});
</script>
</head>
<body>
<h1 align="center" style="color: green;">APLLY ONLINE - STEP 2</h1>
<form action="<?php echo base_url().'apply/step_2';?>" method="post" name="step2Form"  id="formID"  >
	
	<div style="display: inline; width: 100%;">
		<div style="width: 50%; float: left;">
		<h1>Application Form</h1>
			<table border="0" >
				<tr>
					<td>Date of arrival (mm/dd/yyyy) </td>
					<td>
						<input type="text" id="date_arrival" value="<?php echo date('m/d/Y');?>" style="width: 120;" name="date_arrival"   /> 
						<label class="closeOnSelect"><input type="checkbox" checked  /> Close on selection</label>
					</td>
				</tr>
				
				<tr>
					<td>Date of exit (mm/dd/yyyy) </td>
					<td>
						<input type="text"  id="date_exit" value="<?php echo date('m/d/Y');?>" style="width: 120;" name="date_exit"  /> 
						<label class="closeOnSelect"><input type="checkbox" checked /> Close on selection</label>
					</td>
				</tr>
				<tr>
					<td>Arrival port</td>
					<td>
						<select name="arrival_port" id ="arrival_port" class="validate[required]" >
							<option value="">Please Select Option</option>
							<option value="hanoi">Hanoi</option>
							<option value="hochiminh">Hochiminh(Saigon)</option>
							<option value="danang">Danang</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td>
					<?php for($i=1; $i <= $para_step1['number_visa']; $i ++) {?>
						<?php echo '<span style="color: red; font-style: italic; size: 40px;">Applicant '.$i.'</span><br>';?>
						Full name*: <input type="text" name="full_name_<?php echo $i;?>"  id="full_name_<?php echo $i;?>" class="validate[required] text-input" /><br><br>
						Passport number*: <input type="text" name="passport_number_<?php echo $i;?>" value="" id="passport_number_<?php echo $i;?>" /><br><br>
						Passport expiration date*:
							<input type="text" class="passport_expiration" id="passport_expiration_<?php echo $i;?>" value="<?php echo date('m/d/Y');?>" style="width: 120;" name="passport_expiration_<?php echo $i;?>" /> 
							<label class="closeOnSelect"><input type="checkbox" checked="checked" /> Close on selection</label> 
						<br><br>
						Nationality*: 
							<?php if(count($country)>0){?>
								<select name="nationality_<?php echo $i;?>" class="validate[required]" id="nationality_<?php echo $i;?>">
									<option value="">Select...</option>
									<?php foreach ($country	as $k => $v){?>
										<option value = "<?php echo $v->name;?>"><?php echo $v->name;?></option>
									<?php }?>
								</select>
							<?php }?>
						<br><br>
						Date of birth*: 
							<input type="text" class="birth_date" id="birth_date_<?php echo $i;?>" value="<?php echo date('m/d/Y');?>" style="width: 120;" name="birth_date_<?php echo $i;?>" /> 
							<label class="closeOnSelect"><input type="checkbox" checked="checked" /> Close on selection</label> 
						<br><br>
						Gender*: 
							<select name="gender_<?php echo $i;?>">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						<br><br>					
					<?php }?>
					</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="hidden" name="number_applicant" value="<?php echo $para_step1['number_visa'];?>"  /></td>
					<td>
						<input class="submit" type="submit"  value="Next step"  />
					</td>
				</tr>
			</table>
		</div>
		
		<div style="width: 50%; float: left;" >
			
			<table border="0">
				<tr >
					<td colspan="2">
						<h1>REQUEST and Contact Details</h1>
					</td>
				</tr>
				<tr>
					<td>Fullname*</td>
					<td><input type="text" name="fullname_contact" value="" width="200" id="fullname_contact" class="validate[required] text-input" /></td>
				</tr>
				<tr>
					<td>Email*</td>
					<td><input type="text" name="email_contact" value="Type your email here" width="200" id="email_contact" class="validate[required,custom[email]] text-input"  /></td>
				</tr>
				<tr>
					<td>Confirm Email*</td>
					<td><input type="text" name="confirm_email_contact" value="Type your email here.." width="200" id="confirm_email_contact" class="validate[required,equals[email_contact]] text-input"  /></td>
				</tr>
				<tr>
					<td>Phone number*<br>(example: +103-304-340-4300-043 )</td>
					<td><input type="text" name="phone_contact" value="Youre phone goes here..." width="200" id="phone_contact" class="validate[custom[phone]] text-input" /></td>
				</tr>
				<tr>
					<td>Purpose of arrival</td>
					<td>
						<select name="purpose_arrival" id="purpose_arrival" class="validate[required]">
							<option value="">Please Select...</option>
							<option value="vacation">Vacation</option>
							<option value="busines">Business</option>
							<option value="family_visit">Friend/Family visit</option>
							<option value="other">Other</option>
						</select>
					</td>
				</tr>
				
			</table>
		</div>
	</div>
		 
</form>
</body>