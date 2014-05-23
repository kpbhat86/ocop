<div id="main_content_inner">
<p class="instructions"><b>OCOP Child's Info Step1:</b>ಸಾಮಾನ್ಯ ಮಾಹಿತಿ  / General Info</p>
<form id="generalinfofrm" name="generalinfofrm" method="post" action="">
	<table width="100%" cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td width="65%" class="label"><label><span class="bluemark">CI1.0</span> Household ID (Voter Card Id, Pan Card, Driving License or etc) <span class="required">*</span></label></td>
		<td width="35%" class="value">
			<input type="text" id="txtvoterid" name="txtvoterid" readonly="readonly" />
		</td>
	</tr>
	<tr id="divchildname">
		<td class="label"><label><span class="bluemark">CI1.0</span> ಮಗುವಿನ ಹೆಸರು / Name of the Child <span class="required">*</span></label></td>
		<td class="value">
			<input type="text" id="ddlchildname" name="ddlchildname" readonly="readonly" value="" />
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.1</span> ಹೆಸರು  / Name <span class="required">*</span></label></td>
		<td><input type="text" id="txtname" name="txtname" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.2</span> ಜನ್ಮ ದಿನಾಂಕ / Date of Birth <span class="required">*</span></label></td>
		<td>		
			<input type="text" id="txtdob" name="txtdob" />
			<script type="text/javascript">
				$(txtdob).datepick({dateFormat: 'dd-mm-yyyy'});
			</script>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.3</span> ಲಿಂಗ / Gender <span class="required">*</span></label></td>
		<td>
			<select id="ddlgender" name="ddlgender" style="min-width:175px;">
				<option value="" >-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="1" >ಗಂಡು  / Male</option>
				<option value="2" > ಹೆಣ್ಣು / Female</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.4</span> ತಂದೆ ಹೆಸರು / Father's Name <span class="required">*</span></label></td>
		<td><input type="text" id="txtfname" name="txtfname" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.5</span> ತಾಯಿಯ ಹೆಸರು / Mother's Name <span class="required">*</span></label></td>
		<td><input type="text" id="txtmname" name="txtmname" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.6</span> ಪ್ರಸಕ್ತ ವಿಳಾಸ / Present Address <span class="required">*</span></label></td>
		<td><input type="text" id="txtpreaddr" name="txtpreaddr" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.7</span> ಖಾಯಂ ವಿಳಾಸ / Permanent Address</label></td>
		<td>
			<input type="text" id="txtperaddr" name="txtperaddr" />
		</td>
	</tr>
		<tr>
		<td><label><span class="bluemark">CI1.8</span> ಮಗು ಯಾರೊಡನೆ ವಾಸುತ್ತಿರುವುದು / Child living with <span class="required">*</span></label></td>
		<td>
			<select id="ddlcliving" name="ddlcliving" style="width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="None">ಯಾರು ಇಲ್ಲ  / None</option>
				<option value="Parents">ಹೆತ್ತವರು  / Parents</option>
				<option value="Mother">ತಾಯಿ / Mother</option>
				<option value="Father">ತಂದೆ / Father</option>
				<option value="Brother">ಅಣ್ಣ-ತಮ್ಮ / Brother</option>
				<option value="Sister">ಅಕ್ಕ-ತಂಗಿ / Sister</option>
				<option value="Uncle">ಚಿಕ್ಕಪ್ಪ-ಮಾವ   / Uncle</option>
				<option value="Anut">ಚಿಕ್ಕಮ್ಮ -ಅತ್ತೆ  / Anut</option>
				<option value="Cousin Brother">ಚಿಕ್ಕಪ್ಪನ  ಮಗ Cousin Brother</option>
				<option value="Cousin Sister">ಚಿಕ್ಕಪ್ಪನ ಮಗಳು   / Cousin Sister</option>
				<option value="Grand Mother">ಅಜ್ಜಿ  / Grand Mother</option>
				<option value="Grand Father">ತಾತ / Grand Father</option>
				<option value="Great Grand Mother">ಮುತ್ತಜ್ಜಿ   / Great Grand Mother</option>
				<option value="Great Grand Father">ಮುತ್ತಜ್ಜ  / Great Grand Father</option>
				<option value="Neighbour">ಅಕ್ಕ ಪಕ್ಕದವರು  / Neighbour</option>
				<option value="Friend">ಸ್ನೇಹಿತರು   / Friend</option>
				<option value="Ashram">ಆಶ್ರಮ  / Ashram</option>
				<option value="Hostel">ವಸತಿ ನಿಲಯ  / Hostel</option>
				<option value="Goverment Homes"> ಸರ್ಕಾರೀ ಬಾಲಮಂದಿರ   / Goverment Homes</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.9</span> ಮಗು  ಅನಾಥ  - ಅರೆ ಅನಾಥವೇ? /  Is the child is Orphan/Semi-Orphan?</label></td>
		<td>
			<select id="ddlcorphan" name="ddlcorphan" style="min-width:175px;">
				<option value="" >-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Yes" >ಹೌದು / Yes</option>
				<option value="No" >ಇಲ್ಲ  / No</option>
			</select>
		</td>
	</tr>	
	<tr id="divorphan1">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI1.10</span> ಮಗು ಅನಥವಗಿದ್ದರೆ / If the child is Orphan</label></td>
		<td>
			<select id="ddlcorphany" name="ddlcorphany" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="None">ಯಾರು ಇಲ್ಲ / None</option>
				<option value="No Mother">ತಾಯಿ  ಇಲ್ಲ / No Mother</option>
				<option value="No Father">ತಂದೆ  ಇಲ್ಲ / No Father</option>
				<option value="No Parents">ಹೆತ್ತವರು  ಇಲ್ಲ /   No Parents</option>
			</select>
		</td>
	</tr>	
	<tr id="divorphan2">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI1.11</span> ಯಾವಾಗಿನಿಂದ ಅನಾಥ? ಸ್ವಂತ ಮಗುವಾಗಿದ್ದಲ್ಲಿ ಈ ಪ್ರಶ್ನೆ ಕೇಳಬೇಡಿ  / Orphan since from? If child is own don't ask this question</label></td>
		<td>
			<input type="text" id="txtorphansince" name="txtorphansince" />
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.12</span> ದತ್ತು ಮಗುವೆ? ಅಥವಾ ಸಾಕಿಕೊಂಡಿರುವ ಮಗುವೇ? / Adopted child or just looking after? If child is own don't ask this question</label></td>
		<td><input type="text" id="txtadoptedchild" name="txtadoptedchild" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.13</span> ಧರ್ಮ / Religion <span class="required">*</span></label></td>
		<td>
			<select id="ddlreligion" name="ddlreligion" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ   / Select --</option>
				<option value="Hindu">ಹಿಂದು  / Hindu</option>
				<option value="Muslim">ಮುಸ್ಲಿಂ  /  Muslim</option>
				<option value="Christian">ಕ್ರಿಶ್ಚಿಯನ್   / Christian</option>
				<option value="Christian">ಜೈನ್  / Jain</option>
				<option value="Other">ಇತರೆ  / Other</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.14</span> ಜಾತಿ / Caste <span class="required">*</span></label></td>
		<td>
			<select id="ddlcaste" name="ddlcaste" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ  / Select --</option>
				<option value="SC">ಪರಿಶಿಷ್ಟ ಜಾತಿ / SC</option>
				<option value="ST">ಪರಿಶಿಷ್ಟ   ಪಂಗಡ / ST</option>
				<option value="OBC">ಇತರೆ ಹಿಂದುಳಿದ ವರ್ಗ / OBC</option>
				<option value="Other">ಇತರೆ  / Other</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.15</span> ಪಡಿತರ ಚೀಟಿಯಲ್ಲಿ ಹೆಸರು ಸೇರಿಸಿದೆಯೇ ?  / Name in Ration Card <span class="required">*</span></label></td>
		<td>
			<select id="ddlration" name="ddlration" style="width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ  / Select --</option>
				<option value="Yes">ಹೌದು  / Yes</option>
				<option value="No">ಇಲ್ಲ್ಲ / No</option>
				<option value="Not Applicable">ಅನ್ವಯಿಸುವುದಿಲ್ಲ  / Not Applicable</option>
			</select>
		</td>
	</tr>	
	<tr id="divration">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI1.16</span> ಹೌದಾದರೆ,ಪಡಿತರ ಚೀಟಿಯ ವಿಧ   / If yes, type of the ration card</label></td>
		<td>
			<select id="ddlrationtype" name="ddlrationtype" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ  / Select --</option>
				<option value="APL">ಎಪಿಎಲ್  / APL</option>
				<option value="BPL">ಬಿಪಿಎಲ್   / BPL</option>
				<option value="Anthyodaya">ಅಂತ್ಯೋದಯ  / Anthyodaya</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="actions">
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="updategeneralinfo();">
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
		$("#divchildname").hide();
		var hid = '<?php echo $househid; ?>';
		var sid = '<?php echo $summaryid; ?>';
		if(hid != '' && sid != ''){
			var dataString = 'hid='+hid+'&sid='+sid;
			$.ajax({  
				type: "GET",  
				url	: "<?php echo fuel_url('general_info/getrecord');?>",  
				data: dataString,
				dataType: "json",
				success: function(data){ 
					var ration_card = data[0].ration_card_name;
					var child_orphan = data[0].child_orphan;
					$('#txtvoterid').val(data[0].household_voters_id);
					$('#ddlchildname').val(data[0].summary_id);
					$('#txtname').val(data[0].child_name);
					$('#txtdob').val(data[0].dob);
					$('#ddlgender').val(data[0].gender);
					$('#txtfname').val(data[0].father_name);
					$('#txtmname').val(data[0].mother_name);
					$('#txtpreaddr').val(data[0].present_addr);
					$('#txtperaddr').val(data[0].permanent_addr);
					$('#ddlcliving').val(data[0].child_living);
					$('#ddlcorphan').val(data[0].child_orphan);
					$('#ddlcorphany').val(data[0].child_orphan_yes);
					$('#txtorphansince').val(data[0].child_orphan_since);
					$('#txtadoptedchild').val(data[0].adopted_child);
					$('#ddlreligion').val(data[0].religion);
					$('#ddlcaste').val(data[0].caste);
					$('#ddlration').val(data[0].ration_card_name);
					$('#ddlrationtype').val(data[0].ration_card_type);
					if(ration_card == 'Yes'){
						$("#divration").show();
					}else{
						$("#divration").hide();
					}
					if(child_orphan == 'Yes'){
						$("#divorphan1").show();
						$("#divorphan2").show();
					}else{
						$("#divorphan1").hide();
						$("#divorphan2").hide();
					}
				}  
			});
		}
	});	

	function updategeneralinfo(){
	var voterid = $('#txtvoterid').val();
	var summary_id = $('#ddlchildname').val();
	var child_name = $('#txtname').val();
	var dob = $('#txtdob').val();
	var gender = $("#ddlgender option:selected").val();
	var father_name = $('#txtfname').val();
	var mother_name = $('#txtmname').val();
	var present_addr = $('#txtpreaddr').val();
	var permanent_addr = $('#txtperaddr').val();
	var child_living = $("#ddlcliving option:selected").val();
	var child_orphan = $("#ddlcorphan option:selected").val();
	var child_orphan_yes = $("#ddlcorphany option:selected").val();
	var child_orphan_since = $('#txtorphansince').val();
	var adopted_child = $('#txtadoptedchild').val();
	var religion = $("#ddlreligion option:selected").val();
	var caste = $("#ddlcaste option:selected").val();
	var ration_card_name = $("#ddlration option:selected").val();
	var ration_card_type = $("#ddlrationtype option:selected").val();
	if ( voterid == "" || child_name == "" || dob == "" || father_name == "" || mother_name == "" || present_addr == "" || religion == "" || caste == "" )
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&child_name='+child_name+'&dob='+dob+'&gender='+gender+'&father_name='+father_name+'&mother_name='+mother_name+'&present_addr='+present_addr+'&permanent_addr='+permanent_addr+'&child_living='+child_living+'&child_orphan='+child_orphan+'&child_orphan_yes='+child_orphan_yes+'&child_orphan_since='+child_orphan_since+'&adopted_child='+adopted_child+'&religion='+religion+'&caste='+caste+'&ration_card_name='+ration_card_name+'&ration_card_type='+ration_card_type;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('general_info/updategeneralinfo');?>/",  
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