<div id="main_content_inner">
<p class="instructions"><b>OCOP Child's Info Step2:</b>ಜನನ ವಿವರಗಳು  /  Birth Details</p>
<form id="birthdetailsfrm" name="birthdetailsfrm" method="post" action="">
	<table width="100%" cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td width="65%" class="label"><label><span class="bluemark">CI 2.0</span> Household ID (Voter Card Id, Pan Card, Driving License or etc) <span class="required">*</span></label></td>
		<td width="35%" class="value">
			<input type="text" id="txtvoterid" name="txtvoterid" readonly="readonly" /> 
		</td>
	</tr>
	<tr id="divchildname">
		<td class="label"><label><span class="bluemark">CI 2.0a</span> ಮಗುವಿನ ಹೆಸರು  / Name of the Child <span class="required">*</span></label></td>
		<td class="value">
			<input type="text" id="ddlchildname" name="ddlchildname" readonly="readonly" /> 
		</td>
	</tr>
	<tr>
		<td class="label"><label><span class="bluemark">CI 2.0a</span> ಮಗುವಿನ ಹೆಸರು  / Name of the Child <span class="required">*</span></label></td>
		<td class="value">
			<input type="text" id="txtchildname" name="txtchildname" readonly="readonly" /> 
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.1</span> ಮಗು ಜನಿಸಿದಾಗ ಇದ್ದ ತೂಕ( ೬ ವರ್ಷದೊಳಗಿನ ಮಕ್ಕಳಿಗೆ ಮಾತ್ರ ) / Birth Weight of the child(only for below six years children) <span class="required">*</span></label></td>
		<td><input type="text" id="txtbweight" name="txtbweight" onchange="allnumeric();"/>KGs/Gms</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.2</span> ಮಗು ಜನಿಸುವಾಗ ಇದ್ದ ಅಂಗವಿಕಲತೆ   / Birth Disability of the child</label></td>
		<td>		
			<select id="ddlbdisability" name="ddlbdisability" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="None">ಯಾವುದು ಇಲ್ಲ / None</option>
				<option value="Hearing">ಶ್ರವಣ  / Hearing</option>
				<option value="Vision">ದೃಷ್ಟಿ  / Vision</option>
				<option value="Physical"> ದೈಹಿಕ  / Physical</option>
				<option value="Mentally">ಮಾನಸಿಕ ಅಸ್ತಿತ್ಥಿವ  / Mentally</option>
				<option value="Other">ಇತರೆ   / Other</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.3</span> ಜನನ ದಾಖಲಾತಿ / Birth Registration <span class="required">*</span></label></td>
		<td>
			<input type="radio" id="radbreg" name="radbreg" value="Yes" /> ಹೌದು  / Yes &nbsp;
			<input type="radio" id="radbreg" name="radbreg" value="No" /> ಇಲ್ಲ  / No 
		</td>
	</tr>
	<tr id="divbreg">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI 2.5</span> ಜನನ ದಾಖಲಾತಿ ಮಾಡಿಸದಿದ್ದಲ್ಲಿ ಕಾರಣ ? / If the Birth is not registered, reasons</label></td>
		<td><input type="text" id="txtbnreg" name="txtbnreg" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.4</span> ಜನನ ಪ್ರಮಾಣ ಪತ್ರ ಪಡೆದಿದ್ದರೆ? (ಹೌದು/ಇಲ್ಲ) ಇದ್ದಲ್ಲಿ ಪ್ರಮಾಣ ಪತ್ರದ ಸಂಖ್ಯೆ ನಮೂದಿಸಿ / Have you obtained the birth certificate?</label></td>
		<td>
			<select id="ddlcert" name="ddlcert" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Yes">ಹೌದು  / Yes</option>
				<option value="No"> ಇಲ್ಲ  / No</option>
			</select>
		</td>
	</tr>
	<tr id="divcertno">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI 2.4.1</span> ಪ್ರಮಾಣ ಪತ್ರದ ಸಂಖ್ಯೆ ನಮೂದಿಸಿ /Please enter certificate number</label></td>
		<td>
			<input type="text" id="txtcertno" name="txtcertno" />&nbsp;
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.6</span> ಅಂಗನವಾಡಿಯಿಂದ ಪೌಷ್ಟಿಕಾಂಶದ ಆಹಾರ ದೊರಕಿತ್ತೆ  (ಹೌದು/ಇಲ್ಲ) / Received / Receiving Nutricious food from Anganawadi</label></td>
		<td>			
			<input type="radio" id="radrecnut" name="radrecnut" value="Yes" /> ಹೌದು / Yes &nbsp;
			<input type="radio" id="radrecnut" name="radrecnut" value="No" /> ಇಲ್ಲ / No 
		</td>
	</tr>
	<tr> 
		<td><label><span class="bluemark">CI 2.7</span>ಗರ್ಭಾವದಿ  / Pregnancy Period <span class="required">*</span></label></td>
		<td>
			<select id="ddlpperiod" name="ddlpperiod" style="width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Normal">ಸಹಜ  / Normal</option>
				<option value="Premature 8th Month">ಎಂಟು ತಿಂಗಳಿಗೆ ಹುಟ್ಟಿದ  ಮಗು  / Premature 8th Month</option>
				<option value="Premature 7th Month">ಏಳು ತಿಂಗಳಿಗೆ ಹುಟ್ಟಿದ ಮಗು  / Premature 7th Month</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.8</span> ಈ ಮಗುವಿನ ಹೇರಿಗೆಯಾದ ಸ್ಥಳ  / Place of Delivery of the child</label></td>
		<td>
			<select id="ddldplace" name="ddldplace" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Home">ಮನೆ  / Home</option>
				<option value="Hospital">ಆಸ್ಪತ್ರೆ  / Hospital</option>
				<option value="Other">ಇತರೆ  / Other</option>
			</select>
		</td>
	</tr>
	<tr id="divdass">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI 2.9</span> ಹೆರಿಗೆಗೆ ಸಹಾಯ ಮಾಡಿದವರು / Delivery assisted by:</label></td>
		<td>
			<select id="ddldass" name="ddldass" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Dayi">ದಾದಿ  / Dayi</option>
				<option value="ANM">ಆರೋಗ್ಯ ಸಹಾಯಕಿ / ANM</option>
				<option value="Doctor">ವೈದ್ಯರು  / Doctor</option>
				<option value="Others">ಮನೆಯವರು  ಇತರೆ  / Others</option>
			</select>
		</td>
	</tr>	
	<tr id="divhdist">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI 2.10</span> ಆಸ್ಪತ್ರೆ  ಹೆರಿಗೆಯಾಗಿದ್ದಲ್ಲಿ, ನಿಮ್ಮ ನಿವಾಸದಿಂದ ಎಷ್ಟು ದೂರ  / If hospital,distance from your residence</label></td>
		<td><input type="text" id="txthdist" name="txthdist" /></td>
	</tr>	
	<tr>
		<td><label><span class="bluemark">CI 2.11</span> ಆಸ್ಪತ್ರೆಯ ವಿಧ / Type of Hospital <span class="required">*</span></label></td>
		<td>
			<select id="ddlhtype" name="ddlhtype" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Government">ಸರ್ಕಾರೀ  / Government</option>
				<option value="Private">ಖಾಸಗಿ / Private</option>
				<option value="NGO">ಸ್ವಯಂ ಸೇವಾ ಸಂಸ್ಥೆ / NGO</option>
				<option value="Others">ಇತರೆ  / Others</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.12</span> ಹೆರಿಗೆಗಾಗಿ ನೀವು ನೀಡಿದ ಸೇವಾ ಶುಲ್ಕ / Amount Paid for Delivery</label></td>
		<td><input type="text" id="txtamntpaid" name="txtamntpaid" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.13</span> ಹೆರಿಗೆಯ ವಿಧಾನ  / Delivery Type <span class="required">*</span></label></td>
		<td>
			<select id="ddldtype" name="ddldtype" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Simple">ಸರಳ / Simple</option>
				<option value="Caesarean">ಶಸ್ತ್ರ ಕ್ರಿಯೆ / Caesarean</option>
				<option value="Forceps">ಫೋರ್ಸೆಪ್ಸ್ ನಿಂದ / Forceps</option>
				<option value="Difficult">ಕಷ್ಟಕರ ಹೆರಿಗೆ  / Difficult</option>
			</select>
		</td>
	</tr>
	<tr id="divddiff">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI 2.14</span> ಹೇರಿಗೆಯು ಕಷ್ಟಕರವಾಗಿದ್ದಲ್ಲಿ ವಿವರಸಿ / If delivery was difficult explain</label></td>
		<td><input type="text" id="txtdelexp" name="txtdelexp" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.15</span> ಹೆರಿಗೆಯ ಸಂಖ್ಯೆ  / Delivery Number</label></td>
		<td><input type="text" id="txtdelnum" name="txtdelnum" onkeyup="maxcharacters();"/></td>
	</tr>	
	<tr>
		<td>&nbsp;</td>
		<td class="actions">
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="updatebirthdetails();">
		</td>
	</tr>
	<tr>
		<td class="required">
			<span class="required">*</span>
			required fields
		</td>
		<td class="value"><div id="check_bar">&nbsp;</div></td>
	</tr>
	</table>
</form>

<script type="text/javascript">
	$(document).ready(function() { 
		$("#divcertno").hide();
		$("#divddiff").hide();
		$("#divdass").hide();
		$("#divbreg").hide();
		$("#divhdist").hide();
		$("#divchildname").hide();
		var hid = '<?php echo $househid; ?>';
		var sid = '<?php echo $summaryid; ?>';
		if(hid != '' && sid != ''){
			var dataString = 'hid='+hid+'&sid='+sid;
			$.ajax({  
				type: "GET",  
				url	: "<?php echo fuel_url('birth_details/getrecord');?>",  
				data: dataString,
				dataType: "json",
				success: function(data){ 
					var cert = data[0].birth_certificate;
					var delivery_type = data[0].delivery_type;
					var delivery_place = data[0].delivery_place;
					$('#txtvoterid').val(data[0].household_voters_id);
					$('#ddlchildname').val(data[0].summary_id);
					$('#txtbweight').val(data[0].birth_weight);
					$('#ddlbdisability').val(data[0].birth_disability);
					var breg = data[0].birth_registration;
					$("[name=radbreg]").filter("[value='"+breg+"']").attr("checked",true);
					//$('#ddlcert').val(data[0].birth_certificate);
					$('#txtcertno').val(data[0].birth_certificate);
					$('#txtbnreg').val(data[0].birth_not_registered);
					var recnut = data[0].nutricious_received;
					$("[name=radrecnut]").filter("[value='"+recnut+"']").attr("checked",true);
					$('#ddlpperiod').val(data[0].pregnancy_period);
					$('#ddldplace').val(data[0].delivery_place);
					$('#ddldass').val(data[0].delivery_assisted);
					$('#txthdist').val(data[0].hospital_distance);
					$('#ddlhtype').val(data[0].hospital_type);
					$('#txtamntpaid').val(data[0].delivery_paid);
					$('#ddldtype').val(data[0].delivery_type);
					$('#txtdelexp').val(data[0].delivery_difficult);
					$('#txtdelnum').val(data[0].delivery_number);
					if(cert != '' || cert != 'NULL'){
						$("#divcertno").show();
						$('#ddlcert').val('Yes');
					}else{
						$("#divcertno").hide();
						$('#ddlcert').val('No');
					}
					if(breg == 'No'){
						$("#divbreg").show();
					}else{
						$("#divbreg").hide();
					}
					if(delivery_type == 'Difficult'){
						$("#divddiff").show();
					}else{
						$("#divddiff").hide();
					}
					if(delivery_place == 'Home'){
						$("#divdass").hide();
						$("#divhdist").hide();
					}else{
						$("#divdass").show();
						$("#divhdist").show();
					}
				}  
			});
			$.ajax({  
				type: "GET",  
				url	: "<?php echo fuel_url('birth_details/getchildname');?>",  
				data: dataString,
				dataType: "json",
				success: function(data){
					$('#txtchildname').val(data[0].child_name);
				}
			});
		}
	});	

	function updatebirthdetails(){
	var voterid = $('#txtvoterid').val();
	var summary_id = $('#ddlchildname').val();
	var birth_weight = $('#txtbweight').val();
	var birth_disability = $("#ddlbdisability option:selected").val();
	var birth_registration = $('input:radio[name=radbreg]:checked').val();
	var birth_certificate = $('#txtcertno').val();
	var birth_not_registered = $('#txtbnreg').val();
	var nutricious_received = $('input:radio[name=radrecnut]:checked').val();
	var pregnancy_period = $("#ddlpperiod option:selected").val();
	var delivery_place = $("#ddldplace option:selected").val();
	var delivery_assisted = $("#ddldass option:selected").val();
	var hospital_distance = $('#txthdist').val();
	var hospital_type = $("#ddlhtype option:selected").val();
	var delivery_paid = $('#txtamntpaid').val();
	var delivery_type = $("#ddldtype option:selected").val();
	var delivery_difficult = $('#txtdelexp').val();
	var delivery_number = $('#txtdelnum').val();
	if ( voterid == "" || birth_weight == "" || birth_registration == "" || hospital_type == "" || delivery_type == "" || pregnancy_period == "" )
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&birth_weight='+birth_weight+'&birth_disability='+birth_disability+'&birth_registration='+birth_registration+'&birth_certificate='+birth_certificate+'&birth_not_registered='+birth_not_registered+'&nutricious_received='+nutricious_received+'&pregnancy_period='+pregnancy_period+'&delivery_place='+delivery_place+'&delivery_assisted='+delivery_assisted+'&hospital_distance='+hospital_distance+'&hospital_type='+hospital_type+'&delivery_paid='+delivery_paid+'&delivery_type='+delivery_type+'&delivery_difficult='+delivery_difficult+'&delivery_number='+delivery_number;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('birth_details/updatebirthdetails');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				setTimeout(function() {
					$("#check_bar").hide();
				}, 5000);
			}  
		});  
	}
	}
</script>

</div>