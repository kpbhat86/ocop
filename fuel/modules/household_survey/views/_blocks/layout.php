<style>
#householdsurveyfrm select {padding:6px 0 5px 1px; }
</style>
<script type="text/javascript">
$(document).ready(function() { 	
	var hhlineitem 	= <?php echo $hhlineitem; ?>;
	var hhdetails 	= <?php echo $hhdetails; ?>;
	var numitem 	= <?php echo $numhhlist; ?>;	
	
	/* Total Number of member list*/
	$('#txtnumlist').val(numitem);
	
	/* Information about Household Main*/
	var religion 	= hhdetails[0].religion;
	var caste 		= hhdetails[0].caste;
	$('#txtvoterid').val(hhdetails[0].hid);
	$('#txthead_fly').val(hhdetails[0].hof);
	$('#txtaddr1').val(hhdetails[0].addr);
	$("[name=radreligion]").filter("[value='"+religion+"']").attr("checked",true);
	$("[name=radcaste]").filter("[value='"+caste+"']").attr("checked",true);
	
	/* Information about Household Member*/
	for(i=0; i<numitem; i++){
		var textid = i + 1;
		$('input#txtname'+textid).val(hhlineitem[i].name);
		$('input#txtage'+textid).val(hhlineitem[i].age);
		$('select#txtgender'+textid).val(hhlineitem[i].gender);
		$('select#txtalive_dead'+textid).val(hhlineitem[i].alive_death);
		$('select#txthead_of_fly'+textid).val(hhlineitem[i].rel_hof);
		$('input#txtmother_chld_rel'+textid).val(hhlineitem[i].mother_name);
		$('input#txtfather_chld_rel'+textid).val(hhlineitem[i].father_name);
		$('input#txtguardian_chld_rel'+textid).val(hhlineitem[i].guardian_name);
		$('select#txteducation'+textid).val(hhlineitem[i].edu);
		$('select#txtoccupation'+textid).val(hhlineitem[i].occup);
		$('select#txtannual_inc'+textid).val(hhlineitem[i].sal);
		$('select#txtmarried_unmrd'+textid).val(hhlineitem[i].marital_status);
		$('input#txtage_married'+textid).val(hhlineitem[i].marriage_age);
		
		var stat = hhlineitem[i].alive_death;
		if(stat == 2){
			$('select#txteducation'+textid).attr("disabled","disabled");
			$('select#txtoccupation'+textid).attr("disabled","disabled");
			$('select#txtannual_inc'+textid).attr("disabled","disabled");
			$('select#txtmarried_unmrd'+textid).attr("disabled","disabled");
			$('input#txtage_married'+textid).attr("disabled","disabled");
		}
	}
});
</script>
<div id="main_content_inner">
<p class="instructions">H1. Edit Household Survey</p>
<div id="householdsurveyfrm" class="pad-10">
<form id="savehouseholdsurvey" name="savehouseholdsurvey" method="post" action="<?php echo fuel_url('household_survey/edithouseholdsurvey');?>" onSubmit="return chksavehouseholdsurvey();">
<div class="pad-5">
	<table cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td class="label"><label>Household ID (Voter Card Id, Pan Card, Driving License or etc) / ಕುಟುಂಬದ ಗುರುತು ಸಂಖ್ಯೆ (ಮತದಾರರ ಗುರುತು ಚೀಟಿ ಸಂಖ್ಯೆ; ಪ್ಯಾನ್‍ ಸಂಖ್ಯೆ; ವಾಹನ ಚಾಲನೆ ಪರವಾನಗೆ ಸಂಖ್ಯೆ, ಇತ್ಯಾದಿ)</label></td>
		<td class="value">
			<input type="text" id="txtvoterid" name="txtvoterid" readonly="readonly" /> 
		</div>
		</td>
	</tr>
	</table>
<fieldset>
	<legend>H1.0 General Information / ಸಾಮಾನ್ಯ ಮಾಹಿತಿ</legend>
	<table cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td class="label">Name of head of the Family / ಕುಟುಂಬದ ಮುಖ್ಯಸ್ಥರ ಹೆಸರು<span class="required">*</span></td>
		<td class="value">
			<input type="text" id="txthead_fly" name="txthead_fly" />
			<input type="text" id="txtnumlist" name="txtnumlist" />
			<input type="text" id="txttotnum" name="txttotnum" />
		</td>
	</tr>
	<tr>
		<td class="label">
			Address1 / ವಿಳಾಸ 1<span class="required">*</span>
		</td>
		<td class="value">
			<input type="text" id="txtaddr1" name="txtaddr1" />
		</td>
	</tr>
	<tr>
		<td class="label">
			Address2 / ವಿಳಾಸ 2
		</td>
		<td class="value">
			<input type="text" id="txtaddr2" name="txtaddr2" />
		</td>
	</tr>
	</table> 
	 
	<table cellpadding="0" cellspacing="10" border="0" width="100%">
		<tr>
			<td class="label" width="35%">
				Religion / ಧರ್ಮ<span class="required">*</span>
			</td>
			<td>
				<input type="radio" name="radreligion" id="radreligion" value="Hindu" checked > Hindu / ಹಿಂದು
			</td>
			<td>
				<input type="radio" name="radreligion" id="radreligion" value="Muslim" > Muslim/ ಮುಸಲ್ಮಾನ
			</td>
			<td>
				<input type="radio" name="radreligion" id="radreligion" value="Christian" > Christian/ಕ್ರಿಶ್ಚಿಯನ್
			</td>
			<td>
				<input type="radio" name="radreligion" id="radreligion" value="Jain" > Jain / ಜೈನ
			</td>
			<td>
				<input type="radio" name="radreligion" id="radreligion" value="Other" > Other / ಇತರರು	
			</td>	
		</tr>
		<tr>
			<td class="label">
				Caste<span class="required">*</span>
			</td>
			<td> 
				<input type="radio" name="radcaste" id="radcaste" value="SC" checked > SC / ಪರಿಶಿಷ್ಟ  ಜಾತಿ
			</td>
			<td>
				<input type="radio" name="radcaste" id="radcaste" value="ST" > ST / ಪರಿಶಿಷ್ಟ ವರ್ಗ
			</td>
			<td>
				<input type="radio" name="radcaste" id="radcaste" value="OBC" > OBC / ಇತರ ಹಿಂದುಳಿದ ವರ್ಗಗಳು
			</td>
			<td colspan="2">
				<input type="radio" name="radcaste" id="radcaste" value="Other" > Other	/  ಇತರರು
			</td>	
		</tr>
	</table>
	
</fieldset>
</div>

<div class="pad-5">
<fieldset>
	<legend>Details</legend>
	<table width="100%" cellpadding="0" cellspacing="5" border="0">
		<tr>
            <td width="3%" class="tdclass" align="center">
				S.No. / ಕ್ರಮ ಸಂಖ್ಯೆ
            </td>
			<td width="8%" class="tdclass" align="center">
				Name / ಹೆಸರು
            </td>
			
            <td width="7%" class="tdclass" align="center">
				Age / ವಯಸ್ಸು
            </td>
            <td width="6%" class="tdclass" align="center">
				Gender /ಲಿಂಗ
            </td>
            <td width="5%" class="tdclass" align="center">
				Alive / Dead / /ಜೀವಂತವಾಗಿದ್ದಾರೆ/ನಿಧನರಾಗಿದ್ದಾರೆ
            </td>
            <td width="8%" class="tdclass" align="center">
				 Relationship with the head of the family / ಕುಟುಂಬದ ಮುಖ್ಯಸ್ಥರೊಡನೆ ಸಂಬಂಧ
            </td>
            <td width="8%" class="tdclass" align="center">
                Name of the Mother / ತಾಯಿಯ ಹೆಸರು
            </td>
            <td width="10%" class="tdclass" align="center">
                Name of the Father / ತಂದೆಯ ಹೆಸರು
            </td>
			<td width="10%" class="tdclass" align="center">
				Name of the Guardian / ಪೋಷಕರ ಹೆಸರು
            </td>
            <td width="5%" class="tdclass" align="center">
				Education / ಶಿಕ್ಷಣ
            </td>
            <td width="10%" class="tdclass" align="center">
                Occupation / ವೃತ್ತಿ
            </td>
            <td width="10%" class="tdclass" align="center">
                Annual Income / ವಾರ್ಷಿಕ ಆದಾಯ
            </td>
			<td width="5%" class="tdclass" align="center">
				Married / Unmarried / ವಿವಾಹವಾಗಿದೆ/ ಇಲ್ಲ
            </td>
            <td width="5%" class="tdclass" align="center">
                 Age when married / ಮದುವೆಯಾದಾಗ ತಾಯಿಯ ವಯಸ್ಸು
            </td>
        </tr>
		<?php for($i=1; $i<=15; $i++) {?>
		<script type="text/javascript">
			$(document).ready(function() {
			$("#txtalive_dead<?php echo $i; ?>").change(function(data) {
				var alive_dead<?php echo $i; ?> = $("#txtalive_dead<?php echo $i; ?> option:selected").val();
					if(alive_dead<?php echo $i; ?> == '2'){
						$("select#txteducation<?php echo $i; ?>").attr("disabled","disabled");
						$("select#txtoccupation<?php echo $i; ?>").attr("disabled","disabled");
						$("select#txtannual_inc<?php echo $i; ?>").attr("disabled","disabled");
						$("select#txtmarried_unmrd<?php echo $i; ?>").attr("disabled","disabled");
						$("input#txtage_married<?php echo $i; ?>").attr("disabled","disabled");
					}else if(alive_dead<?php echo $i; ?> == '1'){
						$("select#txteducation<?php echo $i; ?>").attr("disabled","");
						$("select#txtoccupation<?php echo $i; ?>").attr("disabled","");
						$("select#txtannual_inc<?php echo $i; ?>").attr("disabled","");
						$("select#txtmarried_unmrd<?php echo $i; ?>").attr("disabled","");
						$("input#txtage_married<?php echo $i; ?>").attr("disabled","");						
					}else{
						$("select#txteducation<?php echo $i; ?>").attr("disabled","");
						$("select#txtoccupation<?php echo $i; ?>").attr("disabled","");
						$("select#txtannual_inc<?php echo $i; ?>").attr("disabled","");
						$("select#txtmarried_unmrd<?php echo $i; ?>").attr("disabled","");
						$("input#txtage_married<?php echo $i; ?>").attr("disabled","");						
					}
				});
				$("#txtmarried_unmrd<?php echo $i; ?>").change(function(data) {
					var unmarriedage<?php echo $i; ?> = $("#txtmarried_unmrd<?php echo $i; ?> option:selected").val();
					if(unmarriedage<?php echo $i; ?> == '2'){
						$("input#txtage_married<?php echo $i; ?>").attr("disabled","disabled");
						}
						else{
						$("input#txtage_married<?php echo $i; ?>").attr("disabled","");						
					}
				});
			});
		</script>
		<tr>
			<td align="center">
				<?php echo $i; ?><input type="hidden" class="input" name="txtsno<?php echo $i; ?>" id="txtsno<?php echo $i; ?>" value="<?php echo $i; ?>"/>
			</td>
			<td>
				<input type="text" class="input" name="txtname<?php echo $i; ?>" id="txtname<?php echo $i; ?>" value="" style="width:50px;" onchange="return valcount(<?php echo $i; ?>)" />
			</td>
			<td>
				<input type="text" class="input" name="txtage<?php echo $i; ?>" id="txtage<?php echo $i; ?>" value=""style="width:30px;" />
			</td>
			<td>
				<select id="txtgender<?php echo $i; ?>" name="txtgender<?php echo $i; ?>" style="width:60px;">
					<option value="0" >Select/ಆಯ್ಕೆ ಮಾಡಿ</option>
					<option value="1" >Male</option>
					<option value="2" >Female</option>
				</select>
			</td>
			<td>
				<select id="txtalive_dead<?php echo $i; ?>" name="txtalive_dead<?php echo $i; ?>" style="width:60px;">
					<option value="0" >Select/ಆಯ್ಕೆ ಮಾಡಿ</option>
					<option value="1" >Alive</option>
					<option value="2" >Death</option>
				</select>
			</td>
			<td>
				<select id="txthead_of_fly<?php echo $i; ?>" name="txthead_of_fly<?php echo $i; ?>" style="width:70px;">
					<option value="0" >Select/ಆಯ್ಕೆ ಮಾಡಿ</option>
					<option value="1" >Father</option>
					<option value="2" >Mother</option>
					<option value="3" >Elder Brother</option>
					<option value="4" >Younger Brother</option>
					<option value="5" >Elder Sister</option>
					<option value="6" >Younger Sister</option>
					<option value="7" >Husband</option>
					<option value="8" >Wife</option>
					<option value="9" >Son</option>
					<option value="10" >Daughter</option>
					<option value="11" >Head of Family</option>
					<option value="12" >Grandson</option>
					<option value="13" >Granddaughter</option>
					<option value="14" >Daughter-in-law</option>
					<option value="15" >Son-in-law</option>
					<option value="16">Others</option>
				</select>
			</td>
			<td>
				<input type="text" class="input" name="txtmother_chld_rel<?php echo $i; ?>" id="txtmother_chld_rel<?php echo $i; ?>" value="" style="width:55px;" />
			</td>
			<td>
				<input type="text" class="input" name="txtfather_chld_rel<?php echo $i; ?>" id="txtfather_chld_rel<?php echo $i; ?>" value="" style="width:55px;" />
			</td>
			<td>
				<input type="text" class="input" name="txtguardian_chld_rel<?php echo $i; ?>" id="txtguardian_chld_rel<?php echo $i; ?>" value="" style="width:55px;" />
			</td>
			<td>
				<select id="txteducation<?php echo $i; ?>" name="txteducation<?php echo $i; ?>" style="width:70px;">
					<option value="0" >Select/ಆಯ್ಕೆ ಮಾಡಿ</option>
					<option value="1" >Illiterate</option>
					<option value="2" >Pre Primary</option>
					<option value="3" >Primary</option>
					<option value="4" >High School</option>
					<option value="5" >Diploma</option>
					<option value="6" >Under Graduate</option>
					<option value="7" >Graduate</option>
					<option value="8" >Post Graduate</option>
				</select>
			</td>
			<td>
				<select id="txtoccupation<?php echo $i; ?>" name="txtoccupation<?php echo $i; ?>" style="width:65px;">
					<option value="0" >Select/ಆಯ್ಕೆ ಮಾಡಿ</option>
					<option value="1" >House wife</option>
					<option value="2" >Agriculture</option>
					<option value="3" >Agriculture Labour</option>
					<option value="4" >Govt. Employee</option>
					<option value="5" >Private Employee</option>
					<option value="6" >Business</option>
					<option value="7" >Coolie</option>
					<option value="8" >Artisan</option>
					<option value="9" >Migrated Labour</option>
					<option value="10" >Student</option>
					<option value="11" >Other</option>
				</select>
			</td>
			<td>
				<select id="txtannual_inc<?php echo $i; ?>" name="txtannual_inc<?php echo $i; ?>" style="width:60px;">
					<option value="0" >Select/ಆಯ್ಕೆ ಮಾಡಿ</option>
					<option value="1" >Not Earning</option>
					<option value="2" >Below Rs. 5000</option>
					<option value="3" >5000-10000 Rs.</option>
					<option value="4" >10000-20000 Rs.</option>
					<option value="5" >Above Rs. 20000</option>
				</select>
			</td>
			<td>
				<select id="txtmarried_unmrd<?php echo $i; ?>" name="txtmarried_unmrd<?php echo $i; ?>" style="width:60px;">
					<option value="0" >Select/ಆಯ್ಕೆ ಮಾಡಿ</option>
					<option value="1" >Married</option>
					<option value="2" >Unmarried</option>
				</select>
			</td>
			<td>
				<input type="text" class="input" name="txtage_married<?php echo $i; ?>" id="txtage_married<?php echo $i; ?>" value="" style="width:30px;" />
			</td>     
        </tr>
		<?php } ?>
    </table>
</fieldset>
</div>

<div class="pad-10">
	<input id="Save" class="submit" type="submit" value="Update" name="Save" />
	<div id="check_bar">&nbsp;</div>
</div>

</form>

</div>
</div>