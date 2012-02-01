<script type="text/javascript" src="<?php echo js_link('jquery-1.6.1.min.js');?>" ></script>
<script type="text/javascript">
	function changeType(){
		var path = '<?php echo base_url(); ?>';
		$.post(path+'apply/change_type/',{type_id:$("#type_of_visa").val()},function(xml){
			$("#show_type_of_visa").html(xml);
		});
	}
	
	function changeNumber(){
		var path='<?php echo base_url(); ?>';
		$.post(path+'apply/change_number/',{number_id:$("#number_of_visa").val()},function(xml){
			$("#show_number_of_visa").html(xml);
		});
	}
</script>
<h1 align="center" style="color: green;">APLLY ONLINE - STEP 1</h1>
<div style="display: inline; width: 100%; " >
	<div id="left" style="width: 30%;float: left;">
		<form action="<?php echo base_url().'apply/step_1';?>" method="post">
			<table >
				<tr>
					<td>Number of visa</td>
					<td>
						<select name ="number_visa" style="width: 200;" onchange="changeNumber()" id="number_of_visa" >
							<option value="1">1 Applicant</option>
							<option value="2">2 Applicants</option>
							<option value="3">3 Applicants</option>
							<option value="4">4 Applicants</option>
							<option value="5">5 Applicants</option>
							<option value="6">6 Applicants</option>
							<option value="7">7 Applicants</option>
							<option value="8">8 Applicants</option>
							<option value="9">9 Applicants</option>
							<option value="10">10 Applicants</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Type of visa</td>
					<td>
						<select name ="type_visa" style="width: 200;" onchange="changeType()" id="type_of_visa" >
							<option value="type_visa_1">1 month single</option>
							<option value="type_visa_2">3 months single</option>
							<option value="type_visa_3">1 month multiple</option>
							<option value="type_visa_4">3 months multiple</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Processing time</td>
					<td>
						<select name ="processing_time" style="width: 200;" onchange="changeItemgrand()"  >
							<option value="normal">Normal (2 working days)</option>
							<option value="urgent">Urgent (1 working day)</option>
							<option value="super_urgent">Super Urgent (4 - 8 hours)</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td><input type="submit" value="Next step" /></td>
				</tr>
			</table>
		</form>
	</div>
	<div id="right" style="width: 30%;float: left;">
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
