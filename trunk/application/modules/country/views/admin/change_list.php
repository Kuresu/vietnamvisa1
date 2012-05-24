<script type="text/javascript">
		
		function change_value(AvailableLB,LinkedLB){
			var cityDel =document.getElementById("cityNameDel");
			var str;
			str= "";
			for (var i=0; i < AvailableLB.length; i++) {
				if (AvailableLB.options[i].selected == true) {
				LinkedLB.options[LinkedLB.length] =
				new Option(AvailableLB.options[i].text,
				AvailableLB.options[i].value);
				AvailableLB.options[i] = null;
				i=i-1;
				}
			}
			for (var j=0; j< cityDel.length; j++)
			{
				if(str=="")
					str += cityDel.options[j].value;
				else
					str +="," + cityDel.options[j].value;
			}
			document.getElementById('strCity').value = str;
			return;
		}

				
</script>

	<h1>List All Countries</h1>
	    <div class="toppage">
	    </div>
	    <div class="mes"><?php if(isset($mes)){echo $mes;}?></div>
	    <div class="topart">
	    	<span class="left">
	    		<?php 
	    			$total_amount	=	count($this->country_model->get_all());
	    			$active			=	count($this->country_model->get_allow());
	    		?>
	    		<font class="number">(<?php if ($total_amount >0) {echo $total_amount;}else {echo "0";}?>)</font> <a href="javascript:;">All</a><font class="line">|</font><font class="number">(<?php if (count($active)>0) {echo $active;}else {echo "0";}?>)</font> <a href="javascript:;"><font color="#0b9901">Allow</font></a><font class="line">|</font><font class="number">(<?php echo $total_amount - $active;?>)</font> <a href="javascript:;"><font color="#c60001">Not Allow</font></a>
	        </span>
	    </div>

		<div class="tableout">
			<form action="<?php echo admin_url();?>/country/change-list" method="post"  id="change_list">	
		    	<table  width="600px;" border="0" style="margin: 5px 5px 5px 200px;">
		    		<tr>
		            	<th style="background: green; color: white">Allow to Vietnam</th>
		                <th>&nbsp;&nbsp;&nbsp;</td>
		                <th style="background: red; color: white;">Not allow to Vietnam</th>
		            </tr>
		            <tr>
		            	<td style="padding: 5px 5px 5px 10px;">
		            		<select multiple="multiple" size="25" style="width: 300px;" name="cityName[]" id="cityName">					
		                        <?php if(count($allow[0])>0) {?>
		            			<?php foreach($allow as $k => $v){?>						
			                        <option value="<?php echo $v->id;?>" <?php if($v->show_off == 'no'){echo "selected";}?> style="color: green;">
			                        	<?php echo $v->name;?>
			                        </option>					
		                        <?php }?>
		                        <?php }else{?>
		                        	<p style="padding: 10px;font-size: 16px; font-style: italic; color: green;" >There are no items !</p>
		                        <?php }?>			
		                    </select>
		            	</td>
		            	<td>
		            			<input id="strCity" name="strCity" type="hidden" />
			                    <input style="margin: 0 0 5px 0;" type="button" class="btn left_arrow" onclick="change_value(document.getElementById('cityName'),document.getElementById('cityNameDel'))" />
			                    <input style="margin: 0 0 5px 0;" type="button" class="btn right_arrow" onclick="change_value(document.getElementById('cityNameDel'),document.getElementById('cityName'))" />
		            	</td>
		            	<td style="padding: 5px 5px 5px 10px;">
		            		<select multiple="multiple" name="cityNameDel[]" id="cityNameDel" size="25" style="width: 300px;">
		                        <?php if(count($not_allow)>0){ ?>
		            			<?php foreach($not_allow as $k1 => $v1) {?>						
			                        <option value="<?php echo $v1->id;?>" <?php if($v1->show_off == 'yes'){echo "selected";}?> style="color: red;">
			                        	<?php echo $v1->name;?> 
			                        </option>					
		                        <?php }?>
		                        <?php }else{?>
		                        	<p style="padding: 10px;font-size: 16px; font-style: italic; color: green;" >There are no items!</p>
		                        <?php }?>				
		                    </select>
		            	</td>
		            </tr>
		    	</table>
				<div class="bottom1">
				    <div class="column" style="width:50%;">
				    	<input type="submit" name="" value="Update" style="color: white; background: orange;" class="btn" />
				    </div>
				</div>
			</form>
		</div>	
		
		
		