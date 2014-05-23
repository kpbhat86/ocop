<div id="main_content_inner">
<p class="instructions"><b>ಮರಣಕ್ಕೆ ಸಂಬಂಧಪಟ್ಟ ಪ್ರಶ್ನಾವಾಳಿ - ಹಂತ 7 / Death Related Questionnaire(DRQ) Step7:</b> <b style="color:#41A0CF;">ತಂದೆಯ ಮರಣ ವಿಚಾರ / Father's Death Details</b></p>
<form id="fatherdatafrm" name="fatherdatafrm" method="post" action="">
	<table  cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td class="label"><label><span class="bluemark">FD1.0 </span> ಕುಟುಂಬದ  ಗುರುತು ಸಂಖ್ಯೆ / Household ID ( ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ / Voter Card Id, ಪಾನ್ ಕಾರ್ಡ್ / Pan Card, ವಾಹನ ಚಾಲನಾ ಪರವಾನಗಿ / Driving License ಅಥವಾ / or ಇತರೆ  / etc)</label></td>
		<td class="value">
			<input type="text" id="txtvoterid" name="txtvoterid" onkeyup="suggest(this.value);" onblur="fill();" class="" /> 
			<div class="suggestionsBox" id="suggestions" style="display: none;"> 
				<img src="<?=img_path('arrow.png') ?>" style="position: relative; top: -11px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="suggestionsList"></div>
			</div>
			<a onClick="childname();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr>
	<tr>
		<td class="label"><label><span class="bluemark">FD1.0 </span>ಮಗುವಿನ ಹೆಸರು  /  Name of the Child</label></td>
		<td class="value">
			<select id="ddlchildname" name="ddlchildname" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
			</select>
			<a onClick="childinfo();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr
	<tr>
		<td class="label"><label><span class="bluemark">FD1.1 </span>ತಂದೆಯ ಮರಣದ ಮಾಹಿತಿ / Father's Death Details</label></td>
		<td class="value">
			<select id="ddldeathfatherstatus_death" name="ddlfatherstatus_death" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="available">ಗೊತ್ತಿದೆ / Available</option>
				<option value="notavilable">ಗೊತ್ತಿಲ್ಲ  / Not Available</option>
				<option value="partially">ಸ್ವಲ್ಪ ಗೊತ್ತಿದೆ / Partially</option>
			</select>
			
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">FD1.2 </span>ತಂದೆಯ ಹೆಸರು / Name of the Father</label></td>
		<td><input type="text"  maxlength="100"  id="txtfathername_death" name="txtfathername_death"/></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">FD1.3 </span>ತಂದೆಯ  ಜನ್ಮದಿನಾಂಕ /  Father's Date of Birth</label></td>
		<td>		
			<input type="text" id="txtfatherdob_death" name="txtfatherdob_death" />
			<script type="text/javascript">
				$(txtfatherdob_death).datepick({dateFormat: 'dd-mm-yyyy'});
			</script>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">FD1.4 </span>ತಂದೆಯ  ಶಿಕ್ಷಣ / Education of father</label></td>
		  <td>
			<select id="ddlfather_education" name="ddlfather_education" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="available">ಅಕ್ಷರಸ್ಥ / Illiterate </option>
				<option value="notavilable"> ಐದನೇ ತರಗತಿ ತೇರ್ಗಡೆ / 5th Std.Pass</option>
				<option value="partially">ಎಂಟನೇ  ತರಗತಿ ತೇರ್ಗಡೆ / 8th Std.Pass</option>
				<option value="partially"> ಹತ್ತನೇ  ತರಗತಿ ತೇರ್ಗಡೆ / 10th Std.Pass</option>
				<option value="partially">ಹನ್ನೆರಡನೇ  ತರಗತಿ ತೇರ್ಗಡೆ / 12th Std.Pass</option>
				<option value="partially">ಪದವಿ ಮತ್ತು ಅದಕ್ಕಿಂತಾ ಹೆಚ್ಚು / Degree and above</option>
			</select>
 		 </td>
	</tr>
	<tr>
		<td><label><span class="bluemark">FD1.5 </span>ತಂದೆಯು ಮರಣ ಹೊಂದಿದಾಗ ಕೊನೆಯ ಮಗುವಿಗೆ ಎಷ್ಟು ವಯಸ್ಸಾಗಿತ್ತು / Age of the last child when Father died</label></td>
		<td><input type="text" id="txtchildage" name="txtchildage" onchange="allnumeric();"/></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">FD1.6 </span>ತಂದೆ ಮರಣ ಹೊಂದಿದಾಗ ತಂದೆಯ ವಯಸ್ಸು / Age of the father when he died</label></td>
		<td>		
			<input type="text" id="txtfatherdod_death" name="txtfatherdod_death" onchange="allnumericdeath();"/>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">FD1.7 </span>ಮರಣ ದಾಖಲಾತಿ / Death Registration</label></td>
		<td>
			<select id="ddldeathregistration" name="ddldeathregistration" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Yes">ಹೌದು / Yes</option>
				<option value="No"> ಇಲ್ಲ / No</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">FD1.7A </span>ಹೌದಾದರೆ, ಮರಣ ನೋಂದಣಿ ಸಂಖ್ಯೆಯನ್ನು ನಮೂದಿಸಿ / If Yes, please mention the Death Registration Number</label></td>
		  <td>
   		 <input type="text" id="txtfatherdeath_registration" name="txtfatherdeath_registration" />
 		 </td>
	</tr>
	<tr>
		<td><label><span class="bluemark">FD1.8 </span>ಮರಣ ಹೊಂದಲು ಕಾರಣ / Reason for death</label></td>
		<td>		
			<input type="text" id="txtdeathreason" name="txtdeathreason" />
		</td>
	</tr>	
	<tr>
		<td><label><span class="bluemark">FD1.9 </span>ತಂದೆಯ ಮದುವೆಯ ದಿನಾಂಕ ಲಭ್ಯವಿದೆಯೇ ? / Is Father's Date of Marriage available ?</label></td>
		<td>
			<select id="ddlmrgage" name="ddlmrgage" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Yes">ಹೌದು / Yes</option>
				<option value="No"> ಇಲ್ಲ / No</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">FD1.9A </span>ಇಲ್ಲ ಎಂದಾದರೆ, ಮದುವೆಯಾದಾಗ ತಂದೆಯ ವಯಸ್ಸು / If No, father's  age at marriage</label></td>
		<td>		
			<input type="text" id="txtfathermarage" name="txtfathermarage" />
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">FD1.10 </span>ತಾಯಿ ಮರಣ ಹೊಂದುವುದಕ್ಕಿಂಥ ಒಂದು ವರ್ಷದ ಹಿಂದೆ ಚಿಕಿತ್ಸೆಗಾಗಿ ಆಸ್ಪತ್ರೆ / ಪ್ರಾಥಮಿಕ ಆರೋಗ್ಯ ಕೇಂದ್ರಕ್ಕೆ ಬೇಟಿಕೊಟ್ಟಿದ್ದರಾ ? / Have you visited any hospital/PHC during last year for treatment</label></td>
		<td><select id="ddlvisithospital" name="ddlvisithospital" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Yes">ಹೌದು / Yes</option>
				<option value="No"> ಇಲ್ಲ / No</option>
				
			</select></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">FD1.10A </span>ಕಳೆದ ವರ್ಷದಲ್ಲಿ ಆಸ್ಪತ್ರೆ / ಪ್ರಾಥಮಿಕ ಆರೋಗ್ಯ ಕೇಂದ್ರಕ್ಕೆ ಬೇಟಿ ನೀಡಲು ಕಾರಣ ಮತ್ತು ವೈದ್ಯರಿಂದ ಪಡೆದ ಸಲಹೆ / Reason for visiting the hospital / PHC and the advice you received from the doctor.Please mention</label></td>
		  <td>
   		 <input type="text" id="txtfatherhosdate_death" name="txtfatherhosdate_death" />
 		 </td>
	</tr>
	<!--<tr>
		<td><label><span class="bluemark">FD1.0 </span>Occupation of the father</label></td>
		  <td>
   		 <input type="text" id="txtfather_occupation" name="txtfather_occupation" />
 		 </td>
	</tr>
	<tr>
		<td><label><span class="bluemark">FD1.0 </span>Annual Income</label></td>
		  <td>
   		 <input type="text" id="txtfather_income" name="txtfather_income" />
 		 </td>
	</tr>-->
	<tr>
		<td>&nbsp;</td>
		<td class="actions">
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="savefathersdata();">
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
</div>
