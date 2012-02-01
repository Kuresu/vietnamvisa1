<link rel="stylesheet" media="screen" type="text/css" href="<?php echo css_link('datepicker.css');?>" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo css_link('layout.css');?>" />

<script type="text/javascript" src="<?php echo js_link('jquery-1.6.1.min.js');?>"></script>
<script type="text/javascript" src="<?php echo js_link('jquery.js');?>"></script>
<script type="text/javascript" src="<?php echo js_link('datepicker.js');?>"></script>
<script type="text/javascript" src="<?php echo js_link('eye.js');?>"></script>
<script type="text/javascript" src="<?php echo js_link('utils.js');?>"></script>
<script type="text/javascript" src="<?php echo js_link('layout.js');?>"></script>


<h1 align="center" style="color: green;">APLLY ONLINE - STEP 2</h1>
<form action="<?php echo base_url().'apply/step_2';?>" method="post">
	<table align="center">
		<tr>
			<td>Date of arrival (mm/dd/yyyy) </td>
			<td>
				<input type="text" class="date_arrival" id="date_arrival" value="<?php echo date('m/d/Y');?>" style="width: 120;" name="date_arrival" /> 
				<label id="closeOnSelect"><input type="checkbox" checked /> Close on selection</label>
			</td>
		</tr>
		
		<tr>
			<td>Date of exit (mm/dd/yyyy) </td>
			<td>
				<input type="text" class="date_exit" id="date_exit" value="<?php echo date('m/d/Y');?>" style="width: 120;" name="date_exit" /> 
				<label id="closeOnSelect"><input type="checkbox" checked /> Close on selection</label>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="Next step" />
			</td>
		</tr>
	</table>
		 
</form>