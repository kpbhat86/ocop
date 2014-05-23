<div id="main_content_inner">
<p class="instructions"><b>ನಮ್ಮ ಮಕ್ಕಳು ನಮ್ಮ ಪ್ರಗತಿ - ಪೋಷಕರ ಮಾಹಿತಿ - ಹಂತ 10/ OCOP Guardian's Info Step 10:</b> ಪೋಷಕರ ಮಾಹಿತಿ /  Data of Guardian</p>
<form id="guardianinfofrm" name="guardianinfofrm" method="post" action="">
	<table width="100%" cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td width="65%" class="label"><label><span class="bluemark">GI1.0</span>  ಕುಟುಂಬದ ಗುರುತು ಸಂಖ್ಯೆ / Household ID ( ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ / Voter Card Id, ಪಾನ್ ಕಾರ್ಡ್ / Pan Card, ವಾಹನ ಚಾಲನಾ ಪರವಾನಗಿ / Driving License ಅಥವಾ  /  or ಇತರೆ  / etc) <span class="required">*</span></label></td>
		<td width="35%" class="value">
			<input type="text" id="txtvoterid" name="txtvoterid" onkeyup="suggest(this.value);" onblur="fill();" class="" autocomplete="off" /> 
			<div class="suggestionsBox" id="suggestions" style="display: none;"> 
				<img src="<?=img_path('arrow.png') ?>" style="position: relative; top: -11px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="suggestionsList"></div>
			</div>
			<a onClick="childname();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr>
	<tr>
		<td class="label"><label><span class="bluemark">GI1.0a</span> ಮಗುವಿನ ಹೆಸರು  / Name of the Child <span class="required">*</span></label></td>
		<td class="value">
			<select id="ddlchildname" name="ddlchildname" style="min-width:175px;">
			</select>
			<a onClick="childinfo();" style="cursor:pointer;" title="Go" id="go"></a>
			<a onClick="childinfo();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr
	<tr>
		<td class="label"><label><span class="bluemark">GI1.1</span> ಪೋಷಕರ ಮಾಹಿತಿ ತಿಳಿದಿದೆಯೇ /  Do you know Guardian's Information?  <span class="required">*</span></label></td>
		<td class="value">
			<select id="ddlguardianstatus" name="ddlguardianstatus" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="available">  ಗೊತ್ತಿದೆ /  Available</option>
				<option value="notavilable"> ಗೊತ್ತಿಲ್ಲ / Not Available</option>
				<option value="partially"> ಸ್ವಲ್ಪ ಗೊತ್ತಿದೆ / Partially</option>
			</select>
			
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">GI1.2</span> ಪೋಷಕರ   ಹೆಸರು /  Guardian Name <span class="required">*</span></label></td>
		<td><input type="text" id="txtguardianname" name="txtguardianname" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">GI1.3</span>  ಜನ್ಮ ದಿನಾಂಕ  / Date of Birth</label></td>
		<td>		
			<input type="text" id="txtguardiandob" name="txtguardiandob" />
			<script type="text/javascript">
				$(txtguardiandob).datepick({dateFormat: 'dd-mm-yyyy'});
			</script>
		</td>
	</tr>
	
	<tr>
		<td><label><span class="bluemark">GI1.4</span>   ಪ್ರಸಕ್ತ ವಿಳಾಸ / Present Address <span class="required">*</span></label></td>
		<td><input type="text" id="txtguardianpreaddr" name="txtguardianpreaddr" /></td>
	</tr>
	<tr><td><td><a href="javascript:sync();"><span class="bluemark">Copy Same as Above</span></a></td></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">GI1.5</span>  ಖಾಯಂ ವಿಳಾಸ / Permanent Address <span class="required">*</span></label></td>
		<td>
			<input type="text" id="txtguardianperaddr" name="txtguardianperaddr" />
		</td>
	</tr>
		
	
	<tr>
		<td><label><span class="bluemark">GI1.6</span>  ಧರ್ಮ / Religion <span class="required">*</span></label></td>
		<td>
			<select id="ddlguardianreligion" name="ddlguardianreligion" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Hindu"> ಹಿಂದು  / Hindu</option>
				<option value="Muslim"> ಮುಸ್ಲಿಂ  /  Muslim</option>
				<option value="Christian"> ಕ್ರಿಶ್ಚಿಯನ್   / Christian</option>
				<option value="Other"> ಇತರೆ  / Other</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">GI1.7</span> ಜಾತಿ  / Caste <span class="required">*</span></label></td>
		<td>
			<select id="ddlguardiancaste" name="ddlguardiancaste" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="SC"> ಪರಿಶಿಷ್ಟ ಜಾತಿ / SC</option>
				<option value="ST">ಪರಿಶಿಷ್ಟ   ಪಂಗಡ / ST</option>
				<option value="OBC"> ಇತರೆ ಹಿಂದುಳಿದ ವರ್ಗ / OBC</option>
				<option value="Other">ಇತರೆ  / Other</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">GI1.8</span> ಪಡಿತರ ಚೀಟಿಯಲ್ಲಿ ಹೆಸರಿದೆಯೇ /   Is there name in Ration Card? <span class="required">*</span></label></td>
		<td>
			<select id="ddlguardianration" name="ddlguardianration" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Yes"> ಹೌದು  / Yes</option>
				<option value="No"> ಇಲ್ಲ್ಲ / No</option>
				<option value="Not Applicable"> ಅನ್ವಯಿಸುವುದಿಲ್ಲ  / Not Applicable</option>
			</select>
		</td>
	</tr>	
	<tr>
		<td><label><span class="bluemark">GI1.9</span> ಹೌದಾದರೆ, ಪಡಿತರ ಚೀಟಿಯ ವಿಧ / If yes, type of the ration card</label></td>
		<td>
			<select id="ddlguardianrationtype" name="ddlguardianrationtype" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="APL"> ಎಪಿಎಲ್ / APL</option>
				<option value="BPL"> ಬಿಪಿಎಲ್ / BPL</option>
				<option value="Anthyodaya"> ಅಂತ್ಯೋದಯ / Anthyodaya</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">GI1.10</span> ಮದುವೆಯ ವಯಸ್ಸು ನೆನಪಿದೆಯೇ  / Do you remember your age during Marriage( ಹೌದಾದರೆ,  ದಯವಿಟ್ಟು ನಮೂದಿಸಿ /  if yes, please mention)</label></td>
		<td>
			<input type="text" id="txtguardianmrg" name="txtguardianmrg" />
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">GI1.11</span>  ಮದುವೆಯ ದಿನಾಂಕ ನೆನಪಿದೆಯೇ / Do you remember your date of Marriage( ಹೌದಾದರೆ,  ದಯವಿಟ್ಟು ನಮೂದಿಸಿ / if yes, please mention)</label></td>
		<td>
			<input type="text" id="txtguardianmrgage" name="txtguardianmrgage" />
			<script type="text/javascript">
				$(txtguardianmrgage).datepick({dateFormat: 'dd-mm-yyyy'});
			</script>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">GI1.12</span>  ಕಳೆದ ವರ್ಷ ನೀವು ಚಿಕಿತ್ಸೆಗಾಗಿ ಆಸ್ಪತ್ರೆ / ಪ್ರಾಥಮಿಕ ಆರೋಗ್ಯ ಕೇಂದ್ರಕ್ಕೆ ಬೇಟಿಕೊಟ್ಟಿದ್ದೀರ  / Have you visited any hospital / PHC during last year of treatment?</label></td>
		<td style="padding:7px 0px;">
			<input type="radio" id="radguardianhos" name="radguardianhos" value="Yes" />  ಹೌದು  /  Yes &nbsp;
			<input type="radio" id="radguardianhos" name="radguardianhos" value="No" />  ಇಲ್ಲ್ಲ / No 
 		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">GI1.13</span>  ಕಳೆದ ವರ್ಷದಲ್ಲಿ ಆಸ್ಪತ್ರೆ / ಪ್ರಾಥಮಿಕ ಆರೋಗ್ಯ ಕೇಂದ್ರಕ್ಕೆ ಬೇಟಿ ನೀಡಲು ಕಾರಣ ಮತ್ತು ವೈದ್ಯರಿಂದ ಪಡೆದ ಸಲಹೆ . ದಯವಿಟ್ಟುನಮೂದಿಸಿ /  Reason for visiting the hospital / PHC and the advice you received from the doctor.Please mention</label></td>
		  <td>
   		 <input type="text" id="txtguardianhosdate" name="txtguardianhosdate" />
 		 </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="actions">
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="saveguardiansdata();">
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
